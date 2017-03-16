<?php
include 'config.php';
session_start();
$username_err=$password_err=$user=$pass="";
$see_err=0;
if(isset($_SESSION["user"])){
	header("location:dashboard.php");
}
$conn = mysqli_connect($servername, $username, $password,$dbname);
function sanitize($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
if(isset($_POST["submit"])){
	if(empty($_POST["user_id"])){
		$username_err="username is required";
		$see_err=1;
	}
	else{
		$user=sanitize($_POST["user_id"]);
	}
	
	if(empty($_POST["pass"])){
		$password_err="password is required";
		$see_err=1;
	}
	else{
		$pass=sanitize($_POST["pass"]);
	}
	
	if($see_err==0){
		$sql = "SELECT * FROM login where username='".$user."' and pass='".$pass."'";
		$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
    			$_SESSION["user"]=$user;
        		header("location:dashboard.php?username_err=".$username_err."&password_err=".$password_err);
    		}
		} 
		else {
    		$see_err=2;
		}
	}
	header("location:index.php?username_err=".$username_err."&password_err=".$password_err."&see_err=".$see_err);
}
?>
