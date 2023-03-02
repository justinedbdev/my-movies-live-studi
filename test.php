<?php
      $firstName = "Justine"; 
      $firstNames = array("Christelle", "Christophe", $firstName, "Aline");
      $myInformations = [
        "firstName" => "Chris",
        "lastName" => "Chevalier",
        "age" => 29
      ];

      print_r($firstNames);
      echo("Bonjour, je m'appelle {$myInformations['lastName']} ! :)");



      function displayNames($firstNames): void {
        $string= "Dans ma classe, il y a ";
        $i = count($firstNames) - 1;
        while ($i >= 0) {
          $string .= $firstNames[$i];
          $i !== 0 && $string .= ", ";
          $i--;
        }
        echo $string . "<br/>";
      }

displaynames($firstNames);

    for ($i = count($firstNames)-1; $i >= 0; $i--) {
      $string .= $firstNames[$i];
      if ($i !== 0) {
        $string .= ", ";
      }
    }
    echo $string;

    for ($i = count($firstNames)-1; $i >= 0; $i--) {
      $string .= $firstNames[$i];
      $i !== 0 ? $string .= ", " : "";
      }
    echo $string;

    for ($i = count($firstNames)-1; $i >= 0; $i--) {
      $string .= $firstNames[$i];
      $i !== 0 && $string .= ", ";
      }
    echo $string;

    for ($i = count($firstNames)-1; $i >= 0; $i--) {
      $string = $string . $firstNames[$i] . ", ";
    }
    echo $string;

    for ($i = 0; $i < count($firstNames); $i++){
      echo "je m'appelle $firstNames[$i] ! :)";
    };

    foreach ($firstNames as $firstName){
      echo "Bonjour, je m'appelle $firstName ! :) <br/>";
    };

?>