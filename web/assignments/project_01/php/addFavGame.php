<?php

  session_start();

  // try
  // {
  //   $user = 'grant';
  //   $password = 'gjs42190';
  //   $db = new PDO('pgsql:host=127.0.0.1;dbname=board_games', $user, $password);
  // }
  // catch (PDOException $ex)
  // {
  //   echo 'Error!: ' . $ex->getMessage();
  //   die();
  // }

  $dbUrl = getenv('DATABASE_URL');

  $dbopts = parse_url($dbUrl);

  $dbHost = $dbopts["host"];
  $dbPort = $dbopts["port"];
  $dbUser = $dbopts["user"];
  $dbPassword = $dbopts["pass"];
  $dbName = ltrim($dbopts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $game_id = $_POST["game_id"];

  $sql = 'INSERT INTO favorite_games (person_id, game_id) VALUES (:person_id, :game_id)';
  $createPerson = $db->prepare($sql);

  $createPerson->bindValue(':person_id', $_SESSION['user_id']);
  $createPerson->bindValue(':game_id', $game_id);

  $createPerson->execute();

  array_push($_SESSION['favorite_games'], $game_id);

?>
