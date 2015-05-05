<h1>Cantidad de Preguntas por Contenido</h1>
<br>
<?php
if (count($this->contenidos) > 0) {
    ?>
    <form name="config_examen_parte2" method="Post" action="<?php echo URL; ?>configExamen/guardar">
        <h1>Configure el Examen</h1>
        <ul>
            <li>Ahora asigne la cantidad de preguntas de cada contenido para el examen</li>
            <li>Luego dale clic al boton continuar</li>
        </ul>
        <?php
        echo '<table border="2">';
        echo '<tr>';
        $contador_contenidos = 0;
        foreach ($this->contenidos as $key => $value) {
            echo '<td>';
            //como no se cuantos contenidos genero la seleccion del usuario, voy guardando la cantidad de contenidos en un contador
            echo $value['nombre_contenido'];

            //mando oculto por el POST el codigo del contenido
            echo '<input type="hidden" name="cod_contenido' . $contador_contenidos . '" value="' . $value['cod_contenido'] . '">';

            echo '</td>';
            $contador_contenidos++;
        }
        //termino la primer fila, contiene los nombres de los contenidos
        echo '</tr>';
        echo '<tr>';

        //este primer for me va crear la segunda fila, con la ayuda del contador puedo saber cuantas celdas debe tener
        for ($i = 1; $i <= $contador_contenidos; $i++) {
            echo '<td>';
            //cada celda tiene un select con la cantidad de preguntas que especifico el usuario, de 0 a n... 
            //la cantidad de preguntas por contenido del select (que sera enviado por el POST)es concatenado con el contador de contenidos
            echo '<select name="cantidad_preguntas_contenido' . $i . '">';
            for ($u = 0; $u <= $this->cant_preguntas; $u++) {
                echo '<option>' . $u . '</option>';
            }
            echo '</select>';
            echo '</td>';
        }

        //cierro la segunda fila y la tabla
        echo '</tr>';
        echo '</table>';
        echo '<br>';
        //aqui envio los parametros al if de "Guardar"
        echo '<input type="hidden" name="contador_contenidos" value="' . $contador_contenidos . '">';
        echo '<input type="hidden" name="nombre_examen" value="' . $nombre_examen . '">';
        echo '<input type="hidden" name="nivel" value="' . $nivel . '">';
        echo '<input type="hidden" name="cod_materia" value="' . $cod_materia . '">';
        echo '<input type="hidden" name="cant_preguntas" value="' . $cant_preguntas . '">';
        echo '<label>&nbsp;</label><input type="submit" value="Guardar"/>';
        echo '</form>';
    } else {
        echo '<font color="red">No existen contenidos para el nivel seleccionado</font>';
    }
    ?>