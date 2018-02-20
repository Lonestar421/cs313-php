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

  if (isset($_POST['login']))
  {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = 'SELECT person_id, username, password FROM person';
    $result = $db->query($query);

    foreach ($result as $row) {
      if ($row['username'] == $username && $row['password'] == $password) {
        $_SESSION['authenticate'] = true;
        $_SESSION['user'] = $row['username'];
        $_SESSION['user_id'] = $row['person_id'];
        $_SESSION['favorite_games'] = array();
        break;
      }
    }

    if (isset($_SESSION[user_id]))
    {
      foreach ($db->query('SELECT g.game_id FROM game g JOIN favorite_games fg ON g.game_id = fg.game_id WHERE fg.person_id = ' . $_SESSION['user_id']) as $row)
      {
        array_push($_SESSION['favorite_games'], $row['game_id']);
      }
    }
  }

  if (isset($_POST['logout']))
  {
    session_unset();
    $_SESSION['authenticate'] = false;
  }

  if (isset($_POST['signup']))
  {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = 'INSERT INTO person(username,password) VALUES(:username,:password)';
    $createPerson = $db->prepare($sql);

    $createPerson->bindValue(':username', $username);
    $createPerson->bindValue(':password', $password);

    $createPerson->execute();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Board Game Boom</title>
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
            <a href="browse.php">Browse</a>
          </li>
          <li>
            <?php
              session_start();

              if (!$_SESSION['authenticate'])
              {
                echo '<a href="#">Login</a>';
              }
              else
              {
                echo '<a href="#">' . $_SESSION['user'] . '</a>';
              }
             ?>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-content">
      <div class="login">
          <form method="post">
            <input class="login-input" id="username" type="text" name="username" value="" placeholder="User Name">
            <br>
            <input class="login-input" id="password" type="password" name="password" value="" placeholder="Password">
            <br>
            <?php
              if (!isset($_SESSION['user']))
              {
                echo '<input id="login" type="submit" name="login" value="Login" class="login-button">';
              }
              else
              {
                echo '<input id="login" type="submit" name="logout" value="Logout" class="login-button">';
              }
            ?>
            <input id="signup" type="submit" name="signup" value="Sign Up" class="login-button">
          </form>
      </div>
      <div>
        <div class="favorite-board-game-title">
          Favorite Board Games
        </div>
        <div class="favorite-board-games">
          <?php
            $favGames = $db->query('SELECT g.title FROM game g JOIN favorite_games fg ON g.game_id = fg.game_id WHERE fg.person_id = ' . $_SESSION['user_id']);

            if (isset($_SESSION['user']) && $favGames->rowCount() != 0)
            {
              foreach ($favGames as $row)
              {
                echo 'Title: ' . $row['title'];
                echo '<br/>';
              }
            }
            else
            {
              echo "Start adding board games to your list!";
            }
          ?>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
  </body>
</html>
