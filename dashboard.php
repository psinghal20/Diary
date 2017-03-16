<?php
	session_start();
	include 'config.php';
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	if (!isset($_SESSION["user"])) {
		header("location:untitled.php");
	}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Dashboard</title>
</head>
<body>
	<div>!WELCOME TO YOUR DASHBOARD!
	<a href="logout.php">Logout!</a>
	</div>
	<?php 
		$sql = "SELECT title,date,post FROM posts where username='".$_SESSION["user"]."' order by id desc";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
        	echo "<div>".$row['title']."<br>".$row['date']."</div><div>".$row['post']."</div>";
    		}
		} 
		else {
    		echo "You have no posts!";
		}
	?>
	<h3 id="new_post_bttn" onclick="document.getElementById('new_post').style.display='block'"">New Post</h3>
	<div id="new_post">
		<form method="post" action="add_post.php">
			Enter Title:<br>
			<input type="text" name="Title"><?php echo $_GET["title_err"]; ?><br>
			Your post:<br>
			<input type="text" name="post"><br>
			<input type="submit" name="submit_post" value="submit">
		</form>
</body>
</html>