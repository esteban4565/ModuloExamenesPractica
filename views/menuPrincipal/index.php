<?php

//cuando carga el index del menu principal (menuPrincipal/index), doy la bienvenida e imprimo el nombre del usuario
echo 'Men&uacute Principal...<br/><br/>Bienvenido!<br/>';
echo $_SESSION['nombre'] . '<br/><br/>';
//si el usuario es de tipo 'docente' imprimo sus asignaturas
if (Session::get('role') == 'docente') {
    echo 'Profesor de:<br/>';
    echo '<table border="1">';
    echo '<tr>';
    echo '<td>Codigo</td>';
    echo '<td>Asignatura</td>';
    echo '</tr>';
    foreach ($_SESSION['asignaturas'] as $key => $value) {
        echo '<tr>';
        echo '<td>' . $value['codigo'] . '</td>';
        echo '<td>' . $value['nombre'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
//si el usuario es de tipo 'estudiante' imprimo su seccion
if (Session::get('role') == 'estudiante') {
    echo 'Estudiante de la:<br/>';
    foreach ($_SESSION['seccion'] as $key => $value) {
        echo $value['nivel'] . '-' . $value['grupo'];
    }
}
    
//pruebas
echo '<br/><br/>';
//echo $this->prueba;
//echo '<pre>';
//print_r($this->prueba);
//echo '</pre>';
//
//$var_dump=(int) $this->prueba['codigo'] + 1;
//
//echo '<br/><br/>';
//echo $var_dump;