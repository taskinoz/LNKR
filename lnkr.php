<?php
  include 'key.php';
  $fileName = "Links-".date("Y-m-d").".txt";

  if (isset($_GET['l']) && $_GET['k']==$key){
    $websiteLink = $_GET['l'];
    // Check for file
    if (file_exists("./".$filename)) {
      $fp = fopen($fileName, 'a');//opens file in append mode
      fwrite($fp, $websiteLink."\n");
      fclose($fp);
    }
    else {
      $fp = fopen($fileName, 'w');//Create file in write mode
      fwrite($fp, $websiteLink."\n");
      fclose($fp);
    }
    // Go to website
    header("Location: ".$websiteLink);
    exit();
  }
  else {
    echo "Your API key is incorrect or your link is missing";
  }
 ?>
