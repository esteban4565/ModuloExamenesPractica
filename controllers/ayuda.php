<?php

//Cuando se crea este Controller, adquiere todos los metodos de la clase padre "Controller"
class Ayuda extends Controller {

    function __construct() {
        parent::__construct();
    }

    //La funcion Index crea una variable, "title" es utilizada para el Title(Parte superior) de la pagina
    //Esta variable sera utilizada en el View del Objeto (views/ayuda/index)
    function index() {
        $this->view->title = 'Ayuda';

        $this->view->render('header');
        $this->view->render('ayuda/index');
        $this->view->render('footer');
    }

}
