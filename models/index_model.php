<?php

//Cuando se crea este Modelo, adquiere todos los metodos de la clase padre "Model"
class Index_Model extends Model {

    //El constructor invoca al padre que esta en "libs/Model", este posee una variable llamada "db" con el acceso a la BD
    //db es un objeto "Database" y posee las siguientes funciones: select, insert, update y delete
    public function __construct() {
        parent::__construct();
    }

    public function prueba() {
        return $this->db->select("SELECT * FROM asignaturas");
    }


    public function pruebasjs() {
        $resultado= $this->db->select("SELECT * FROM asignaturas");
        print_r($resultado);
        die;
         echo json_encode($resultado);
    }
}
