<?php
$unameeeee = 'root'/*'root'*/;
$passssss = ''/*'123'*/;
$dbnameeee = 'localhost';
$pdo = new PDO('mysql:host=localhost;dbname='.$dbnameeee, $unameeeee, $passssss);
$pdo->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
?>
