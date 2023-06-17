<?php
include 'db-connect.php';
$myId = $_GET['id'];

    $sql2 = 'SELECT * from article WHERE id=?';
    $res2 = $cone->prepare($sql2);
    $res2->execute(array($myId));
    while($row2 = $res2->fetch()){
      $sql3 = "INSERT INTO test(title, price, image, type, color) VALUES(?, ?, ?, ?, ?) ";
      $res3 = $cone->prepare($sql3);
      $res3->execute(array($row2['title'], $row2['price'], $row2['image'], $row2['type'], $row2['color']));
      if($res3){
        header("location: clothing.php");
      }
    }
    

?>