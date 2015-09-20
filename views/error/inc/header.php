<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
        <!--cada vez que se invoque al header se imprimira el Titulo contenido en la variable "$this->title"
            sino existe la variable imprimira por defecto 'PracticasCarrizal' como Title-->
        <title><?= (isset($this->title)) ? $this->title : 'PracticasCarrizal'; ?></title>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css" />
        <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
</head>
<body>
        <div class="container">