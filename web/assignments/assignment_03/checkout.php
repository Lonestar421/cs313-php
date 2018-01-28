<?php

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/shopping_cart.css">
    <title>Checkout</title>
  </head>
  <body>

    <form class="" action="confirmation.php" method="post">
      <span>Street Address</span>
      <input type="text" name="Street_Address" value="">
      <br>
      <span>City</span>
      <input type="text" name="City" value="">
      <br>
      <span>State</span>
      <input type="text" name="State" value="">
      <br>
      <span>Zip Code</span>
      <input type="text" name="Zip_Code" value="">
      <br>
      <button type="button" onclick="view_chart()">View Cart</button>
      <button type="submit">Complete Purchase</button>
    </form>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/shopping_cart.js"></script>
  </body>
</html>
