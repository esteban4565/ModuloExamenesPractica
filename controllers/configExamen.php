<?php

//Cuando se crea este Controller, el constructor se verifica si inicio sesion y si tiene permiso
//Ademas adquiere todos los metodos de la clase padre "Controller"
class ConfigExamen extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    //La funcion Index crea una variable, "title" es utilizada para el Title(Parte superior) de la pagina
    //Se renderiza al View del Objeto (views/configExamen/index)
    public function index() {
        $this->view->title = 'Configurar Examen';

        $this->view->render('header');
        $this->view->render('configExamen/index');
        $this->view->render('footer');
    }

    //La funcion create inserta en la BD los datos principales del examen
    //Se envia los datos en un array hacia una funcion del modelo
    public function create() {
        $contenidos = $this->model->contenidos($_POST['nivel']);
        if(count($contenidos)>0){
        $data = array(
            'nom_examen_tx' => $_POST['nom_examen_tx'],
            'nivel' => $_POST['nivel'],
            'cod_materia' => $_POST['cod_materia'],
            'cant_preguntas_tx' => $_POST['cant_preguntas_tx']
        );
        $this->model->create($data);
        }
        //La segunda parte de esta funcion consiste en elegir la cantidad de preguntas por contenido del examen
        //Se renderiza al View del Objeto (views/configExamen/cantidadContenido)
        $this->view->title = 'Cantidad de Preguntas por Contenido';
        $this->view->contenidos = $contenidos;
        $this->view->cant_preguntas = $_POST['cant_preguntas_tx'];
        $this->view->render('header');
        $this->view->render('configExamen/cantidadContenido');
        $this->view->render('footer');
    }

    //La funcion create inserta en la BD los datos principales del examen
    //Se envia los datos en un array hacia una funcion del modelo
    public function guardar() {
        
        if(1>0){
        $data = array(
            'nom_examen_tx' => $_POST['nom_examen_tx'],
            'nivel' => $_POST['nivel'],
            'cod_materia' => $_POST['cod_materia'],
            'cant_preguntas_tx' => $_POST['cant_preguntas_tx']
        );
        $this->model->create($data);
        }
        //La segunda parte de esta funcion consiste en elegir la cantidad de preguntas por contenido del examen
        //Se renderiza al View del Objeto (views/configExamen/cantidadContenido)
        $this->view->title = 'Cantidad de Preguntas por Contenido';
        $this->view->contenidos = $contenidos;
        $this->view->cant_preguntas = $_POST['cant_preguntas_tx'];
        $this->view->render('header');
        $this->view->render('configExamen/cantidadContenido');
        $this->view->render('footer');
    }
}