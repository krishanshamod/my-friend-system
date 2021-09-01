<?php
$link = new MySQLi("localhost","root","","myfriendsystem");
    
if($link->connect_error){
    die("Database connecting failed");
}

?>