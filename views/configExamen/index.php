<br><br><br>
<div class="row">
<h1>Configure el Examen</h1>
    <ul>
        <li>Ahora asigne la cantidad de preguntas de cada contenido para el examen</li>
        <li>Luego dale clic al boton continuar</li>
    </ul><br>
    <form class="form-horizontal" method="post" action="<?php echo URL; ?>configExamen/create">
        <div class="form-group">
            <label class="col-xs-6 col-md-2">Nombre de Examen</label>
            <div class="col-xs-6 col-md-2">
                <input type="text" name="nom_examen_tx">
            </div>

            <label class="col-xs-6 col-md-1">Asignatura:</label>
            <div class="col-xs-6 col-md-2">
                <select name="cod_materia">
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
                <select name="nivel">
                        <option> 7</option>
                        <option> 8</option>
                        <option> 9</option>
                        <option> 10</option>
                        <option> 11</option>
                        <option> 12</option>
                    </select>
            </div>

            <label class="col-xs-6 col-md-2">Cantidad de preguntas</label>
            <div class="col-xs-6 col-md-1">
                <input type="text" name="cant_preguntas_tx">
            </div>
        </div>
            
        <div class="form-group">
            <input type="submit" value="Continuar"/>
        </div>
    </form>

    <hr />
    
</div>