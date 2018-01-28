<?php
  session_start();

  echo $_SESSION['rock_one'] ? 'true' : 'false';
  echo $_SESSION['rock_two'] ? 'true' : 'false';
?>
