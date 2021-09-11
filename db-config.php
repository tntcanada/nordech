<?php

$DB_host = "localhost";
$DB_user = "user";
$DB_pass = "password";
$DB_name = "nameofthedbyoucreate";


$DB_con="";
try
{
 $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
 echo $e->getMessage();
}

include_once 'db.php';

$crud = new crud($DB_con);

?>