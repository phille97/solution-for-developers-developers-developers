<?php
require_once("DatabaseConn.php");

logout();

header("Location: index.php?error=Du har loggat ut!");

$dbconn = null;
?>
