<?php

//se carga codigo auxiliar, config posee parametros estaticos para la aplicacion, como URL principal o parametros de la BD
//Auth controla si el usuario esta logiado o esta tratando de acceder a un secctor de la aplicacion no permitido
require 'config.php';
require 'util/Auth.php';

//el __autoload carga las demas libreria utiles para la navegacion de la aplicacion, una muy importante es la clase Bootstrap
//Este Objeto Bootstrap agarra el URL del navegador y lo distribuye entre los controles, ejecutando diferentes funciones segun
//sea el caso. Ej: inicioSesion/run  ***Crea un Objeto Controller tipo "inicioSesion" y ejecuta la funcion "run". Esta funcion
//puede invocar algun metodo o funcion del Model de su objeto "inicioSesion_Model" para consultar a la BD, y al final el
//Objeto Controller llama al view correspondiente para proyectar la informacion
function __autoload($class) {
    require LIBS . $class . ".php";
}

//Creamos el Objeto Bootstrap!
$bootstrap = new Bootstrap();

//Si en algun momento tenemos que modificar los nombres de las carpetas, estos metodos opcionales nos brindarian esa opcion
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();

//Iniciamos el Bootstrap!
$bootstrap->init();
