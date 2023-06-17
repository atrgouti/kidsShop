<?php
session_start();
include_once "db-connect.php";
$id = $_GET['id'];
$current = 1;
$sql = "SELECT multipl FROM test WHERE id=?";
$res = $cone->prepare($sql);
$res->execute(array($id));
while($numi = $res->fetch()){
    $_SESSION['updatedPric'] =  $numi['multipl'];
}

$sql2 = 'UPDATE test SET multipl=? WHERE id=?';
$res2 = $cone->prepare($sql2);
$res2->execute(array($_SESSION['updatedPric'] + 1, $id));
if($res2){
    header("location: card.php");
}
?>