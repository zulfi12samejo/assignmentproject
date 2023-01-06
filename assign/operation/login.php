<?php
	session_start();
	include('../db.php');
	$email = $_POST['email'];
	$pass  = $_POST['password'];
	
$sql = "SELECT * from user WHERE email=:email AND password=:pass";
try{
	$query = $con->prepare($sql);
	$query->bindParam(':email',$email);
	$query->bindParam(':pass',$pass);
	$res = $query->execute();
	$data = $query->fetchAll();
if(count($data)>0){
	$_SESSION['user'] = $data;
	header("location:../home.php");
}
else{
	 $_SESSION['msg'] = 'Incorrect Data Provided..';
	  header("location:../login.php");
}
}catch(PDOException $e){
	echo $e->getMessage();
}

?>