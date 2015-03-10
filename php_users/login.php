<?php
if(!isset($_POST["username"]) || !isset($_POST["password"])){
  die("Du måste fylla i alla fält!");
}

require_once("DatabaseConn.php");

if(login($_POST["username"], $_POST["password"])){
  header("Location: index.php");
  $dbconn = null;
  exit;
}

header("Location: index.php?error=Har du angett rätt användarnamn/lösenord?");
$dbconn = null;
exit;
?>
