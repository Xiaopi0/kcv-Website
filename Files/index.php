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
         body{
           font: 14px sans-serif;
           text-align: center;
         }
         table {
           text-align: center;
         }
         table, th, td {
           border: 1px solid black;
           text-align: center;
         }
     </style>
   </head>
   <body>
     <?php require '../menus/menu.php'; ?><br>
     <table style="width:50%">
       <tr>
         <th>Id</th>
         <th>Name</th>
         <th>Download Link</th>
         <th>Delete File</th>
       </tr>
     <?php
     $user = $_SESSION["username"];

     $xml = simplexml_load_file("../Usercontent/Uploads/$user/files.xml") or die("Error: Cannot create object");
     $id = 1;
     foreach($xml->files->children() as $files) {
       echo "<tr>";
       echo "<td>" . $id . "</td>";
       echo "<td>" . $files->name . "</td>";
       echo "<td>" . $files->link . "</td>";
       echo "<td><a href=\"./delete.php?file=" . $files->path . "\">Delete</a>";
       echo "<tr>";
       $id++;
     }
      ?>
      </table>
   </body>
 </html>
