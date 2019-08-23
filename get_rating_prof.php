<?php
require_once("db.php");

$id = isset($_POST["id"]) ? $_POST["id"] : '';
if(!is_numeric($id)) die("err");

$prepared = $pdo->prepare("SELECT pr5 FROM comments WHERE prof_id=:id");
$prepared->bindValue(':id', $id);
$prepared->execute();
if (($number=$prepared->rowCount()) == 0) die(0);
$c = $prepared->fetchAll(PDO::FETCH_ASSOC);
$total = 0;
$number = 0;
foreach ($c as $rate){
	$total += $rate["pr5"];
	$number++;
}
die(number_format((float)($total/$number), 2, '.', ''));
?>