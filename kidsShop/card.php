<?php
  session_start();
  include "db-connect.php";


  // this function is getting totAL
  $sqlsmail = 'SELECT sum(totalprice) AS prices FROM test;';
  $ressmail = $cone->prepare($sqlsmail);
  $ressmail->execute();
  while($azdin = $ressmail->fetch()){
    $_SESSION['total'] = $azdin['prices'];
  }



  // this function is for number of products 
  $sqlsmail5 = 'SELECT COUNT(*) AS number FROM test;';
  $ressmail5 = $cone->prepare($sqlsmail5);
  $ressmail5->execute();
  while($azdin2 = $ressmail5->fetch()){
    $_SESSION['nb'] = $azdin2['number'];
  }

  // this function to get the multiple number 
  // $sqadam = "SELECT miltipl FROM test WHERE id=?"
  // $res
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="card.css">
  <script defer src="card.js"></script>
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
              $sqlbucket = 'SELECT id, title, image, price, COUNT(*) AS number_of_article FROM `test` GROUP BY title;';
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
                  <a href='bucketdelete.php?id=$bucketRow[id]'><img src='delete.png' alt=' class='delete'></a>
                  </div>
                ";
              }
            ?>
            <br>
            <hr>

            <div class="total">
              <p>Total</p>
              <p><?php echo $_SESSION['total'];?>$</p>
            </div>

            <button class="scard">Shooping card</button>
            <button class="checkout">CHECKOUT</button>

          </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="card">
    <h1 style="color: #fe3772; letter-spacing: 3px; text-transform: uppercase;">Your Cart</h1>
    <div class="totalproducts">
        <div class="productsshow">
            <?php
            include_once "db-connect.php";
            $sql = 'SELECT * FROM test';
            $res = $cone->prepare($sql);
            $res->execute();
            while($row = $res->fetch()){
              $newprice = $row['price'] * $row['multipl'];
              echo "
                  <div class='leftshow'>
                    <div class='content'>
                        <div class='photo'>
                            <img src='$row[image]' alt=''>
                        </div>
                        <div class='operations'>
                            <span class='name'>
                                <p class='shirt'>$row[title]</p>
                                <a href='bucketdelete.php?id=$row[id]'><img src='deletewhite.png' class='deletepng'></a>
                            </span>
                            <p class='color'>$row[color]</p>
                            <span class='contity'>
                                  <div class='increase'>
                                      <a href='multipleyAdd.php?id=$row[id]'><button type='submit' id='crise'>+</button></a>
                                      <p id='multiple'>$row[multipl]</p>
                                      <a href='multipleyRemove.php?id=$row[id]'><button id='dicrise'>-</button></a>
                                  </div>
                              
                                <p class='prix'>$newprice$</p>
                            </span>
                        </div>
                    </div>
                </div>
              ";
            }
            ?>
            
        </div>




        <div class="checkoutproducts">
            <div class="info">
                <span class="curent">
                    <p>Products:</p>
                    <p><?php echo $_SESSION['total'];?></p>
                </span>
                <span class="curent2">
                    <p>Livraison</p>
                    <p>0$</p>
                </span>
                <div class="line"></div>
                <span class="curent3">
                    <h2>Total:</h2>
                    <p><?php echo $_SESSION['total'];?>$</p>
                </span>
                <button>Checkout</button>
                <p class="minumum">Minimum order amount reached. You may proceed to checkout.</p>
                <div class="getways">
                    <img src="visa.png" alt="">
                    <img src="paypal.png" alt="">
                    <img src="master.png" alt="">
                    <img src="google.png" alt="">
                </div>
                <div class="garanti">
                    <p>Guaranteed safe & secure checkout</p>
                </div>
            </div>
        </div>
    </div>
  </div>
</body>
</html>