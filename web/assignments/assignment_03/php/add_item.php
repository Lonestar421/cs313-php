<?php
  session_start();

  $item = $_POST['selected'];

  if ($item == "rock_one") {
    $_SESSION['rock_one'] = true;
  }
  elseif ($item == "rock_two") {
    $_SESSION['rock_two'] = true;
  }
?>
