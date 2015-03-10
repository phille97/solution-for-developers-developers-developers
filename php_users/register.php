<?php
if(!isset($_POST["username"]) || !isset($_POST["password"])){
  header("Location: index.php");
  exit;
}

require_once("DatabaseConn.php");

if(register($_POST["username"], $_POST["password"])){
  if(login($_POST["username"], $_POST["password"])){
    header("Location: index.php");
    $dbconn = null;
    exit;
  }
}
header("Location: index.php?error=Något gick fel!
  Det kanske redan finns en användare med det namnet?"
);
$dbconn = null;
exit;
?>
