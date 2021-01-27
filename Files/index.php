<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../");
    exit;
}
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
     <style type="text/css">
         body{ font: 14px sans-serif; text-align: center; }
     </style>
   </head>
   <body>
     <?php require '../menus/menu.php'; ?><br>
     <?php
     $user = $_SESSION["username"];

     $xml = simplexml_load_file("../Usercontent/Uploads/$user/files.xml") or die("Error: Cannot create object");
     foreach($xml->files->children() as $files) {
       echo $files->link;
     }
      ?>
   </body>
 </html>
