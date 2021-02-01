<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../");
    exit;
}
$user = $_SESSION["username"];
$target_dir = "../Usercontent/Uploads/$user/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(!file_exists($target_dir)){
  mkdir($target_dir);
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

    $xfile = "../Usercontent/Uploads/$user/files.xml";

    $xml = simplexml_load_file($xfile) or die("Error: Cannot create object");

    $files = $xml->files;

    $name = basename($_FILES["fileToUpload"]["name"]);

    $file = $files->addChild('file');
    $file->addChild('link', "<a href='download.php?path=$target_file'>$name</a>");
    $file->addChild('name', $name);
    $file->addChild('path', $target_file);

    $xml->asXML($xfile);

    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
