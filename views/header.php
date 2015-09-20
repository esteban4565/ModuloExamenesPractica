<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
        <!--cada vez que se invoque al header se imprimira el Titulo contenido en la variable "$this->title"
            sino existe la variable imprimira por defecto 'PracticasCarrizal' como Title-->
        <title><?= (isset($this->title)) ? $this->title : 'PracticasCarrizal'; ?></title>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/ckeditorWiris/plugins/ckeditor_wiris/core/display.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/ckeditorWiris/plugins/ckeditor_wiris/integration/WIRISplugins.js?viewer=image"></script> 
        <script type="text/javascript" src="<?php echo URL; ?>public/ckeditorWiris/ckeditor.js"></script>
        
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css" />
        <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
            }
        }
        ?>
        <script type="text/javascript">
			// Retrieve language from either URL or POST parameters
			function getParameter(name,dflt) {
				var value = new RegExp(name+"=([^&]*)","i").exec(window.location);
				if (value!=null && value.length>1) return decodeURIComponent(value[1].replace(/\+/g,' ')); else return dflt;
			}
		    var lang = getParameter("language","<?php $temp = &$_POST["language"]; echo isset($temp)?$temp:""; ?>");
			if (lang.length==0) lang="es";
	</script>
    </head>
    <body>
        <div class="container">
        <?php Session::init(); ?>

            <?php if (Session::get('loggedIn') == false): ?>
                    <nav class="navbar navbar-default navbar-fixed-top">
                        <div class="container-fluid">
                          <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo URL; ?>index/index">Inicio</a>
                          </div>

                          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                              <li><a href="<?php echo URL; ?>ayuda">Ayuda</a></li>
                              <li><a href="<?php echo URL; ?>registro">Registrarse</a></li>
                              <li><a href="<?php echo URL; ?>inicioSesion">Iniciar Sesión</a></li>
                            </ul>
                          </div>
                        </div>
                      </nav>
            <?php endif; ?>    
            <?php if (Session::get('loggedIn') == true){ ?>
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo URL; ?>index/index">Inicio</a>
                      </div>

                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <li><a href="<?php echo URL; ?>examen">Ver Examen</a></li>
                      <li><a href="<?php echo URL; ?>matricula">Matricular Examen</a></li>
                              <?php if (Session::get('role') == 'docente'){ ?>
                                        <li><a href="<?php echo URL; ?>pregunta">Preguntas</a></li>
                                        <li><a href="<?php echo URL; ?>configExamen">Configurar Examen</a></li>
                                        <li><a href="<?php echo URL; ?>user">Estadística</a></li>
                              <?php } ?>
                        <ul class="nav navbar-nav navbar-right">
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-user"></i> <?php echo $_SESSION['nombre']; ?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Editar perfil</a></li>
                              <li><a href="<?php echo URL; ?>ayuda">Ayuda</a></li>
                                <li><a href="<?php echo URL; ?>menuPrincipal/logout">Salir</a></li>
                            </ul>
                          </li>
                        </ul>
                    </ul>
                  </div>
                </div>
            </nav>
                <?php } ?>