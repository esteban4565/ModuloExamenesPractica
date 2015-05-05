<h1>Ingrese las preguntas del Examen</h1>
<body>
    <ul>
        <li>Al final de las respuesta podr&aacute seleccionar la correcta, por defecto esta seleccionada la opci&oacuten 1.</li>
        <li>Con el Bot&oacuten "Guardar" almacenara la pregunta y sus respuestas.</li>
        <li>Con el Bot&oacuten "Examen" podr&aacute observar el total de preguntas almacenadas.</li>
        <li>Para insertar una imagen en la pregunta dele clic al Bot&oacuten "Examinar".</li>
        <li>Puede especificar el nombre del "Contenido" de la pregunta para tener una mejor referencia cuando obtenga los resultados estadisticos.</li><br>
    </ul>
    <form method="post" action="<?php echo URL; ?>pregunta/create">
        <table>
            <tr>
                <td>
                    Asignatura:
                    <select name="asignatura">
                        <?php
                        //cargo en el select todas las asignaturas que da el profesor
                        foreach ($_SESSION['asignaturas'] as $key => $value) {
                            echo '<option value="' . $value['codigo'] . '">';
                            echo $value['nombre'] . '</option>';
                        }
                        ?>
                    </select>
                </td>

                <td>
                    Nivel: <select name="nivel">
                        <option> 7</option>
                        <option> 8</option>
                        <option> 9</option>
                        <option> 10</option>
                        <option> 11</option>
                        <option> 12</option>
                    </select> 
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td>
                    Contenido: <select name="contenido">
                        <option>Nuevo</option>
                        <?php
                        //cargo en el select todos los contenidos creados por el profesor
                        foreach ($this->contenidos as $key => $value) {
                            echo '<option value="' . $value['cod_contenido'] . '">';
                            echo $value['nombre_contenido'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <input type="text" name="contenido_tx">
                </td>
            </tr>
        </table>
        <br>Digite la Pregunta:<br>
        <TEXTAREA COLS=90 ROWS=3 NAME="pregunta_tx"></TEXTAREA>
<br>Adjuntar Imagen a la pregunta<input type="file" name="img_pregunta" class="box" id="img_pregunta"><br><br>
<table border="2">
    <tr>
        <td>
            <b>Respuesta</b>
        </td>
        <td>
            <b>Imagen</b>
        </td>
    </tr>
    <tr>
        <td>
            1: <input type="text" name="respuesta1_tx">
        </td>
        <td>
            <input type="file" name="img_r1" class="box" id="img_r1">
        </td>
    </tr>
    <tr>
        <td>
            2: <input type="text" name="respuesta2_tx">
        </td>
        <td>
            <input type="file" name="img_r2" class="box" id="img_r2">
        </td>
    </tr>
    <tr>
        <td>
            3: <input type="text" name="respuesta3_tx">
        </td>
        <td>
            <input type="file" name="img_r3" class="box" id="img_r3">
        </td>
    </tr>
    <tr>
        <td>
            4: <input type="text" name="respuesta4_tx">
        </td>
        <td>
            <input type="file" name="img_r4" class="box" id="img_r4">
        </td>
    </tr>
</table>
<br>Respuesta Correcta?
<select name="correcta">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
</select>
<br>
<label>&nbsp;</label><input type="submit" value="Guardar"/>
</form>

<hr />

<table>

</table>

<script>
        $(function() {

            $('.delete').click(function(e) {
                var c = confirm("Are you sure you want to delete?");
                if (c == false)
                    return false;

            });

        });
    </script>