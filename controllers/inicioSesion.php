<?php

//Cuando se crea este Controller, adquiere todos los metodos de la clase padre "Controller"
class InicioSesion extends Controller {

    function __construct() {
        parent::__construct();
    }

    //La funcion Index crea una variable, "title" es utilizada para el Title(Parte superior) de la pagina
    //Esta variable sera utilizada en el View del Objeto (views/inicioSesion/index)
    function index() {
        $this->view->title = 'Inicio Sesi&oacuten';

        //Se manda a ejecutar el header, contenido principal (views/inicioSesion/index) y el footer
        $this->view->render('header');
        $this->view->render('inicioSesion/index');
        $this->view->render('footer');
    }

    //La funcion run llama a otra funcion llamada run del model del controller (inicioSesion_model)
    function run() {
        $this->model->run();
    }

}
