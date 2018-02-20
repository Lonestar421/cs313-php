<?php

  session_start();

  if (!isset($_SESSION['authenticate']))
  {
      $_SESSION['authenticate'] = false;
  }

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

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Board Game Boom</title>
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
    <div class="main-nav">
      <h1 class="title-logo">Board Game Boom</h1>
      <div>
        <ul class="main-nav-options">
          <li>
            <a href="#">Home</a>
          </li>
          <li>
            <a href="views/types_of_games.php">Types of Games</a>
          </li>
          <li>
            <a href="views/browse.php">Browse</a>
          </li>
          <li>
            <?php
              session_start();

              if (!$_SESSION['authenticate'])
              {
                echo '<a href="views/login.php">Login</a>';
              }
              else
              {
                echo '<a href="views/login.php">' . $_SESSION['user'] . '</a>';
              }
             ?>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-content">
      <div class="about">
        <p class="about-paragraph">
          <strong>Board Game Boom</strong> is all about finding your next
          favorite board game! Whether you want to learn more about different
          types of board games or just browse we can help you.
        </p>
      </div>
      <?php
        foreach ($db->query('SELECT name, description FROM game_type') as $row)
        {
          echo '<div class="panel">';
          echo '<div class="title">';
          echo $row['name'];
          echo '</div>';
          echo '<div class="description">';
          echo $row['description'];
          echo '</div>';
          echo '</div>';
        }
      ?>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <?php
      // echo '<h3>Person Table</h3>';
      // foreach ($db->query('SELECT username, password FROM person') as $row)
      // {
      //   echo 'user: ' . $row['username'];
      //   echo ' password: ' . $row['password'];
      //   echo '<br/>';
      // }
      // echo '<h3>Game Type Table</h3>';
      // foreach ($db->query('SELECT name, description FROM game_type') as $row)
      // {
      //   echo 'Name: ' . $row['name'];
      //   echo '<br/>';
      //   echo 'Description: ' . $row['description'];
      //   echo '<br/>';
      // }
      // echo '<h3>Game Table</h3>';
      // foreach ($db->query('SELECT title, duration, number_of_players, description, links FROM game') as $row)
      // {
      //   echo 'Title: ' . $row['title'];
      //   echo '<br/>';
      //   echo 'Duration: ' . $row['duration'];
      //   echo '<br/>';
      //   echo 'Number of Players: ' . $row['number_of_players'];
      //   echo '<br/>';
      //   echo 'Description: ' . $row['description'];
      //   echo '<br/>';
      //   echo 'Links: ' . $row['links'];
      //   echo '<br/>';
      // }
      // echo '<h3>Person\'s Favorite Games</h3>';
      // foreach ($db->query('SELECT g.title FROM game g JOIN favorite_games fg ON g.game_id = fg.game_id WHERE fg.person_id = 1') as $row)
      // {
      //   echo 'Title: ' . $row['title'];
      //   echo '<br/>';
      // }
      // echo '<h3>Game Information</h3>';
      // foreach ($db->query('SELECT g.title FROM game g JOIN games_and_types gt ON gt.game_id = g.game_id WHERE gt.game_type_id = 1') as $row)
      // {
      //   echo 'Title: ' . $row['title'];
      //   echo '<br/>';
      //   echo 'Name: ' . $row['name'];
      //   echo '<br/>';
      // }
    ?>
  </body>
</html>
