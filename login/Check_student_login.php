<?php
include("connectdb.php");

$strUsername = $_POST['uname'];
$strPassword = $_POST['psw'];
$member_id = $_POST['member_id'];

if ($_POST != "admin"){
	$sql = "SELECT * FROM tb_member where member_code='$strUsername'";
	$result = $conn->query($sql);
	$row=mysqli_fetch_array($result);
	$conn->close();
}

session_start();
if($strUsername == $row['member_code'] && $strPassword == $row['member_code'] && $row['member_type'] == 'student'){
	//*** Session
	$_SESSION["username"] = $strUsername;
	session_write_close();

	//*** Go to Main page
	header("location:../Page/student/student_page.php?id=".$member_id);
}
else{
	header("location:login_student.php?text=somethingwrong");
	exit();
	// header("location:login.php");
}


?>