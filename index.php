<?php
include 'config.php';
session_start();
$user=$pass="";
if(isset($_SESSION["user"])){
	header("location:dashboard.php");
}
?>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Diary-your personal space</title>
	</head>
	<body>
	<div class="container-fluid">
		<img src="red_bookmark.png" id="bookmark"/>
		<div id="intro">
			<h1 id="title">Diary</h1>
			<h2 id="subheading">Your Personal Space</h2>
			<div id="scroller">
				<div id="window">
					<div id="content">
						<p class="introduction">We all have Secrets.</p>
						<p class="introduction">We all wanna get them out.</p>
						<p class="introduction">Only few are lucky enough to have people to share thier secrets.</p>
						<p class="introduction">But</p>
						<p class="introduction">The Diary is your true firend.</p>
						<p class="introduction">It will absorb all your secrets.</p>
						<p class="introduction">Never utter a word about them.</p>
						<p class="introduction">Now let your thoughts flow.</p>			
					</div>
				</div>
			</div>
		</div>
		<div id="form">
			<form method="post" action="test.php">
				<div class="form-group">
				<label for="user_id">Username:</label>
				<input type="text" name="user_id" class="form-control" id="user_id"><?php echo $_GET["username_err"] ?>
				</div>
				<div class="form-group">
				<label for="pass">Password:</label>
				<input type="password" name="pass" placeholder="Password" id="pass" class="form-control"><?php echo $_GET["password_err"] ?>
				</div>
				<div id="sbtn">
				<input type="submit" name="submit" value="submit" class="btn btn-default" id='submit'><br>
				</div>
			</form>
		</div>
		<?php 
		if($_GET["see_err"]==2)
		echo "<div style='text-align:center;'>user not found</div>";
		?>
		<div class="text-center" id="footer" >
			<div>Haven't explored your personal space?</div>
			<a href="register.php" id="register">!Create an account!</a>
		</div>
	</div>
	</body>
</html>