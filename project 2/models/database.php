<?php


//database server type which is mysql, the location which is just localhost
//and the database name which is stock
$data_source_name = 'mysql:host=localhost;dbname=stock';

$username = 'stockuser';
$password = 'test';


    $database = new PDO($data_source_name, $username, $password);
    //pdo allows you to connect to the database


?>


