<?php
include 'config.php';
$username_err=$password_err=$user=$pass=$mobile_no_err=$ph_no="";
$see_err=0;
$conn=mysqli_connect($servername,$username,$password,$dbname);
function sanitize($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
if (isset($_POST["reg-submit"])) {
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
	if(empty($_POST["mobile_no"])){
		$mobile_no_err="mobile number is required";
		$see_err=1;
	}
	else{
		$ph_no=sanitize($_POST["mobile_no"]);
	}
	if($see_err==0){
		$sql = "Insert login(username,pass,ph_no) values('".$user."','".$pass."','".$ph_no."')";
		$conn->query($sql);	
		echo "New recodrd added successfully<br><a href='untitled.html'>Click Here to login!";
	}
	else{
		header("location:register.php?username_err=".$username_err."&password_err=".$password_err."&mobile_no_err=".$mobile_no_err);
	}
}
?>
