<?php

//Cuando se crea este Modelo, adquiere todos los metodos de la clase padre "Model"
class ConfigExamen_Model extends Model {

    //El constructor invoca al padre que esta en "libs/Model", este posee una variable llamada "db" con el acceso a la BD
    //db es un objeto "Database" y posee las siguientes funciones: select, insert, update y delete
    public function __construct() {
        parent::__construct();
    }

    //La funcion contenidos devuelve un array con todos los contenidos del Usuario 
    public function contenidos($nivel) {
        return $this->db->select('SELECT DISTINCT nombre_contenido,cod_contenido FROM contenidos '
                        . 'WHERE ced_docente = :ced_docente '
                        . 'AND nivel_contenido = :nivel', array('ced_docente' => $_SESSION['userid'], 'nivel' => $nivel));
    }

    //La funcion consulta_cantidad_preguntas devuelve un entero con la cantidad de preguntas almacenadas de ese contenido en especifico 
    public function consulta_cantidad_preguntas($cod_contenido) {
        return $this->db->select('SELECT numero_pregunta FROM preguntas '
                                . 'WHERE contenido = :contenido', array('contenido' => $cod_contenido));
    }

    //La funcion create inserta en la BD los datos principales del examen, ademas devuelve el id del examen para relacionarlo
    //con la tabla contenidos_examen
    public function create($data) {
        $sth = $this->db->prepare('INSERT INTO examen (nombre_examen, ced_docente, '
                . 'nivel_examen,cod_materia) VALUES (:nombre_examen, '
                . ':ced_docente, :nivel_examen, :cod_materia)');
        $sth->execute(array(
            'nombre_examen' => $data['nom_examen_tx'],
            'ced_docente' => $_SESSION['userid'],
            'nivel_examen' => $data['nivel'],
            'cod_materia' => $data['cod_materia']));

        $cod_examen = $this->db->lastInsertId();
        
        return $cod_examen;
    }

}
