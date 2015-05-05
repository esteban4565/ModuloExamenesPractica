<!doctype html>
<html>
    <head>
        <!--cada vez que se invoque al header se imprimira el Titulo contenido en la variable "$this->title"
            sino existe la variable imprimira por defecto 'PracticasCarrizal' como Title-->
        <title><?= (isset($this->title)) ? $this->title : 'PracticasCarrizal'; ?></title>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" />    
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/sunny/jquery-ui.css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
            }
        }
        ?>
    </head>
    <body>

        <?php Session::init(); ?>

        <div id="header">

            <?php if (Session::get('loggedIn') == false): ?>
                <a href="<?php echo URL; ?>index">Inicio</a>
                <a href="<?php echo URL; ?>ayuda">Ayuda</a>
                <a href="<?php echo URL; ?>registro">Registrarse</a>
            <?php endif; ?>    
            <?php if (Session::get('loggedIn') == true): ?>
                <a href="<?php echo URL; ?>examen">Ver Examen</a>
                <a href="<?php echo URL; ?>matricula">Matricular Examen</a>

                <?php if (Session::get('role') == 'docente'): ?>
                    <a href="<?php echo URL; ?>pregunta">Preguntas</a>
                    <a href="<?php echo URL; ?>configExamen">Configurar Examen</a>
                    <a href="<?php echo URL; ?>user">Estad&iacutestica</a>
                <?php endif; ?>

                <a href="<?php echo URL; ?>menuPrincipal/logout">Salir</a>    
            <?php else: ?>
                <a href="<?php echo URL; ?>inicioSesion">Iniciar Sesi&oacuten</a>
            <?php endif; ?>
        </div>

        <div id="content">