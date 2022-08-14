<?php 

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="app";


if(!$con= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
     die("faild to connect");
}

?>