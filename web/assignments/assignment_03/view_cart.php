<?php
  session_start();

  $total = 0;

  if ($_SESSION['rock_one']) {
      $total += 15;
  }

  if ($_SESSION['rock_two']) {
      $total += 10;
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
            echo "<li><p>Rock One</p></li>";
        }

        if ($_SESSION['rock_two']) {
            echo "<li><p>Rock Two</p></li>";
        }

      ?>
    </ol>

    <span>Total $<?php echo "$total"; ?>.00</span>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/shopping_cart.js"></script>
  </body>
</html>
