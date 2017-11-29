<?php session_start(); ?>
<?php ob_start(); ?>
<?php 
	// Application name 
	$site_title = "The Magic Pot";
	// If session variable is not set it will redirect to login page
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	header("location: login.php");
	exit;
	}

	if(isset($_POST['submit'])){
	move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$_FILES['file']['name']);
	$con = mysqli_connect("localhost","root","","magic_pan");
	$q = mysqli_query($con,"UPDATE users SET avatar = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'");
	}

	// Get the current user avatar
	
	$currentUserName = $_SESSION["username"];
	$con = mysqli_connect("localhost","root","","magic_pan");
	
	//echo $currentUserName;

	$currentUserSQL = "SELECT * FROM users WHERE username = '$currentUserName'";
	$currentUserQuery = mysqli_query($con, $currentUserSQL);
	$currentUserRow = mysqli_fetch_row($currentUserQuery);
	$user__id = $currentUserRow[0];
	$currentUserImg = $currentUserRow[4];
	$sessionUserId = $currentUserRow[0];
	$user__alias = $currentUserRow[5];
	$user__location = $currentUserRow[6];
	$user__description = $currentUserRow[7];

	if (strlen($currentUserImg) > 0)
	{
	    $user__src = "uploads/$currentUserImg";
	}

	else
	{
	    $user__src = "uploads/default.png";
	}
	
	/*
	$q = mysqli_query($con,"SELECT * FROM users WHERE username = '$currentUserName'");
		while($row = mysqli_fetch_assoc($q)){
		//echo $row['username'];
		if ($row['avatar'] == ""){
			echo "<img width='100' height='100' src='uploads/default.jpg' alt='Default Profile Pic'>";
		} else {
			echo "<img width='100' height='100' src='uploads/".$row['avatar']."' alt='Profile Pic'>";
		}
		echo "<br>";
	}*/
					
?>