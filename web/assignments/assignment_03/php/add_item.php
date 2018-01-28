<?php
  $item = $_POST['selected'];
  echo "1";
  if ($item == "rock_one") {
    echo "2a";
    $s = $_SESSION['rock_one'];
    echo "3a";
    $_SESSION['rock_one'] = !$s;
    echo "4b";
  }
  elseif ($item == "rock_two") {
    echo "2b";
    $s = $_SESSION['rock_two'];
    echo "3b";
    $_SESSION['rock_two'] = !$s;
    echo "4b";
  }
?>
