<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Outbox</title>
  </head>
  <body>
    <h1>WIP</h1>
    <?php
      $xml = simplexml_load_file("msgs.xml") or die("Error: Cannot create object");
      foreach($xml->msgs->children() as $msgs) {
        if ($msgs->from == $_SESSION["username"]){
          echo "Til: " . $msgs->to . "<br>";
          echo "Fra: " . $msgs->from . "<br>";
          echo "Emne: " . $msgs->desc . "<br>";
          echo "Besked: " . $msgs->body . "<br><br>";
        }
      }
     ?>
  </body>
</html>
