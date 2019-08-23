<?php
require_once("db.php");

$id = isset($_POST["id"]) ? $_POST["id"] : '';
if(!is_numeric($id)) die("[0,0]");

$prepared = $pdo->prepare("SELECT cr6 FROM comments WHERE course_id=:id");
$prepared->bindValue(':id', $id);
$prepared->execute();
if (($count = $prepared->rowCount()) == 0) die("[0,0]");
$c = $prepared->fetchAll(PDO::FETCH_ASSOC);
$total = 0;
foreach ($c as $rate){
	$total += $rate["cr6"];
}
die('['.number_format((float)($total/$count), 2, '.', '').','.$count.']');
?>