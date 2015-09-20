<br><br><br>
<div class="row">
    <h1>Ingrese las preguntas del Examen</h1>
    <ul>
        <li>Al final de las respuesta podrá seleccionar la correcta, por defecto esta seleccionada la opción 1.</li>
        <li>Con el Botón "Guardar" almacenara la pregunta y sus respuestas.</li>
        <li>Para insertar una imagen en la pregunta dele clic al Botón "Examinar".</li>
        <li>Puede especificar el nombre del "Contenido" de la pregunta para tener una mejor referencia cuando obtenga los resultados estadisticos.</li><br>
    </ul>
    <form class="form-horizontal" method="post" action="<?php echo URL; ?>pregunta/create">
        <div class="form-group">
            <label class="col-xs-6 col-md-1">Asignatura:</label>
            <div class="col-xs-6 col-md-2">
            <select class="form-control input-sm" name="asignatura">
                <?php
                //cargo en el select todas las asignaturas que da el profesor
                foreach ($_SESSION['asignaturas'] as $key => $value) {
                    echo '<option value="' . $value['codigo'] . '">';
                    echo $value['nombre'] . '</option>';
                }
                ?>
            </select>
            </div>
            <label class="col-xs-6 col-md-1">Nivel:</label>
            <div class="col-xs-6 col-md-1">
            <select class="form-control input-sm" name="nivel">
                        <option> 7</option>
                        <option> 8</option>
                        <option> 9</option>
                        <option> 10</option>
                        <option> 11</option>
                        <option> 12</option>
            </select>
            </div>
            <label class="col-xs-4 col-md-1">Contenido:</label>
            <div class="col-xs-4 col-md-2">
            <select class="form-control input-sm" name="contenido" id="contenido">
                        <option>Seleccione</option>
                        <option value="nuevo">Nuevo</option>
                        <?php
                        //cargo en el select todos los contenidos creados por el profesor
                        foreach ($this->contenidos as $key => $value) {
                            echo '<option value="' . $value['cod_contenido'] . '">';
                            echo $value['nombre_contenido'] . '</option>';
                        }
                        ?>
            </select>
            </div>
            <div class="col-xs-4 col-md-2" id="div_contenido_tx" style="display:none;">
            <input class="form-control input-sm" type="text" name="contenido_tx">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12">Digite la Pregunta:</label>
            <div class="col-xs-12">
            <TEXTAREA class="form-control" rows="3" name="pregunta_tx" id="pregunta_tx">
            <?php $temp = &$_POST["content"]; echo isset($temp)?$temp:""; ?>
            </TEXTAREA>
            </div>
            <div class="col-xs-12">
            Adjuntar Imagen a la pregunta:<input type="file" name="img_pregunta" id="img_pregunta">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-3 col-md-2">Respuesta #1:</label>
            <div class="col-xs-3 col-md-2">
                <input class="form-control input-sm" type="text" name="respuesta1_tx">
            </div>
            <label class="col-xs-3 col-md-2">Imagen:</label>
            <div class="col-xs-3 col-md-6">
                <input class="form-control input-sm box" type="file" name="img_r1" id="img_r1">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-3 col-md-2">Respuesta #2:</label>
            <div class="col-xs-3 col-md-2">
                <input class="form-control input-sm" type="text" name="respuesta2_tx">
            </div>
            <label class="col-xs-3 col-md-2">Imagen:</label>
            <div class="col-xs-3 col-md-6">
                <input class="form-control input-sm box" type="file" name="img_r2" id="img_r2">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-3 col-md-2">Respuesta #3:</label>
            <div class="col-xs-3 col-md-2">
                <input class="form-control input-sm" type="text" name="respuesta3_tx">
            </div>
            <label class="col-xs-3 col-md-2">Imagen:</label>
            <div class="col-xs-3 col-md-6">
                <input class="form-control input-sm box" type="file" name="img_r3" id="img_r3">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-3 col-md-2">Respuesta #4:</label>
            <div class="col-xs-3 col-md-2">
                <input class="form-control input-sm" type="text" name="respuesta4_tx">
            </div>
            <label class="col-xs-3 col-md-2">Imagen:</label>
            <div class="col-xs-3 col-md-6">
                <input class="form-control input-sm box" type="file" name="img_r4" id="img_r4">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-7 col-md-2">Respuesta Correcta?</label>
            <div class="col-xs-6 col-md-1">
            <select class="form-control input-sm" name="correcta">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Guardar">
        </div>
</form>

<hr />
</div>
<script type="text/javascript">
CKEDITOR.config.toolbar_Full =
[
        { name: 'document', items : [ 'Source'] },
        { name: 'clipboard', items : [ 'Cut','Copy','Paste','-','Undo','Redo' ] },
        { name: 'editing', items : [ 'Find'] },
        { name: 'basicstyles', items : [ 'Bold','Italic','Underline'] },
        { name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight'] }
];			

CKEDITOR.replace('pregunta_tx', {
        skin: 'kama',
        language: lang,
        width: '850px',
        toolbar:'Full'
        //wirisimagecolor:'#000000',
        //wirisbackgroundcolor:'#ffffff',
        //wirisimagefontsize:'16px'					
});
</script>
