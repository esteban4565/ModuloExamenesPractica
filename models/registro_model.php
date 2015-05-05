<?php

//Cuando se crea este Modelo, adquiere todos los metodos de la clase padre "Model"
class Registro_Model extends Model {

    //El constructor invoca al padre que esta en "libs/Model", este posee una variable llamada "db" con el acceso a la BD
    //db es un objeto "Database" y posee las siguientes funciones: select, insert, update y delete
    public function __construct() {
        parent::__construct();
    }

    //La funcion createPassword recibe como parametro un array que contiene una cedula y una contraseña
    //consulta en la BD si existe algun usuario con esa cedula, si existe, le actualiza la contraseña en la BD
    //al final devuelve 1 si existe o 0 sino existe
    public function createPassword($data) {
        $registro = $this->db->select('SELECT * FROM persona WHERE cedula = :cedula', array(':cedula' => $data['cedula']));
        if ($registro != null) {
            $postData = array(
                'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY));

            $this->db->update('persona', $postData, "`cedula` = '{$data['cedula']}'");
            return 1;
        } else {
            return 0;
        }
    }

}
