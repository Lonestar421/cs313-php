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
    <title>Types of Board Games</title>
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
            <a href="#">Types of Games</a>
          </li>
          <li>
            <a href="browse.php">Browse</a>
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
          Learn about different types of board games.
        </p>
      </div>
      <div class="game-type-nav">
      <?php

        echo '<form method="post">';
        foreach ($db->query('SELECT game_type_id, name FROM game_type') as $row)
        {
          echo '<button type="submit" name="game_type_id" value="' . $row['game_type_id'] . '" class="game-type">';
          echo $row['name'];
          echo '</button>';
        }
        echo '</form>';
      ?>
      </div>
      <div class="game-type-results">
          <?php

            if (isset($_POST["game_type_id"]))
            {
              $query = 'SELECT name, description FROM game_type WHERE game_type_id = :game_type_id';
              $statement = $db->prepare($query);

              $statement->bindValue(':game_type_id', $_POST["game_type_id"]);

              $statement->execute();
              $row = $statement->fetch(PDO::FETCH_ASSOC);

              echo '<div>';
              echo '<h1 class="game-type-heading">' . $row['name'] . '</h1>';
              echo '<p>' . $row['description'] . '</p>';
              echo '</div>';
              echo '<div>';
              echo '<h1>Related Games</h1>';
              echo '</div>';
              echo '<div>';

              foreach ($db->query('SELECT g.game_id, g.title, g.duration, g.number_of_players, g.description FROM game g JOIN games_and_types gt ON gt.game_id = g.game_id WHERE gt.game_type_id = ' . $_POST["game_type_id"]) as $row)
              {
                echo '<div class="panel">';
                echo '<div class="title">';
                echo $row['title'];
                echo '</div>';
                echo '<div class="text-information">';
                echo '<div class="description">';
                echo $row['description'];
                echo '</div>';
                echo "<ol>";
                echo "<li>";
                echo 'Duration: ' . $row['duration'] . "mins";
                echo "</li>";
                echo "<li>";
                echo 'Number of Players: ' . $row['number_of_players'];
                echo "</li>";
                echo "</ol>";
                if ($_SESSION['authenticate'] == true)
                {
                  if (in_array($row['game_id'], $_SESSION['favorite_games']))
                  {
                    echo '<button class="add-to-favorites" onclick="removeFavortieGame(' . $row['game_id'] . ')">';
                    echo 'Remove from Favorites';
                    echo '</button>';
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

              echo '</div>';
            }
            else
            {
              echo '<h3>Please select a game type to learn more about.</h3>';
            }
          ?>
      </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
  </body>
</html>
