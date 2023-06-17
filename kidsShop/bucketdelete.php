<?php
include_once "db-connect.php";
$myidd = $_GET['id'];
$sql = "DELETE FROM test WHERE id=?";
$res = $cone->prepare($sql);
$res->execute(array($myidd));
if($res){
    header("location: card.php");
}
?>