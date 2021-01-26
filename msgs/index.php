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
    <?php require '../menus/menu.php'; ?>
    <h1>USE <a href="https://discord.com">DISCORD!!!</a></h1>
    <?php
      if (!isset($_GET["t"]) || $_GET["t"] == "in") {
        require 'inbox.php';
      }elseif ($_GET["t"] == "out") {
        require 'outbox.php';
      }elseif ($_GET["t"] == "sendmsg") {
        require 'sendmsg.php';
      }else {
        echo "Invalid type";
      }
     ?>
  </body>
</html>
