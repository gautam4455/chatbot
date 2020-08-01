<?php
	date_default_timezone_set('Asia/Kolkata');
	include('db.php');
	$inputbox=mysqli_real_escape_string($con,$_POST['inputbox']);
	$sql="select reply from chatbot_hints where question like '%$inputbox%'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
		$msg=$row['reply'];
	}else{
		$msg="Sorry not be able to understand you.";
	}
	//user data
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into message(message,added_on,type) values('$inputbox','$added_on','User')");

	//bot data
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into message(message,added_on,type) values('$msg','$added_on','Bot')");
	echo $msg;

?>