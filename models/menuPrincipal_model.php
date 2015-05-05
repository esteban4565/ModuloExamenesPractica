<?php

//Cuando se crea este Modelo, adquiere todos los metodos de la clase padre "Model"
class MenuPrincipal_Model extends Model {

    //El constructor invoca al padre que esta en "libs/Model", este posee una variable llamada "db" con el acceso a la BD
    //db es un objeto "Database" y posee las siguientes funciones: select, insert, update y delete
    public function __construct() {
        parent::__construct();
    }

    public function prueba() {
        $registro = $this->db->select("SELECT MAX(numero_respuesta) as codigo FROM respuestas");
        $var_dump=(int) $registro[0]['codigo'] + 1;
        return $var_dump;
    }

    public function xhrInsert() {
        $text = $_POST['text'];

        $this->db->insert('data', array('text' => $text));

        $data = array('text' => $text, 'id' => $this->db->lastInsertId());
        echo json_encode($data);
    }

    public function xhrGetListings() {
        $result = $this->db->select("SELECT * FROM data");
        echo json_encode($result);
    }

    public function xhrDeleteListing() {
        $id = (int) $_POST['id'];
        $this->db->delete('data', "id = '$id'");
    }

}
