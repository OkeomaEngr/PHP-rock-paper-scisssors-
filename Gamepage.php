<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock Paper Scissor</title>
</head>
<body>
<nav>
            <ul>
                <li><a href="HighScore.php">High Scores</a></li>
                <li><a href="Gamepage.php">Play Again</a></li>
            </ul>
            </nav>
    <div>
        <h1>Rock Paper Scissors</h1>
        <form action="" method="post">
            <div>
                <input type="radio" name="choice" value="rock">
                    <label for="Rock">Rock</label>
                <input type="radio" name="choice" value="paper">
                    <label for="Paper">Paper</label>
                <input type="radio" name="choice" value="scissors">
                    <label for="Scissors">Scissors</label>
            </div>
            <input type="submit" name="shoot" value="shoot">
        </form>

        <?php

            session_start();      
            // User Choices
            $choice = $_POST["choice"] ?? null;
            
            // Valid Choices
            $items = array('rock', 'paper', 'scissors');
            

            //Checks if the shoot button has been pressed
            if(!isset($_POST["shoot"])){
                $_SESSION['Wins'] = 0;
                $_SESSION['Losses'] = 0;
                $_SESSION['Draws'] = 0;
                $_SESSION['throwcount'] = 0;
                
            }else{
                // Computer choice determined by random integer
                $compChoice = rand(0,2);
                
                // Check if input is empty
                if(empty($choice)){
                    //Error
                    echo "Please select a valid choice";
                    // Checks to see if input is valid
                }else if($choice == $items[0] || $choice == $items[1] || $choice == $items[2]){
                      
                    echo nl2br("\r\n Your choice is $choice");
  
  
                    //Switch statement for computer choice and assign it a word
                    switch($compChoice){
                        case 0:
                            echo nl2br("\r\n The computer choose rock");
                        break;
  
                        case 1:
                            echo nl2br("\r\n The computer choose paper");
                        break;
  
                        case 2:
                            echo nl2br("\r\n The computer choose scissors");
                        break;
                    }

                    // Checks if game is a tie
                    if(($choice == $items[0] && $compChoice == 0) || ($choice == $items[1] && $compChoice == 1) || ($choice == $items[2] && $compChoice == 2)){
                        echo nl2br("\r\n Your and the computer chose the same. Its a Tie");
                        $_SESSION['Draws']++;
  
                      //Compare choices
                    }else if(($choice == $items[0] && $compChoice == 2) || ($choice == $items[1] && $compChoice == 0) || ($choice == $items[2] && $compChoice == 1)){
                        // If user wins 
                        $_SESSION['Wins']++;
                        echo nl2br("\r\n You Win");
                      
                    }else{
                        // If computer Wins
                        echo nl2br("\r\n You lose");
                        $_SESSION['Losses']++;
                        if($_SESSION['Losses'] > 9){
                
                            header("Location: gameover.php");
                            
                        }
                          
                    }
                }else{
                    // Error when choice isn't valid or is empty
                    echo "Please enter a valid choice";
                }
  
                echo nl2br("\r\n You have won:" . $_SESSION['Wins']);
                echo nl2br("\r\n You have lost:" . $_SESSION['Losses']);
                echo nl2br("\r\n You have drawn:" . $_SESSION['Draws']);
                
            }
           
        ?>
    </div>
</body>
</html>
