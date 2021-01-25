<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../");
    exit;
}

$file = 'msgs.xml';

$xml = simplexml_load_file($file) or die("Error: Cannot create object");

$msgs = $xml->msgs;
$info = $xml->info;
$id = $info->id + 1;

$msg = $msgs->addChild('msg');
$msg->addChild('id', $id);
$msg->addChild('to', $_GET["to"]);
$msg->addChild('from', $_SESSION["username"]);
$msg->addChild('desc', $_GET["desc"]);
$msg->addChild('body', $_GET["body"]);
$xml->info->id = $id;

$xml->asXML($file);

header("location: ./?t=out")
 ?>
