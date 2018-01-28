<?php
  session_start();

  $item = $_POST['selected'];

  if ($item == "rock_one") {
    $_SESSION['rock_one'] = false;
  }
  elseif ($item == "rock_two") {
    $_SESSION['rock_two'] = false;
  }
?>
