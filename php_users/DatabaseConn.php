<?php
/**
  * DatabaseConn.php
  * Open SQlite database and add some useful functions
  * @author Philip Johansson <http://github.com/phille97>
  */

define("HASH_COST", 9);

// Start a new session or use an existing one.
session_start();

$dbconn = new SQLite3("users.sqlite");

if(!$dbconn) die("Can't access the database");

/**
  * Tries to protect from sql injections etc. in the input from the client.
  *
  * @param $str String to strip from unsafe input
  * @return a safer version of $str
  */
function cleanInput($str) {
  $str = str_replace(array("$", "%", "|", ";"), "", $str);
  return $str;
}

/**
  * Logout the current user
  */
function logout(){
  $_SESSION["USERID"] = null;
}

/**
  * Checks if the user in the current session is logged in.
  *
  * @return Success: true | false
  */
function loggedIn() {
  if(isset($_SESSION["USERID"])){
    $userid = $_SESSION["USERID"];
    if($userid != null) return $userid;
    return false;
  } else {
    return false;
  }
}

/**
  * Try to login using a username and a password.
  *
  * @param $username Username of the user to login to.
  * @param $rawpassword Password to try against the one in the database.
  * @return Success: true | false
  */
function login($username, $rawpassword){
  global $dbconn;
  $username = cleanInput($username);
  $rawpassword = cleanInput($rawpassword);

  $query = "SELECT userid, username, hashedpassword FROM Users ";
  $query .= "WHERE username = '$username';";
  $result = $dbconn->query($query);

  if(!$result){
    return false;
  }

  while($user = $result->fetchArray()){
    if(password_verify($rawpassword, $user["hashedpassword"])){
      $_SESSION["USERID"] = $user["userid"];
      return true;
    }
    return false;
  }
  return false;
}

/**
  * Insert a new User into the Users table.
  *
  * @param $username Username to register
  * @param $rawpassword Password to hash and register with.
  * @return Success: true | false
  */
function register($username, $rawpassword){
  global $dbconn;
  $username = cleanInput($username);
  $hashedpassword = password_hash(
    cleanInput($rawpassword),
    PASSWORD_DEFAULT,
    array('cost' => HASH_COST)
  );
  $query = "INSERT INTO Users (username, hashedpassword) VALUES";
  $query .= "('$username', '$hashedpassword');";
  $result = $dbconn->query($query);

  if($result) {
    return true;
  }else{
    return false;
  }
}

?>
