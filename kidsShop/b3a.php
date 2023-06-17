<?php
  session_start();
  include "db-connect.php";

  $sqlsmail = 'SELECT sum(price) AS prices FROM test;';
  $ressmail = $cone->prepare($sqlsmail);
  $ressmail->execute();
  while($azdin = $ressmail->fetch()){
    echo $azdin['prices'];
  }
?>