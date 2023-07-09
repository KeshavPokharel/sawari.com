<?php
$server="localhost";
$username="root";
$password="";
$dbname="sawari";
$link=new mysqli($server,$username,$password,$dbname);
if($link->connect_error){
    die("connection failed:" . $link->connect_error);
}
?>