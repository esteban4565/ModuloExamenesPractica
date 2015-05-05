<?php

//Cuando se crea este Controller, adquiere todos los metodos de la clase padre "Controller"
class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    //La funcion Index crea una variable, "title" es utilizada para el Title(Parte superior) de la pagina
    //Esta variable sera utilizada en el View del Objeto (views/index/index)
    function index() {
        $this->view->title = 'Inicio';

        //Se manda a ejecutar el header, contenido principal (views/index/index) y el footer
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

    //La funcion registrarse crea una variable, "title" es utilizada para el Title(Parte superior) de la pagina
    //Esta variable sera utilizada en el View del Objeto (views/index/registrarse)
    function registrarse() {
        $this->view->title = 'Registrarse';

        $this->view->render('header');
        $this->view->render('index/registrarse');
        $this->view->render('footer');
    }

}
