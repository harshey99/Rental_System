<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
session_start();
$job_id = $_GET['job_id'];
$servername="localhost";
					$username="root";
					$password="";
					$dbname="project3";

$conn = new mysqli($servername,$username,$password,$dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql="SELECT * FROM vacancy WHERE job_id = ".$job_id."";
$result = $conn->query($sql);



echo "<div class=\"table-responsive table-bordered\" >
				  <table class=\"table table-hover\">
				  <tr>
				   <th>Owner Name</th>
				   <th>Building Name</th>
				   <th>Address</th>
					 <th>Property Type</th>
					 <th>Rent</th>
				   </tr>
				   ";
			while($row = $result->fetch_assoc()){
					echo		   "
				   <tr>
				   <td>".$row['owner_name']."</td>
				   <td>".$row['building_name']."</td>
				   <td>".$row['address']."</td>
					 <td>".$row['property_type']."</td>
					 <td>".$row['rent']."</td>
				   </tr>";
			}
			echo	   "
				   </table>";



			echo "</div>";

?>
</body>
</html>
