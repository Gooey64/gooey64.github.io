<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css"/>
  <title>Typing Tunes</title>
</head>
<body>
  <header>
    <div class="history">
      <a href="history.php">History</a>
    </div>
    <h1><a href="type.html">Typing Tunes</a></h1>
    <div class="rankings">
      <a href="rankings.php">Rankings</a>
    </div>
  </header>

  <main>
    <section class="song-list">
      <?php
        if(!isset($_COOKIE["username"])) {
          echo "Unable to retrieve history: username not found!";
          die();
        }
        $username = $_COOKIE["username"];

        include "connect_db.php";

        $sql = "SELECT * FROM games WHERE username = \"$username\" ORDER BY id DESC LIMIT 10";
        $result = $conn->query($sql);

        echo "$username's recent typing history";
        echo "<table>";

        // Header row
        echo "<tr>";
        echo "<th>Song</th>";
        echo "<th>Artist</th>";
        echo "<th>WPM</th>";
        echo "<th>Accuracy</th>";
        echo "</tr>";

        // Build the table
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["title"] . "</td>";
          echo "<td>" . $row["artist"] . "</td>";
          echo "<td>" . $row["wpm"] . "</td>";
          echo "<td>" . $row["accuracy"] . "</td>";
          echo "</tr>";
        }

        echo "</table>";
      ?>
    </section>
  </main>

  <footer>
    <div class="history">
      <a href="history.php">History</a>
    </div>
    <div><a href="index.html">Typing Tunes</a></div>
    <div class="rankings">
      <a href="rankings.php">Rankings</a>
    </div>
  </footer>
</body>
</html>
