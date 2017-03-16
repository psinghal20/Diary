<?php
	session_start();
	include 'config.php';
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	$title_err=$post=$title="";
	$see_err=0;
	function sanitize($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	if(isset($_POST["submit_post"])){
		if (empty($_POST["Title"])){
			$title_err="Title is required";
			$see_err=1;
		}
		else{
			$title=sanitize($_POST["Title"]);
		}
		$post=sanitize($_POST["post"]);
		if($see_err==0){
			$sql = "Insert posts(title,post,date,username) values('".$title."','".$post."','".date("Y-m-d")."','".$_SESSION["user"]."')";
			$conn->query($sql);	
		}
		header("location:dashboard.php?title_err=".$title_err);
	}
?>