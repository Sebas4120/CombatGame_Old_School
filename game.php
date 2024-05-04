  <?php

  //Introduction of the game history
  $texto = 
  "In the empire of Ragnarok, lives a monster hunter named Anakin. He and his mother grew up in poverty, but Bjorn had great courage and bravery to hunt the most fearsome beasts of the 7 realms. Bjorn grew up with his best friend Obi-Wan who became a great wizard of celestial magic. 

  One full moon night, Bjorn annihilated a monster that had eaten many people in his village and displayed the animal's body around the village to celebrate his victory. What Anakin did not know was that the monster he annihilated was the son of an underworld beast rarely seen in the earthly world called Routrak.

  In revenge, the Routrak beast took the form of a beautiful woman who gradually captivated Anakin until the day Anakin introduced him to her mother at a dinner party. That night, the beautiful lady went to dinner at Anakin's home with his mother, the whole night was perfect. In an instant, Anakin got up to bring a gift he had made for his beloved but when he returned his mother had been cruelly murdered and the beautiful woman took her original form as a beast and said: \"Dirty human, you really thought everything was going to be fine after killing my son, I am Routrak, guardian of the underworld, and I curse you for this life and those that await you\".

  The beast escaped by smashing a window as Anakin knelt carrying his mother's body. In anger and thirst for vengeance, he swears by his mother to dedicate his life to hunting down the beast that killed his mother. He asks for help from his friend Obi-Wan who does not hesitate to accompany his great friend to hunt the beast.";

  echo $texto;

  // Function that generates battles
  function battle($monsterName, $userName, $attacks) {
    //Seting the variables
      $monsterLives = 3;
      $userLives = 3;
      $randomNumber=0;

      echo "A wild $monsterName appears!\n";
      echo "$monsterName has $monsterLives lives.\n";

      while ($monsterLives > 0 && $userLives > 0) {
          //Asking the user if they want to attack or block
          echo "What do you want to do, $userName? (attack/block): ";
          $action = cleanInput(readline());

          //Checking if the user chooses attack
          if ($action === 'attack') {
            //Checking if the user has attack options available
              if ($attacks === null) {
                  $randomNumber = rand(0, 1);
              } else {
                //Show the available attacks
                  echo "These are the available attacks:\n";
                  foreach ($attacks as $index => $attack) {
                      echo ($index + 1) . ". $attack\n";
                  }
                  echo "Choose the attack you want to use: ";
                  $attackChoice = intval(cleanInput(readline()));
                  if ($attackChoice < 1 || $attackChoice > count($attacks)) {
                      echo "Invalid attack choice. Please choose a valid attack.\n";
                      continue;
                  }
                  $randomNumber = rand(0, 1);
              }
              
              //Show the attack result
              if ($randomNumber === 1) {
                  echo "Oops! $userName lost 1 life.\n";
                  $userLives--;
              } else {
                  echo "Great hit! $monsterName lost 1 life.\n";
                  $monsterLives--;
              }
          //In case the user chooses block
          } elseif ($action === 'block') {
              echo "You successfully blocked the attack!\n";
              $randomNumber = rand(0, 1);
          } else {
              echo "Invalid action. Choose 'attack' or 'block'.\n";
          }

          // Check if the monster is still alive after the attack
          if ($monsterLives <= 0) {
              break;
          }
      }

      //If the user has still lifes and the monster is dead
      if ($userLives > 0) {
          echo "Congratulations! You defeated $monsterName!\n";
          return true;
      } else {
          echo "Game over! $monsterName defeated $userName.\n";
          return false;
      }
  }


  // This is a function to clean user input
  function cleanInput($input) {
      return strtolower(trim($input));
  }

  // This is a function to check if the response is valid
  function isValidResponse($response) {
      return $response === "yes" || $response === "no";
  }

  function start(){
      // Start of the game
      echo "\nWelcome to the adventure!\n";
      
      // First battle
      echo "\n1st Battle: Enchanted Forest\n";
      $userName = "Anakin";
      $monsterName = "Valdor (Giant Spider)";
      if (battle($monsterName, $userName, null)) {
        //After winning the first battle
          echo "As $userName and his friend walk through the Enchanted Forest, they find two different paths.\n";
          echo "One path has human footprints and the other path has monster footprints.\n";
          echo "Which path do you want to follow? (human/monster): ";
          $pathChoice = cleanInput(readline());
          if ($pathChoice === 'human') {
            //If the user choose to follow human footprints
              echo "\n You follow the human footprints. Great Choice! Because, as you know, Routrack changes form to human!\n";
              // Second battle
              echo "\n2nd Battle: Death Valley\n";
              $userName = "Obi-Wan";
              $monsterName = "Kartrick (Dark Wizard)";
              $attacks = array("Mortal Ray", "Meteor Shower", "Acid Mist");
              if (battle($monsterName, $userName, $attacks)) {
                //After winning the second battle
                echo "The last battle has brought you to  , but they are closed. To open them, you have a choice:\n";
                echo "1. Force them open by causing a huge explosion.\n";
                echo "2. Open them with a spell to pass unnoticed.\n";
                $gateChoice = intval(cleanInput(readline()));
                  if ($gateChoice===2){
                    //Final Battle
                    echo "THIS IS THE FINAL BATTLE! YOU FOUND ROUTRACK!";
                    $userName = "Anakin";
                    $monsterName = "  ";
                    $attacks = array("Enchanted sword", "Poison arrow bow", "Fire sword");
                    if (battle($monsterName, $userName, $attacks)) {
                      //If the user wins the FINAL BATTLE
                      echo "YOU KILLED ROUTRACK! YOU AVENGED BJORN'S MOTHER!";
                      echo "Do you want to play again? (yes/no): ";
                        $response = cleanInput(readline());
                        if ($response === 'yes') {
                            start(); // Restart the game
                        } else {
                            exit("Thanks for playing!\n");
                        }
                    }else{
                      //If the user loses the Final battle
                      echo "Do you want to play again? (yes/no): ";
                      $response = cleanInput(readline());
                      if ($response === 'yes') {
                          start(); // Restart the game
                      } else {
                          exit("Thanks for playing!\n");
                      }
                    }
                  }
                  else{
                    //If the user choose to force the gates of the underworld causing a huge explosion
                    echo "You advertised to all the monsters of the underworld and they destroyed you!\n";
                    echo "Do you want to play again? (yes/no): ";
                    $response = cleanInput(readline());
                    if ($response === 'yes') {
                        start(); // Restart the game
                    } else {
                        exit("Thanks for playing!\n");
                    }
                  }
              } else {
                //If the user looses the second battle
                  echo "Do you want to play again? (yes/no): ";
                  $response = cleanInput(readline());
                  if ($response === 'yes') {
                      start(); // Restart the game
                  } else {
                      exit("Thanks for playing!\n");
                  }
              }
          } else {
            //If the user chooses to follow the monster footprints
              echo "You fell into a trap set by Routrak!\n";
              echo "Do you want to play again? (yes/no): ";
              $response = cleanInput(readline());
              if ($response === 'yes') {
                  start(); // Restart the game
              } else {
                  exit("Thanks for playing!\n");
              }
          }
      } else {
        //If the user looses the first battle
          echo "Do you want to play again? (yes/no): ";
          $response = cleanInput(readline());
          if ($response === 'yes') {
              start(); // Restart the game
          } else {
              exit("Thanks for playing!\n");
          }
      }
  }

  //---------------------------------------
  while(true){
    //Checking if the user wants to play
    echo "\n Do you want to play? (YES/NO)";
    //Read the user answer and also clean it
    $response = cleanInput(readline());
    //Checking if it is a valid answer
    if(isValidResponse($response)){
      break;
    }else{
      //If the answer is not valid
      echo "\n Please respond Yes or No";
    }
  }

  //In case the user wants to play, the function start() is called
  if ($response === 'yes'){
    echo "Let's play";
    start();
  }else{
    //In case the user does not want to play, a message is displayed
    echo "Maybe next time!";
  }

  ?>