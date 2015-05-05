<?php

//Cuando se crea este Controller, el constructor se verifica si inicio sesion y si tiene permiso
//Ademas adquiere todos los metodos de la clase padre "Controller"
class ConfigExamen extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    //La funcion Index crea dos variables, "title" es utilizada para el Title(Parte superior) de la pagina
    //Tambien la variable contenidos, la cual lleva un registro con todos lo contenidos creados por el usuario
    //Estas variables seran utilizada en el View del Objeto (views/pregunta/index)
    public function index() {
        $this->view->title = 'Configurar Examen';

        $this->view->render('header');
        $this->view->render('configExamen/index');
        $this->view->render('footer');
    }

    public function create() {
        if ($_POST['contenido'] == 'Nuevo') {
            $contenido = $_POST['contenido_tx'];
            $nivel_contenido = $_POST['nivel'];
            $codContenido =$this->model->createContenido($contenido, $nivel_contenido);
        } else {
            
            $codContenido = $_POST['contenido'];
        }
        
        $data = array(
            'asignatura' => $_POST['asignatura'],
            'nivel' => $_POST['nivel'],
            'pregunta_tx' => $_POST['pregunta_tx'],
            'respuesta1_tx' => $_POST['respuesta1_tx'],
            'respuesta2_tx' => $_POST['respuesta2_tx'],
            'respuesta3_tx' => $_POST['respuesta3_tx'],
            'respuesta4_tx' => $_POST['respuesta4_tx'],
            'correcta' => $_POST['correcta'],
            'contenido' => $codContenido
        );
        $this->model->create($data);
        header('location: ' . URL . 'pregunta');
    }

    public function edit($id) {
        $this->view->note = $this->model->noteSingleList($id);

        if (empty($this->view->note)) {
            die('This is an invalid note!');
        }

        $this->view->title = 'Edit Note';

        $this->view->render('header');
        $this->view->render('note/edit');
        $this->view->render('footer');
    }

    public function editSave($noteid) {
        $data = array(
            'noteid' => $noteid,
            'title' => $_POST['title'],
            'content' => $_POST['content']
        );

        // @TODO: Do your error checking!

        $this->model->editSave($data);
        header('location: ' . URL . 'note');
    }

    public function delete($id) {
        $this->model->delete($id);
        header('location: ' . URL . 'note');
    }

}
