<?php
    session_start();
    $username = $_POST['Name'] ?? null;
    $win = $_SESSION['Wins'];
    $losses = $_SESSION['Losses'];
    $draws = $_SESSION['Draws'];

    if(isset($_POST['submit'])){
        include 'includes/library.php';
        $pdo = connectDB();





        $query = "INSERT into HighScores values (NULL,?,?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $win, $losses, $draws]);



        session_destroy();
        header("Location: HighScore.php");

    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game-over</title>
</head>
<body>
<nav>
            <ul>
                <li><a href="Highscore.php">High Scores</a></li>
                <li><a href="Gamepage.php">Play Again</a></li>
            </ul>
            </nav>
    <h1>You have Lost!</h1>
    <p><?php echo nl2br("\r\n Your Score is:" . $_SESSION['Wins']); ?></p>
    <p>Would you like to record your Highscore?</p>
    <form method="post">
        <label for="Name">Name:</label>
        <input type="text" name="Name" id="Name">
        
        <input type="submit" name="submit" id="submit" value="submit">

        <a href="https://loki.trentu.ca/~okeomanwabueze/3420/assignments/assn2/Gamepage.php">
            <input type="submit" name="PlayAgain" value="Play Again">
        </a> 
    </form>
</body>
</html>