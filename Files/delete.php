<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../");
    exit;
}

$user = $_SESSION["username"];
$name = $_GET["name"];

$xml = simplexml_load_file("../Usercontent/Uploads/$user/files.xml") or die("Error: Cannot create object");
// TODO: Delete File Information In files.xml
$doc = new DOMDocument;
$doc->load("../Usercontent/Uploads/$user/files.xml");
// FIXME: getElementsByTagName() Does Not Work
$searchNode = $doc->getElementsByTagName( "files" )->getElementsByTagName( "file" );

foreach( $searchNode as $sN )
{
    $valueName = $sN->getAttribute('name');
    if($valueName == $name){
      $doc->getElementsByTagName( "files" )->removeChild($sN);
    }

}
echo $doc->saveXML();
/*$files = $doc->documentElement;

// we retrieve the chapter and remove it from the book
$file = $files->getElementsByTagName('file')->item(0);
$oldfile = $files->removeChild($file);

echo $doc->saveXML();

//$file = $xml->files->file->attributes()->{'name'} == $name;
//unset($file);

foreach($xml->files->children() as $files){
  if ($files->attributes()->{'name'} == $name) {
    // FIX ME: unset($files) Does Not Work
    unset($xml->files->file->attributes()->{'name'} :: $name);
  }
}*/
$xml->asXML("../Usercontent/Uploads/$user/files.xml");

$file = $_GET["file"];

if (file_exists($file)) {
    unlink($file);
    header("location: ./");
} else {
    echo "Could Not Delete File";
}
?>
