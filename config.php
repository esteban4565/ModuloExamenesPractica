<?php

define('LIBS', 'libs/');
// siempre hay que poner SLASH (/) despues A PATH

//variables cuando uso localhost
define('URL', 'http://localhost/ModuloExamenesPractica/');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'banco_examenes');
define('DB_USER', 'root');
define('DB_PASS', '');

//variables cuando uso hostinger.com
//define('URL', 'http://pruebasesteban.bl.ee/');
//define('DB_TYPE', 'mysql');
//define('DB_HOST', 'mysql.hostinger.es');
//define('DB_NAME', 'u276605033_bd');
//define('DB_USER', 'u276605033_eqs');
//define('DB_PASS', '63246884565');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');


//Forma de Encriptacion del Password
//echo Hash::create('sha256', 'jesse', HASH_PASSWORD_KEY);
//echo Hash::create('sha256', 'test2', HASH_PASSWORD_KEY);
        
//Forma de Imprimir un Array
//echo '<pre>';
//print_r($data);
//echo '</pre>';