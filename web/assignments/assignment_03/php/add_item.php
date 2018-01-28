<?php
  $item = $_POST['selected']

  if ($item == "rock_one") {
    $_SESSION['rock_one'] = !$_SESSION['rock_one'];
  }
  elseif ($item == "rock_two") {
    $_SESSION['rock_two'] = !$_SESSION['rock_two'];
  }
?>
