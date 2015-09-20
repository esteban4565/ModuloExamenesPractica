<?php

//Cuando se crea este Controller, adquiere todos los metodos de la clase padre "Controller"
class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('index/js/pruebas.js');
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

    //Metodos de Pruebas
    function prueba() {
        $this->view->title = 'Metodos de Pruebas';
        $this->view->asignaturas = $this->model->prueba();
        $this->view->render('header2');
        $this->view->render('index/prueba');
        $this->view->render('footer2');
    }

    function pruebasjs() {
        $this->model->pruebasjs();
    }

}
