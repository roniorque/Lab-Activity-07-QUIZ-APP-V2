<?php
session_start();
session_destroy();
require "vendor/autoload.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
</head>
<style>
.page {
  border-style: solid;
  max-width:600px;
  margin: auto;
}
.content {
  max-width: 500px;
  margin: auto;
}
.inner_content {
  max-width: 200px;
  margin: auto;
}
</style>
<body>
<div class= "page">
<div class= "content">
	<h1>Quiz Web Application Registration</h1>
	<h3>Kindly register your basic information before starting the Quiz.</h3>
</div>
  <div class= "inner_content">
	<form name= "myForm" method="POST" action="register.php">
		Enter your full name:<br />
		<input type="text" name="complete_name" placeholder="Full Name" />
		<br />
    Email Address:<br />
    <input type= "email" name="email" placehodler= "Email" />
    <br />
		Birthdate:<br />
		<input type="date" name="birthdate" />
    <br />
		<input type="submit">
    
  </div>
  
	</form>
  
</div>
<?php
var_dump($_SESSION);
?>
</body>
</html>

