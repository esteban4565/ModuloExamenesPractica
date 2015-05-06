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
        $cod_examen=$this->model->create($data);
        
        }
        //La segunda parte de esta funcion consiste en elegir la cantidad de preguntas por contenido del examen
        //Se renderiza al View del Objeto (views/configExamen/cantidadContenido)
        $this->view->title = 'Cantidad de Preguntas por Contenido';
        $this->view->contenidos = $contenidos;
        $this->view->cod_examen = $cod_examen;
        $this->view->cant_preguntas = $_POST['cant_preguntas_tx'];
        $this->view->render('header');
        $this->view->render('configExamen/cantidadContenido');
        $this->view->render('footer');
    }

    //La funcion create inserta en la BD los datos principales del examen
    //Se envia los datos en un array hacia una funcion del modelo
    public function guardar() {
        
        //paso las variables del POST a variables locales, $suma me verifica si la suma de preguntas de los contenidos es igual a la cantidad de preguntas del examen
	$suma=0;
	$cant_preguntas=$_POST['cant_preguntas'];
	$contador_contenidos=$_POST['contador_contenidos'];
	$cod_examen=$_POST['cod_examen'];
        //con el for puedo recorrer los contenidos existentes para sumarlos, ellos tiene la cantida de preguntas por contenido que quiere el usuario en el examen
	for ($i = 1; $i <= $contador_contenidos; $i++) 
		{
		$suma=$suma+$_POST['cantidad_preguntas_contenido'.$i.''];
		}
		
	if ($suma==$cant_preguntas)
		{
		//inserto los parametros de la tabla contenidos_examen, como no se cuantos contenidos son, debo recorrer el contador con el for
		//$j se concatenara con cantidad_preguntas_contenido, el resultado es la cantidad de preguntas que escogio el usuario para ese contenido en especifico
		$j=1;
		$varError=0;
		for ($i = 0; $i < $contador_contenidos; $i++) 
			{
			$cod_contenido=$_POST['cod_contenido'.$i];
			$canti_preg_examen=$_POST['cantidad_preguntas_contenido'.$j];
			$consulta_cantidad_preguntas=(int)$this->model->consulta_cantidad_preguntas($cod_contenido);
                        
                        
                        //**** Voy por aqui ****//
                        print_r($consulta_cantidad_preguntas);
                        return false;
			//si existen menos cantidad de registros que preguntas solicitadas por el contenido, lanzo advertencia y detengo el proceso
			if($canti_preg_examen > $consulta_cantidad_preguntas)
				{
				$consulta_nombre_contenido=mysql_query("SELECT nombre_contenido
												FROM contenidos
												WHERE cod_contenido='".$cod_contenido."'",$conexion) or die ('Error, SELECT nombre contenido: '.mysql_error());
				if($fila2 = mysql_fetch_array($consulta_nombre_contenido))
					{
					$nombre_contenido=$fila2['nombre_contenido'];
					}
				echo '<font color="red">ATENCION:<br>No existen suficientes Preguntas en la Base de Datos para la cantidad solicitada del contenido "'.$nombre_contenido.'"</font><br>';
				echo 'ud solicito '.$canti_preg_examen.' y solamente existen '.$canti_preg_BD;
				$varError=1;
				}
			$j++;
			}
                }
    }
}