<?php
  session_start();
  include "db-connect.php";


  // this function is getting totAL
  $sqlsmail = 'SELECT sum(price) AS prices FROM test;';
  $ressmail = $cone->prepare($sqlsmail);
  $ressmail->execute();
  while($azdin = $ressmail->fetch()){
    $_SESSION['total'] = $azdin['prices'];
  }



  // this function is for number of products 
  $sqlsmail5 = 'SELECT id, title, image, price, COUNT(*) AS number_of_article FROM `test` GROUP BY title';
  $ressmail5 = $cone->prepare($sqlsmail5);
  $ressmail5->execute();
  while($azdin2 = $ressmail5->fetch()){
    $_SESSION['nb'] = $azdin2['number'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="navbar.css">
</head>
<body>
<header>
    <a href="" class="logo"><img src="e6d15025-0f64-433e-8df3-70f478954ae6.jfif" alt=""></a>

    <input type="checkbox" id="menu_bar">
    <label for="menu_bar">Menu</label>
    <nav class="navbar">
      <ul>
        <li><a href="navbar.php">Home</a></li>
        <li><a href="">Toys</a></li>
        <li><a>Clothes</a>
        <ul>
          <li><a href="clothing.php">Boys</a></li>
          <li><a href="clothing.php">Girls</a></li>
        </ul>
        </li>
        <li><a href="">Accessories</a></li>
        <li><a href="">Login</a></li>
      </ul>
      <div class="sla">
        <a href="card.php"><img class="bucketcount" src="icons8-buy-100.png" alt=""></a>
        <div class="smallnumber"><?php echo $_SESSION['nb'];?></div>
        <div class="product">
          <div class="content">

            <?php
              $sqlbucket = 'SELECT * FROM test';
              $bucketresult = $cone->prepare($sqlbucket);
              $bucketresult->execute();
              while($bucketRow = $bucketresult->fetch()){
                echo "
                  <div class='choosed'>
                  <img src='$bucketRow[image]' alt=' class='shirt'>
                  <div class='info'>
                    <p>$bucketRow[title]</p>
                    <p>$bucketRow[price]$</p>
                  </div>
                  <a href='suprime.php?id=$bucketRow[image]'><img src='delete.png' alt=' class='delete'></a>
                  </div>
                ";
              }
            ?>
            <br>
            <hr>

            <div class="total">
              <p>Total</p>
              <p>239.9$</p>
            </div>

            <button class="scard">Shooping card</button>
            <button class="checkout">CHECKOUT</button>

          </div>
        </div>
      </div>
    </nav>
  </header>



  <main class="main">
    <div class="box">
      <a href="clothing.php">
      <img src="clothes.jpeg" alt="">
      <p style="text-align: center; margin-top: 10px; font-size: 20px; font-weight: bold;">clothing</p></a>
    </div>
    <div class="box">
      <a href="">
        <img src="toys.jpg" alt="">
        <p style="text-align: center; margin-top: 10px; font-size: 20px; font-weight: bold;">clothing</p></a>
    </div>
    <div class="box">
      <a href="">
        <img src="accessories.jfif" alt="">
        <p style="text-align: center; margin-top: 10px; font-size: 20px; font-weight: bold;">clothing</p></a>
    </div>
  </main>

  <script src="navbar.js"></script>
</body>
</html>