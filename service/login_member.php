<?php
	session_start();
	// if(isset($_REQUEST["login"])){

	include("connect_db.php");

	$username = $_POST["username"];
	$password = $_POST["password"];

//query
	$sql = "SELECT * FROM member WHERE mem_username='".$username."' and mem_password='".$password."'";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)==1){
		$row = mysqli_fetch_array($result);

		$_SESSION["id"] = $row["id"];
		$_SESSION["mem_username"]=$row["mem_username"];
		$_SESSION["mem_password"]=$row["mem_password"];
		$_SESSION["status"] = $row["status"];
		
		

		if($_SESSION["status"]=="super@admin"){

			Header("Location: ../index.php");
		
		}if($_SESSION["status"]=="E"  ){

			Header("Location: ../emp.php");

		}if($_SESSION["status"]=="V"){

			Header("Location: ../manage_vendor.php");

		}if($_SESSION["status"]=="C"){

			Header("Location: ../manage_cus.php");
		}
	
	}else{
		echo "<script>";
			echo "alert(\" Username or Password Incorrect! \");";
			echo "window.history.back()";
			echo "</script>";

	}
	
?>