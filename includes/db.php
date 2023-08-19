<?php
ob_start(); ?>
<?php

$db['db_host'] = "db";
$db['db_user'] = "root";
$db['db_password'] = "root";
$db['db_name'] = "cms";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// if (!$connection) {
//     echo 'no se pudo conectar a la base de datos';
// } else {
//     echo "Genial esto esta conectado";
// }
