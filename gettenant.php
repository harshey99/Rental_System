<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php

	$email= $_GET['email'];

	$servername="localhost";
					$username="root";
					$password="";
					$dbname="project3";

	$conn = new mysqli($servername,$username,$password,$dbname);

	if (!$conn) {
		die('Could not connect: ' . mysqli_error($conn));
	}

	$sql1="SELECT * FROM tenant WHERE email = '".$email."'";
	$result1 = $conn->query($sql1);
	$row1 = $result1->fetch_assoc();

	echo "<img class=\"img-responsive \" src=\"CSS/Image/c1.jpg\" height=\"120px\" width=\"120px\" align=\"center\" style=\"border-radius:50%\"></img>
			  <div class=\"table-responsive table-bordered\" >
				  <table class=\"table table-hover\">
				      <tr>
				        <th>Name</th>
						<td>".$row1['name']."</td>
				        </tr>
				      <tr>
					    <th>Email</th>
				        <td>".$row1['email']."</td>

				      </tr>
					  <tr>
					    <th>From</th>
				        <td>".$row1['frrom']."</td>

				      </tr>
					  <tr>
				        <th>Full Adress</th>
						<td>".$row1['adress']."</td>
				        </tr>

								<tr>
								<th>Status</th>
									<td>".$row1['status']."</td>

								</tr>

				      <tr>
					    <th>Contact No.</th>
				        <td>".$row1['phone']."</td>

				      </tr>

				    </tbody>
				  </table>


				</div>";
?>
</body>
</html>
