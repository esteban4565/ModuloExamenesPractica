<h1>Registro de Usuarios</h1>
<!--Este formulario enviara las variables por POST al Control "registro" y 
ejecutara el metodo "createPassword" (registro/createPassword)-->
<form method="post" action="<?php echo URL;?>registro/createPassword">
    <label>Cedula</label><input type="text" name="cedula" /><br />
    <label>Password</label><input type="password" name="password" /><br />
    <label>&nbsp;</label><input type="submit" />
</form>