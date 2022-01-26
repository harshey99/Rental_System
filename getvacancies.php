	<!DOCTYPE html>
	<html>
	<head>

	</head>
	<body>

	<?php
	session_start();
	$name = $_GET['name'];
	$servername="localhost";
						$username="root";
						$password="";
						$dbname="project3";

	$conn = new mysqli($servername,$username,$password,$dbname);
	if (!$conn) {
	    die('Could not connect: ' . mysqli_error($conn));
	}

	$sql="SELECT * FROM vacancy WHERE company_name = '".$name."'";
	$result = $conn->query($sql);



	echo "<div class=\"table-responsive table-bordered\" >
					  <table class=\"table table-hover\">
					  <tr>
					   <th>Owner name</th>
						 <th>State</th>
						 <th>City</th>
						 <th>Property Type</th>
						 <th>House name</th>
						 <th>Property Image</th>
					   <th>Location</th>
					   <th>Security Deposit</th>
						 <th>Rent</th>
						 <th>Tenant type</th>
					   <th>Booking Request</th>
					   </tr>
					   ";
				while($row = $result->fetch_assoc()){
						echo		   "
					   <tr>
					   <td>".$row['owner_name']."</td>
						 <td>".$row['state']."</td>
						 <td>".$row['city']."</td>
						 <td>".$row['property_type']."</td>
						 <td>".$row['building_name']."</td>
						 <td><img src='".$row['picsource']."' height='150' width='200'></td>
					   <td>".$row['address']."</td>
						 <td>".$row['deposit']."</td>
						 <td>".$row['rent']."</td>
					   <td>".$row['status']."</td>";


					   $sql1="SELECT * FROM applications WHERE s_mail = '".$_SESSION['email']."' AND job_id=".$row['job_id']."";
					   $result1 = $conn->query($sql1);

					   if($result1->num_rows != 0){
					    $row1 = $result1->fetch_assoc();
								if($row1['status'] == 0){
									echo "<td>Status: Pending</td>";
								}elseif($row1['status'] == 1){
									echo "<td>Status: Accepted!</td>";
								}else {
									echo "<td>Status: Rejected!</td>";
								}

					   }else{
						   echo" <td>

										<input type=\"button\" style=\"color: black;\" value=\"Request\" onclick=\"msg('".$row['job_id']."','".$_SESSION['email']."',this)\">

							</td>";
						}

					   echo "</tr>";
				}
				echo	   "
					   </table>
					   </div>";

	?>
	</body>
	</html>
