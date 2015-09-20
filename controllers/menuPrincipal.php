<?php

//Cuando se crea este Controller, el constructor se verifica si inicio sesion y si tiene permiso
//Ademas adquiere todos los metodos de la clase padre "Controller"
class MenuPrincipal extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    //La funcion Index crea una variable, "title" es utilizada para el Title(Parte superior) de la pagina
    //Esta variable sera utilizada en el View del Objeto (views/menuPrincipal/index)
    function index() {
        $this->view->title = 'Menú Principal';
        //Se manda a ejecutar el header, contenido principal (views/menuPrincipal/index) y el footer
        $this->view->render('header');
        $this->view->render('menuPrincipal/index');
        $this->view->render('footer');
    }

    //La funcion logout destruye las variables de Sesion y lo devuelve al Index de inicioSesion
    function logout() {
        Session::destroy();
        header('location: ' . URL . 'inicioSesion');
        exit;
    }

    function xhrInsert() {
        $this->model->xhrInsert();
    }

    function xhrGetListings() {
        $this->model->xhrGetListings();
    }

    function xhrDeleteListing() {
        $this->model->xhrDeleteListing();
    }

}
