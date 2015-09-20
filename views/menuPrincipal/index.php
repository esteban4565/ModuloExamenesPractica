<br><br><br>
<div class="row">
    <h1>Menú Principal</h1>
    <p>Bienvenido(a) <?php echo $_SESSION['nombre']; ?></p>
    <?php
    //si el usuario es de tipo 'docente' imprimo sus asignaturas
    if (Session::get('role') == 'docente') {
    ?>
        <p>Profesor(a) de: </p><br>
        <table class="table">
        <tr>
        <td>Asignatura(s)</td>
        </tr>
    <?php
        foreach ($_SESSION['asignaturas'] as $key => $value) {
    ?>
            <tr>
            <td><?php echo $value['nombre']; ?></td>
            </tr>
    <?php
        }
    ?>
    </table>
    <?php
    }
    //si el usuario es de tipo 'estudiante' imprimo su seccion
    if (Session::get('role') == 'estudiante') {
    ?>
        <p>Estudiante de la: </p><br>
        <table class="table">
        <tr>
        <td>Sección</td>
        </tr>
    <?php
        foreach ($_SESSION['seccion'] as $key => $value) {
    ?>
        <tr>
        <td><?php echo $value['nivel'] . '-' . $value['grupo'];?></td>
        </tr>
    <?php
        }
    ?>
    </table>
</div>
<?php
}
?>