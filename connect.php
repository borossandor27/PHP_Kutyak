<?php

$mysqli = new mysqli("localhost", "root", "", "php_debrecen");
if($mysqli->connect_errno){
    die("Adatbázis nem elérhető");
}

