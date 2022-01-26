<?php

	$servername="localhost";
	$username="root";
	$password="";
	$dbname="project3";

	$conn = new mysqli($servername,$username,$password,$dbname);

	if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$from=$_POST['from'];
		$address=$_POST['address'];
		$status=$_POST['status'];
		$password=$_POST['password'];
		$contact=$_POST['contact'];


		$sql="INSERT into tenant(name,email,frrom,adress,status,pwd,phone) values('$name','$email','$from','$address','$status','$password','$contact')";

		if($conn->query($sql)===TRUE){
			$GLOBALS['conn']->close();
		echo "<SCRIPT type='text/javascript'> //not showing me this
								alert('Account Created!');
								window.location.replace(\"index.html\");
							</SCRIPT>";
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}



	}




?>
