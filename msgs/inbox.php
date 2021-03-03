<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inbox</title>
    <script src="https://cdn.tiny.cloud/1/lm4r0uhr0fbltdkabpow3ax03y2qe5mbzceatjwrs61k3j54/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: '#tox-checklist',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author',
    });
  </script>
  </head>
  <body>
    <h1>WIP</h1>
    <?php
      $xml = simplexml_load_file("msgs.xml") or die("Error: Cannot create object");
      foreach($xml->msgs->children() as $msgs) {
        if ($msgs->to == $_SESSION["username"]){
          echo "Til: " . $msgs->to . "<br>";
          echo "Fra: " . $msgs->from . "<br>";
          echo "Emne: " . $msgs->desc . "<br>";
          echo "Besked: " . $msgs->body . "<br><br>";
        }
      }
     ?>
  </body>
</html>
