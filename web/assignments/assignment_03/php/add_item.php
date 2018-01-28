<?php
  session_start();

  $item = $_POST['selected'];

  if ($item == "rock_one") {
    $s = $_SESSION['rock_one'];
    $_SESSION['rock_one'] = !$s;
  }
  elseif ($item == "rock_two") {
    $s = $_SESSION['rock_two'];
    $_SESSION['rock_two'] = !$s;
  }
?>
