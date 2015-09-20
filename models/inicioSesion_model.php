<?php

//Cuando se crea este Modelo, adquiere todos los metodos de la clase padre "Model"
class InicioSesion_Model extends Model {

    //El constructor invoca al padre que esta en "libs/Model", este posee una variable llamada "db" con el acceso a la BD
    //db es un objeto "Database" y posee las siguientes funciones: select, insert, update y delete
    public function __construct() {
        parent::__construct();
    }

    //La funcion consultaAsignaturas recibe run verifica en la BD si el usuario existe y si es la contraseña correcta
    public function run() {
        //Compruebo si en la BD existe un usuario con esa cedula y contraseña, ambas enviadas por el metodo POST
        $sth = $this->db->prepare("SELECT cedula, tipo, nombre, apellido1, apellido2 FROM persona "
                                . "WHERE cedula = :usuario AND password = :password");
        $sth->execute(array(
            ':usuario' => $_POST['usuario'],
            ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));

        //ejecuto la consulta y guardo el registro en $data
        $data = $sth->fetch();

        //Si obtuvo algun registro procedo a establecer la variables de Sesion
        $count = $sth->rowCount();
        if ($count > 0) {
            Session::init();
            Session::set('role', $data['tipo']);
            Session::set('loggedIn', true);
            Session::set('userid', $data['cedula']);
            Session::set('nombre', $data['nombre'] . ' ' . $data['apellido1'] . ' ' . $data['apellido2']);
            //si el usuario es de tipo 'docente' consulto sus asignaturas
            if ($data['tipo'] == 'docente') {
                $asignaturas = $this->db->select("SELECT codigo,nombre FROM asignaturas,asignaturas_docente "
                                                . "WHERE ced_docente = :cedula "
                                                . "AND cod_asignatura= codigo", array(':cedula' => $data['cedula']));
                Session::set('asignaturas', $asignaturas);
//                print_r($_SESSION['asignaturas']);
//                die;
            }
            //si el usuario es de tipo 'estudiante' consulto su seccion
            if ($data['tipo'] == 'estudiante') {
                $seccion = $this->db->select("SELECT nivel,grupo FROM grupos "
                                            . "WHERE ced_estudiante = :cedula", array(':cedula' => $data['cedula']));
                Session::set('seccion', $seccion);
            }
            //al final, le mando al navegador la direccion ../menuPrincipal
            //Ej: localhost/ModuloExamenesPractica/menuPrincipal
            header('location: ../menuPrincipal');
            
        //si no encontro algun usuario con esa cedula y contraseña, lo redirecciono a ../inicioSesion
        } else {
            header('location: ../inicioSesion');
        }
    }

}
