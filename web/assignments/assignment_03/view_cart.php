<?php
  session_start();

  $total = 0;

  if ($_SESSION['rock_one']) {
      $total += 10;
  }

  if ($_SESSION['rock_two']) {
      $total += 15;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/shopping_cart.css">
    <title></title>
  </head>
  <body>

    <h1>Buy Rocks</h1>

    <h2>Cart</h2>
    <ol>
      <?php

        if ($_SESSION['rock_one']) {
            echo "<li><p>Rock One</p><button type='button' onclick='removeItem('rock_one')'>Add to Cart</button></li>";
        }

        if ($_SESSION['rock_two']) {
            echo "<li><p>Rock Two</p><button type='button' onclick='removeItem('rock_two')'>Add to Cart</button></li>";
        }

      ?>
    </ol>

    <span>Total $<?php echo "$total"; ?>.00</span>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/shopping_cart.js"></script>
  </body>
</html>
