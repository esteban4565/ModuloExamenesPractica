<?php

//Cuando se crea este Controller, adquiere todos los metodos de la clase padre "Controller"
class Registro extends Controller {

    public function __construct() {
        parent::__construct();
    }

    //La funcion Index crea una variable, "title" es utilizada para el Title(Parte superior) de la pagina
    //Esta variable sera utilizada en el View del Objeto (views/registro/index)
    public function index() {
        $this->view->title = 'Registro de Usuarios';

        $this->view->render('header');
        $this->view->render('registro/index');
        $this->view->render('footer');
    }

    //La funcion correcto crea dos variables, "title" es utilizada para el Title(Parte superior) de la pagina
    //Tambien la variable msg, la cual lleva un mensaje personalizado
    //Estas variables seran utilizada en el View del Objeto (views/registro/correcto)
    public function correcto() {
        $this->view->title = 'verificaci&oacuten';
        $this->view->msj = 'Su password fue actualizado, ya puede Iniciar Sesi&oacuten!';

        $this->view->render('header');
        $this->view->render('registro/correcto');
        $this->view->render('footer');
    }

    //La funcion correcto crea dos variables, "title" es utilizada para el Title(Parte superior) de la pagina
    //Tambien la variable msg, la cual lleva un mensaje personalizado
    //Estas variables seran utilizada en el View del Objeto (views/registro/incorrecto)
    public function incorrecto() {
        $this->view->title = 'verificaci&oacuten';
        $this->view->msj = 'Su n&uacutemero de identidad (cedula-pasaporte) est&aacute mal escrito o no se encuentra en la '
                . 'Base de Datos, por favor comun&iacutequese con el profesor Esteban Quesada Silva!';

        $this->view->render('header');
        $this->view->render('registro/incorrecto');
        $this->view->render('footer');
    }

    //La funcion createPassword 
    public function createPassword() {
        //creo un array con las dos variables recibidas por el POST
        $data = array();
        $data['cedula'] = $_POST['cedula'];
        $data['password'] = $_POST['password'];

        //mando el array a una funcion llamada createPassword del modelo del objeto
        //esa funcion me devuelve 1 o 0 y lo guardo en la variable $verificacion
        $verificacion = $this->model->createPassword($data);

        //si es 1, le mando al navegador la direccion URL.'registro/correcto'
        //Ej: localhost/ModuloExamenesPractica/registro/correcto
        if ($verificacion == 1) {
            header('location: ' . URL . 'registro/correcto');
        } else {
            header('location: ' . URL . 'registro/incorrecto');
        }
    }

}
