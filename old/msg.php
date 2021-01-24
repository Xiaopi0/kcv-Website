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
    <h1>USE <a href="https:// discord.com">DISCORD!!!</a></h1>
    <?php
      if (!isset($_GET["t"]) || $_GET["t"] == "in") {
        require 'msgs/inbox.php';
      }elseif ($_GET["t"] == "out") {
        require 'msgs/outbox.php';
      }elseif ($_GET["t"] == "sendmsg") {
        require 'msgs/sendmsg.php';
      }else {
        echo "Invalid type";
      }
     ?>
  </body>
</html>
