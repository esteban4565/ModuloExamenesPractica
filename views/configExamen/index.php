<h1>Configure el Examen</h1>
<body>
    <ul>
        <li>Ahora asigne la cantidad de preguntas de cada contenido para el examen</li>
        <li>Luego dale clic al boton continuar</li>
    </ul><br>
    <form method="post" action="<?php echo URL; ?>configExamen/create">
        <table>
            <tr>
                <td>
                    Nombre de Examen
                </td>
                <td>
                    <input type="text" name="nom_examen_tx">
                </td>
            </tr>

            <tr>
                <td>
                    Asignatura:
                </td>

                <td>
                    <select name="cod_materia">
                        <?php
                        //cargo en el select todas las asignaturas que da el profesor
                        foreach ($_SESSION['asignaturas'] as $key => $value) {
                            echo '<option value="' . $value['codigo'] . '">';
                            echo $value['nombre'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    Nivel: 
                </td>

                <td>
                    <select name="nivel">
                        <option> 7</option>
                        <option> 8</option>
                        <option> 9</option>
                        <option> 10</option>
                        <option> 11</option>
                        <option> 12</option>
                    </select> 
                </td>
            </tr>

            <tr>
                <td>
                    Cantidad de preguntas
                </td>
                <td>
                    <input type="text" name="cant_preguntas_tx">
                </td>
            </tr>
        </table>
        <br>
        <label>&nbsp;</label><input type="submit" value="Continuar"/>
    </form>

    <hr />