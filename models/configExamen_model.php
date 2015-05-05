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

    public function noteSingleList($noteid) {
        return $this->db->select('SELECT * FROM note WHERE userid = :userid AND noteid = :noteid', array('userid' => $_SESSION['userid'], 'noteid' => $noteid));
    }

    public function create($data) {
        //Inserto Datos Examen
        $this->db->insert('examen', array(
            'nombre_examen' => $data['nom_examen_tx'],
            'ced_docente' => $_SESSION['userid'],
            'nivel_examen' => $data['nivel'],
            'cod_materia' => $data['cod_materia']
        ));
        
        
        
        
        //*****************************************************
        //VOY POR AQUI
        //*****************************************************
        //
        //
        //Consulto maximo cod_contenido
        $consultaMaxCodigo = $this->db->select("SELECT MAX(cod_contenido) as codigo FROM contenidos");
        $cod_contenido = (int) $consultaMaxContenido[0]['codigo'] + 1;
    }

    public function createContenido($contenido, $nivel_contenido) {
        //Consulto maximo cod_contenido
        $consultaMaxContenido = $this->db->select("SELECT MAX(cod_contenido) as codigo FROM contenidos");
        $cod_contenido = (int) $consultaMaxContenido[0]['codigo'] + 1;


        //Inserto contenido
        $this->db->insert('contenidos', array(
            'cod_contenido' => $cod_contenido,
            'ced_docente' => $_SESSION['userid'],
            'nombre_contenido' => $contenido,
            'nivel_contenido' => $nivel_contenido
        ));
        return $cod_contenido;
    }
    public function editSave($data) {
        $postData = array(
            'title' => $data['title'],
            'content' => $data['content'],
        );

        $this->db->update('note', $postData, "`noteid` = '{$data['noteid']}' AND userid = '{$_SESSION['userid']}'");
    }

    public function delete($id) {
        $this->db->delete('note', "`noteid` = {$data['noteid']} AND userid = '{$_SESSION['userid']}'");
    }

}
