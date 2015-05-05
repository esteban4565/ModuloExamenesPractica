<?php

//Cuando se crea este Controller, adquiere todos los metodos de la clase padre "Controller"
class Error extends Controller {

    function __construct() {
        parent::__construct();
    }

    //La funcion Index crea dos variables, "title" es utilizada para el Title(Parte superior) de la pagina
    //Tambien la variable msg, la cual lleva un mensaje personalizado
    //Estas variables seran utilizada en el View del Objeto (views/error/index)
    function index() {
        $this->view->title = '404 Error';
        $this->view->msg = 'Esta P&aacutegina no existe!';

        //Se manda a ejecutar el header personalizado para el error, diferente al resto de la aplicacion (views/error/inc/header)
        //luego al contenido principal (views/error/index) y el footer personalizado para el error
        $this->view->render('error/inc/header');
        $this->view->render('error/index');
        $this->view->render('error/inc/footer');
    }

}
