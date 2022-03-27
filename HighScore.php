<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High Scores</title>
</head>
<body>
    <table>
        <thead>High Scores </thead>
        <tr>
            <th> </th>
            <th>Username</th>
            <th>Wins</th>
            <th>Losses</th>
            <th>Draws</th>
        </tr>
        <?php
            include 'includes/library.php';
            $pdo = connectDB();

            $sql = "SELECT * FROM HighScores ORDER BY Wins DESC ";
            
            
            $stmt = $pdo->prepare($sql);
            $stmt -> execute();
            
        
            if($stmt-> rowCount() > 0){
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr> <td>" . "</td><td>" . $row['Name'] . "</td><td>" . $row['Wins'] . "</td><td>" . $row['Losses'] . "</td><td>" . $row['Draws'] . "</td><tr>";
                   
                }


            }else{
                echo "No Results";
           }
           
            
        ?>
    </table>
    <a href="https://loki.trentu.ca/~okeomanwabueze/3420/assignments/assn2/Gamepage.php">
            <input type="submit" name="PlayAgain" value="Play Again">
        </a>
</body>
</html>


