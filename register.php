<html>
<head>
	<title>Register Yourself!</title>
</head>
<body>
<h1>Enter Details</h1>
<form method="post" action="register_user.php">
	Enter User ID:<br>
	<input type="text" name="user_id"><?php echo $_GET["username_err"] ?>
	<br>Enter Password:<br>
	<input type="password" name="pass"><?php echo $_GET["password_err"] ?><br>
	Enter Mobile Number:<br>
	<input type="text" name="mobile_no"><?php echo $_GET["mobile_no_err"] ?><br>
	<input type="submit" name="reg-submit" value="submit">
</form>
</body>
</html>