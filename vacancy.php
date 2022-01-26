<html>
	<head>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/style1.css">
		<nav class="navbar navbar-fixed-top" id="top-nav">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Apartment Rental System</a>
				</div>
				<ul id="list1" class="nav navbar-nav">
					<li class="active"><a href="owner_dash.php">Home</a></li>
				    <li class="active"><a href="index.html">Logout</a></li>
				</ul>
			</div>
		</nav>

		<style>
		body  {
			background-image: url("imageo.jpg");

		}
		</style>
	  </head>
	  <body>

	  <?php
		session_start();
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="project3";

		$conn = new mysqli($servername,$username,$password,$dbname);

		if($conn->connect_error){
			die("Connection failed: ".$conn->connect_error);
		}




		if($_SERVER["REQUEST_METHOD"]=="POST"){
			$owner_name=$_POST['owner_name'];
			$city=$_POST['city'];
			$state=$_POST['state'];
			$address=$_POST['address'];
			$pin_code=$_POST['pin_code'];
			$property_type=$_POST['property_type'];
			$building_name=$_POST['building_name'];
			$floor=$_POST['floor'];
			$deposit=$_POST['deposit'];
			$rent=$_POST['rent'];
			$status=$_POST['status'];


			$filename = $_FILES["uploadfile"]["name"];
			$tempname = $_FILES["uploadfile"]["tmp_name"];
			$folder="property_image/".$filename;
			move_uploaded_file($tempname,"$folder");
			//echo "<img src='$folder' height='200' width'200'/>";


			// echo $owner_name. "<BR>";
			// echo $city. "<BR>";
			// echo $state. "<BR>";
			// echo $address. "<BR>";
			// echo $pin_code. "<BR>";
			// echo $property_type. "<BR>";
			// echo $building_name. "<BR>";
			// echo $floor. "<BR>";
			// echo $deposit. "<BR>";
			// echo $rent. "<BR>";
			// echo $status. "<BR>";

				$sql="INSERT into vacancy(company_name,owner_name,city,state,address,pin_code,property_type,building_name,flor,deposit,rent,status,picsource) values(\"".$_SESSION['name']."\",\"".$owner_name."\",\"".$city."\",\"".$state."\",\"".$address."\",".$pin_code.",\"".$property_type."\",\"".$building_name."\",".$floor.",".$deposit.",".$rent.",\"".$status."\",\"".$folder."\");";
						;

			if($conn->query($sql)===TRUE){
			$GLOBALS['conn']->close();
		echo "<SCRIPT type='text/javascript'> //not showing me this
								alert('Vacancy Created Succesfully!!');
								window.location.replace(\"owner_dash.php\");
							</SCRIPT>";
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

			/*
			$GLOBALS['conn']->close();
			header('Location: owner_dash.php ');
			echo '<script language="javascript">';
			echo 'alert("Vacancy succesfully created!")';
			echo '</script>';*/
		}
	  ?>

		<div class=" container-fluid " id="dash" >
		<h2>CREATE VACANCY</h2>

		<form action="vacancy.php" method="POST" enctype="multipart/form-data">
        <div class="container">
		   <h3>Property Details</h3>
           <hr>
           <table>
						 <tr>
						 	<td><label for="Owner_Name"><b>Owner Name</b></label></td>
							<td><input type="text" name="owner_name" required></td>
						 </tr>
						 <tr>
						 	<td><label for="City"><b>City</b></label></td>
							<td><input type="text" placeholder="Eg.Bangalore" name="city" required></td>
						 </tr>
						 <tr>
						 	<td><label for="State"><b>State</b></label></td>
							<td><input type="text" placeholder="Eg.Karnataka" name="state" required></td>
						 </tr>
						 <tr>
						 	<td><label for="Full_Address"><b>Full Address</b></label></td>
							<td><input type="text" placeholder="" name="address"></td>
						 </tr>
						 <tr>
						 	<td><label for="Pin_code"><b>Pin code</b></label></td>
							<td><input type="text" placeholder="000000" name="pin_code"></td>
						 </tr>
						 <tr>
						 	<td><label for="Property_type"><b>Property Type</b></label></td>
							<td><input type="text" placeholder="1bhk/2bhk/3bhk" name="property_type"></td>
						 </tr>
						 <tr>
						 	<td><label for="Building_Name"><b>Building Name</b></label></td>
							<td><input type="text" placeholder=" " name="building_name"></td>
						</tr>
						<tr>
						 <td><label for="Floor"><b>Floor</b></label></td>
						 <td><input type="number" placeholder="" name="floor"></td>
						</tr>
						<tr>
						 <td><label for="Security"><b>Security Deposit:</b></label></td>
						 <td><input type="text" placeholder="" name="deposit"></td>
						</tr>
						 <tr>
						 <td><label for="Rent"><b>Rent</b></label></td>
						 <td><input type="number" placeholder="Rent/Month" name="rent"></td>
						</tr>
						<tr>
						 <td><label for="image"><b>Property Image</b></td>
						 <td><input type="file" name="uploadfile"/></td>
						</tr>
						<tr>
						 <td><label for="status"><b>Rental Status</b></label></td>
						 <td><select name="status" placeholder="Select">
							 <option>Select one</option>
		           <option label="Bachelor">Bachelor</option>
					 	   <option label="Family">Family</option>
		 		  </select></td>
						</tr>
						</table>
<br>
						<button type="submit" class="button button2">Create Vacancy</button></div>
					 </form>
 <hr>

</div>
	</body>
		<footer>
		<nav class="navbar navbar-footer" id="bottom-nav" style="width:100%">
			<div class="container-fluid">
				<div id="col1" >
					<ul id="blist1">
						<li><a href='#'>About Us</a></li>
						<li><a href='#'>FAQs</a></li>
						<li><a href='#'>Contact Us</a></li>
					</ul>
				</div>

				<div id="col2" >
					<ul id="blist1">
						<li><a href='#'>Privacy Policy</a></li>
						<li><a href='#'>Legal</a></li>
						<li><a href='#'>Work With Us</a></li>
					</ul>
				</div>

				<div id="col3" class=" container-fluid">

					<ul id="blist3" >
						<li><i class="fa fa-facebook fa-2x" ><a href='#'></a></i></li>
						<li><i class="fa fa-twitter fa-2x"><a href='#'></a></i></li>
						<li><i class="fa fa-instagram fa-2x"><a href='#'></a></i></li>
						<li><i class="fa fa-linkedin fa-2x"><a href='#'></a></i></li>
					</ul>
					<ul>
					<!--<p id="lic">site design / logo (c) Company_Name Inc.<br> licensed under Company_Name inc. </p>-->
					<li id="blist4">site design / logo (c) Company_Name Inc.<br> licensed under Company_Name inc.</li>
					</ul>
				</div>
			</div>
		</nav>
	</footer>
</html>
