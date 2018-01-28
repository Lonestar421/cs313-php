<!DOCTYPE html>
<html>
  <head>
    <title>Confirmation</title>
    <link rel="stylesheet" href="css/shopping_cart.css">
    <meta charset="utf-8">
  </head>
  <body>

    <h2>Order Information</h2>
    <h4>Items Purchased:</h4>
    <ol>
      <?php

        session_start();

        if ($_SESSION['rock_one']) {
            echo "<li>Rock One</li>";
        }

        if ($_SESSION['rock_two']) {
            echo "<li>Rock Two</li>";
        }

      ?>
    </ol>
    <h4>Mailing Address</h4>
    <?php
      echo '<p>' . $_POST['Street Address'] . '<br>' . $_POST['City'] . ', ' . $_POST['State'] . " " . $_POST['Zip Code'] . '</p>';
     ?>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/shopping_cart.js"></script>
  </body>
</html>
