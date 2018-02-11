<?php

try
{
  $user = 'grant';
  $password = 'gjs42190';
  $db = new PDO('pgsql:host=127.0.0.1;dbname=board_games', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Board Game Bazaar</title>
  </head>
  <body>
    <?php
      echo '<h3>Person Table</h3>';
      foreach ($db->query('SELECT username, password FROM person') as $row)
      {
        echo 'user: ' . $row['username'];
        echo ' password: ' . $row['password'];
        echo '<br/>';
      }
      echo '<h3>Game Type Table</h3>';
      foreach ($db->query('SELECT name, description FROM game_type') as $row)
      {
        echo 'Name: ' . $row['name'];
        echo '<br/>';
        echo 'Description: ' . $row['description'];
        echo '<br/>';
      }
      echo '<h3>Game Table</h3>';
      foreach ($db->query('SELECT title, duration, number_of_players, description, links FROM game') as $row)
      {
        echo 'Title: ' . $row['title'];
        echo '<br/>';
        echo 'Duration: ' . $row['duration'];
        echo '<br/>';
        echo 'Number of Players: ' . $row['number_of_players'];
        echo '<br/>';
        echo 'Description: ' . $row['description'];
        echo '<br/>';
        echo 'Links: ' . $row['links'];
        echo '<br/>';
      }
      echo '<h3>Person\'s Favorite Games</h3>';
      foreach ($db->query('SELECT g.title FROM game g JOIN favorite_games fg ON g.game_id = fg.game_id WHERE fg.person_id = 1') as $row)
      {
        echo 'Title: ' . $row['title'];
        echo '<br/>';
      }
      echo '<h3>Game Information</h3>';
      foreach ($db->query('SELECT g.title FROM game g JOIN games_and_types gt ON gt.game_id = g.game_id WHERE gt.game_type_id = 1') as $row)
      {
        echo 'Title: ' . $row['title'];
        echo '<br/>';
        echo 'Name: ' . $row['name'];
        echo '<br/>';
      }
    ?>
  </body>
</html>
