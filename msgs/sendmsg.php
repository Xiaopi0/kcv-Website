<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Send Besked</title>
    <script src="https://cdn.tiny.cloud/1/lm4r0uhr0fbltdkabpow3ax03y2qe5mbzceatjwrs61k3j54/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: '#body',
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
    <h1>Checkboxes Og Billeder Virker Ikke!!!</h1>
     <form action="sender.php" method="get">
       Til: <input type="text" name="to"><br>
       Emne: <input type="text" name="desc"><br>
       <p>Besked: </p>
       <textarea id="body" name="body" style="margin-left: 30px; margin-right: 30px; height: 500px;"></textarea><br>
       <input type="submit">
     </form>
  </body>
</html>
