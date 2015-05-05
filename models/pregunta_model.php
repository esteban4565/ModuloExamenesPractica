<?php

//Cuando se crea este Modelo, adquiere todos los metodos de la clase padre "Model"
class Pregunta_Model extends Model {

    //El constructor invoca al padre que esta en "libs/Model", este posee una variable llamada "db" con el acceso a la BD
    //db es un objeto "Database" y posee las siguientes funciones: select, insert, update y delete
    public function __construct() {
        parent::__construct();
    }

    //La funcion contenidos devuelve un array con todos los contenidos del Usuario 
    public function contenidos() {
        return $this->db->select('SELECT cod_contenido, nombre_contenido FROM contenidos '
                                . 'WHERE ced_docente = :ced_docente '
                                . 'AND nivel_contenido = 7', array('ced_docente' => $_SESSION['userid']));
    }

    public function noteSingleList($noteid) {
        return $this->db->select('SELECT * FROM note WHERE userid = :userid AND noteid = :noteid', array('userid' => $_SESSION['userid'], 'noteid' => $noteid));
    }

    public function create($data) {
        //Consulto maximo numero_respuesta
        $consultaMaxRespuesta = $this->db->select("SELECT MAX(numero_respuesta) as codigo FROM respuestas");
        $cod_respuesta = (int) $consultaMaxRespuesta[0]['codigo'] + 1;


        //Inserto Respuestas
        $this->db->insert('respuestas', array(
            'numero_respuesta' => $cod_respuesta,
            'respuesta1' => $data['respuesta1_tx'],
            'respuesta2' => $data['respuesta2_tx'],
            'respuesta3' => $data['respuesta3_tx'],
            'respuesta4' => $data['respuesta4_tx'],
            'correcta' => $data['correcta']
        ));

        //verifico contenido
        if ($data['contenido'] == 'Nuevo') {
            $contenidoGrabado = $data['contenido_tx'];
        } else {
             $contenidoGrabado = $data['contenido'];
        }

         //Consulto maximo numero_pregunta
        $consultaMaxPregunta = $this->db->select("SELECT MAX(numero_pregunta) as codigo FROM preguntas");
        $numero_pregunta = (int) $consultaMaxPregunta[0]['codigo'] + 1;
        
        
        //inserto pregunta
        $this->db->insert('preguntas', array(
            'numero_pregunta' => $numero_pregunta,
            'cod_respuesta' => $cod_respuesta,
            'cod_img_pregunta' =>0,
            'cod_materia' => $data['asignatura'],
            'ced_docente' => $_SESSION['userid'],
            'pregunta' => $data['pregunta_tx'],
            'nivel' => $data['nivel'],
            'contenido' => $contenidoGrabado
        ));
    }

    public function createContenido($contenido, $nivel_contenido) {
        //Consulto maximo cod_contenido
        $consultaMaxContenido = $this->db->select("SELECT MAX(cod_contenido) as codigo FROM contenidos");
        $cod_contenido = (int) $consultaMaxContenido[0]['codigo'] + 1;


        //Inserto contenido
        $this->db->insert('contenidos', array(
            'cod_contenido' => $cod_contenido,
            'ced_docente' => $_SESSION['userid'],
            'nombre_contenido' => $contenido,
            'nivel_contenido' => $nivel_contenido
        ));
        return $cod_contenido;
    }
    public function editSave($data) {
        $postData = array(
            'title' => $data['title'],
            'content' => $data['content'],
        );

        $this->db->update('note', $postData, "`noteid` = '{$data['noteid']}' AND userid = '{$_SESSION['userid']}'");
    }

    public function delete($id) {
        $this->db->delete('note', "`noteid` = {$data['noteid']} AND userid = '{$_SESSION['userid']}'");
    }

}
