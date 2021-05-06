<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LNKR</title>
  <style>

  </style>
</head>
<body>
  <div class="container">
    <?php
      // Get Key File
      include "key.php";

      function readFileContents($filename){
        $rfcfile = fopen($filename, "r") or die("Unable to open file!");
        $rfcstr = fread($rfcfile,filesize($filename));
        fclose($rfcfile);
        return $rfcstr;
      }

      // Correct '' => ,
      if (isset($_GET['k']) && $_GET['k']==$key){ ?>
        <h1>KEY</h1>
        <ul>
          <?php
            foreach (glob($dirctory."*.txt") as $fileName) {
              echo '<li><a href="'.$fileName.'" target="_blank">'. str_replace("",".txt",$fileName).'</a></li>'."\n";
              $split = explode("\n", readFileContents($fileName));
              echo "<ul>";
              for ($i=0; $i<count($split);$i++) {
                echo "<li><a href=".$split[$i].">".$split[$i]."</a></li>"."\n";
              }
              echo "</ul>";
            }
          ?>
        </ul>
      <?php }

      // Incorrect Key
      elseif (isset($_GET['k']) && $_GET['k']!=$key) { ?>
        <h1>Key is incorrect</h1>
      <?php }

      // No Key
      else { ?>
        <h1>No KEY</h1>
        <form method="get">
          <input type="text" name="k">
          <input type="submit" value="search">
        </form>
      <?php }

    ?>
  </div>
</body>
</html>
