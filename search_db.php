<?php
require_once("db.php");

if(!isset($_POST["inp"])) die("err");

$statement = $pdo->prepare("SELECT 1 FROM comments WHERE prof_id=:id LIMIT 1");
$statement->bindValue(':id', $_POST["inp"]);
$statement->execute();
echo json_encode($statement->fetchColumn() > 0);
?>