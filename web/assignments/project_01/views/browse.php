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

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Browse Board Games</title>
    <link rel="stylesheet" href="../css/index.css">
  </head>
  <body>
    <div class="main-nav">
      <h1 class="title-logo">Board Game Boom</h1>
      <div>
        <ul class="main-nav-options">
          <li>
            <a href="../index.php">Home</a>
          </li>
          <li>
            <a href="types_of_games.php">Types of Games</a>
          </li>
          <li>
            <a href="#">Browse</a>
          </li>
          <li>
            <?php
              session_start();

              if (!$_SESSION['authenticate'])
              {
                echo '<a href="login.php">Login</a>';
              }
              else
              {
                echo '<a href="login.php">' . $_SESSION['user'] . '</a>';
              }
             ?>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-content">
      <div class="about">
        <p class="about-paragraph">
          View all the board games we have indexed.
        </p>
      </div>
      <?php
        session_start();

        foreach ($db->query('SELECT game_id, title, duration, number_of_players, description, links FROM game') as $row)
        {
          echo '<div class="panel">';
          echo '<div class="title">';
          echo $row['title'];
          echo '</div>';
          echo '<div class="text-information">';
          echo '<div class="description">';
          echo $row['description'];
          echo '</div>';
          echo '<ol>';
          echo '<li>';
          echo 'Duration: ' . $row['duration'] . "mins";
          echo '</li>';
          echo '<li>';
          echo 'Number of Players: ' . $row['number_of_players'];
          echo '</li>';
          echo '<li>';
          echo 'Links: ' . $row['links'];
          echo '</li>';
          echo '</ol>';
          if ($_SESSION['authenticate'] == true)
          {
            if (in_array($row['game_id'], $_SESSION['favorite_games']))
            {
              echo '<div class="favorite">';
              echo 'Favorite!';
              echo '</div>';
            }
            else
            {
              echo '<button class="add-to-favorites" onclick="addFavortieGame(' . $row['game_id'] . ')">';
              echo 'Add to Favorites';
              echo '</button>';
            }
          }
          echo '</div>';
          echo '<div class="img-information">';
          echo '<img src="http://via.placeholder.com/120x120">';
          echo '</div>';
          echo '</div>';
        }
      ?>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
  </body>
</html>
