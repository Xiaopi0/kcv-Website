<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../");
    exit;
}

$user = $_SESSION["username"];

$xml = simplexml_load_file("../Usercontent/Uploads/$user/files.xml") or die("Error: Cannot create object");
// TODO: Delete File Information In files.xml

$file = $_GET["file"];

if (file_exists($file)) {
    unlink($file);
    header("location: ./");
} else {
    echo "Could Not Delete File";
}
?>
