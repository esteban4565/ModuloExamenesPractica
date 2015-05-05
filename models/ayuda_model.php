<?php

//Cuando se crea este Modelo, adquiere todos los metodos de la clase padre "Model"
class Ayuda_Model extends Model {

    //El constructor invoca al padre que esta en "libs/Model", este posee una variable llamada "db" con el acceso a la BD
    //db es un objeto "Database" y posee las siguientes funciones: select, insert, update y delete
    public function __construct() {
        parent::__construct();
    }

}
