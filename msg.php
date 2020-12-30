<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php require 'menu.php'; ?><br><br><br>
    <?php
      if (!isset($_GET["t"]) || $_GET["t"] == "in") {
        echo "<p>Inbox</p>";
      }elseif ($_GET["t"] == "out") {
        echo "<p>Outbox</p>";
      }elseif ($_GET["t"] == "sendmsg") {
        echo "<p>Send a message</p>";
      }
     ?>

  </body>
</html>
