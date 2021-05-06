<?php
  include 'key.php';
  $fileName = "Links-".date("Y-m-d").".txt";

  // Cleanup directory paths
  if ($dirctory!="") {
    // Create directory if it doesnt exist
    if (!file_exists($dirctory)) {
      mkdir($dirctory);
    }
    $dirctory = "./".$dirctory."/";
  }
  else {
    $dirctory = "./";
  }

  // If directory exists
  if ((isset($_GET['l']) && isset($_GET['k'])) && $_GET['k']==$key){
    $websiteLink = $_GET['l'];

    // Check for file
    if (file_exists($dirctory.$fileName)) {
      $fp = fopen($dirctory.$fileName, 'a');//opens file in append mode
      fwrite($fp, "\n".$websiteLink);
      fclose($fp);
    }
    // Create new file if it doesnt exist
    else {
      $fp = fopen($dirctory.$fileName, 'w');//Create file in write mode
      fwrite($fp, $websiteLink);
      fclose($fp);
    }

    // Go back to original website
    header("Location: ".$websiteLink);
    exit();
  }
  else {
    echo "Your API key is incorrect or your link is missing";
  }
 ?>
