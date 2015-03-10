<?php
/**
	* Login system in PHP using SQlite and hashed passwords
	*
	* Made by: Philip Johansson (github.com/phille97)
	*
	*/
require_once("DatabaseConn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Really simple PHP login system</title>
  <style>
  @import url(http://fonts.googleapis.com/css?family=Lato:400);
  *{
    margin: 0;
    padding: 0;
    font-family: Lato;
  }
  body {
    width: 100%;
    height: 100%;
    background-color: #2c3e50;
  }
  .center-box{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
		-webkit-transform: translate(-50%, -50%);
		-moz-transform: translate(-50%, -50%);
    background-color: #2980b9;
    color: #2c3e50;
    padding: 20px;
  }
	.error-msg {
		position: absolute;
		font-size: 20px;
		background-color: #e74c3c;
		padding: 10px;
		margin: 20px;
	}
  form {
    margin: 10px;
  }
  h2 {
    margin-bottom: 10px;
  }
  input {
    padding: 5px;
    font-size: 100%;
  }
  hr {
    border: 1px solid #2c3e50;
  }
  </style>
</head>
<body>
	<?php
	// Om man kommer till sidan med ?error=<something> i urlen så visas det i
	// övre vänstra hörnet
	if(isset($_GET["error"])){
		echo "<lable class='error-msg'>" . $_GET["error"] . "</lable>";
	}
	?>

  <?php
  if(!loggedIn()) {
  ?>
  <div class="center-box">
    <form id="login-form" action="login.php" method="POST">
      <h2>Logga in:</h2>
      <input name="username" type="text" placeholder="Användarnamn" required />
      <input name="password" type="password" placeholder="Lösenord" required />
      <input type="submit" value="Logga in"></input>
    </form>
    <hr>
    <form id="register-form" action="register.php" method="POST">
      <h2>Registrera dig:</h2>
      <input name="username" type="text" placeholder="Användarnamn" required />
      <input name="password" type="password" placeholder="Lösenord" required />
      <input type="submit" value="Registrera"></input>
    </form>
  </div>
  <?php
  }else{
  ?>
  <div class="center-box">
      <h1>Välkommen användare #<?=loggedIn();?></h1>
      <a href="logout.php">Logga ut</a>
    </ul>
  </div>
  <?php } ?>
</body>
</html>
