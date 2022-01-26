<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/style1.css">
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

		<nav class="navbar navbar-fixed-top" id="top-nav">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Apartment Rental System</a>
				</div>
				<ul id="list1" class="nav navbar-nav">
					<li class="active"><a href="index.html">Home</a></li>

				   <li class="active"><a href="delete_tenant_a.php">Delete Tenant</a></li>
				   <li class="active"><a href="delete_owner_a.php">Delete Owner</a></li>
				   <li class="active"><a href="index.html">Logout</a></li>
				</ul>
			</div>
		</nav>

		<style>
		body  {
			background-image: url("back.jpg");
			background-color: #cccccc;
		}


		#bottom-nav{
		margin-top: 200px;
		}
		</style>

	</head>

	<body>
		<br>
		<hr>

	 <h2 align="center">ADMIN DASHBOARD</h2><hr>
		<div class=" container-fluid" id="dash">
		  <div class="row">
		    <div class=" col-sm-12" style="background-color: #6d6d75 ; height:auto; margin:10px;">


			  <br>
			  <br>
			  <div>

			  <?php
			  session_start();
				$servername="localhost";
					$username="root";
					$password="";
					$dbname="project3";

					// Create connection
                   $conn = new mysqli($servername, $username, $password, $dbname);
                 // Check connection
                 if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                          }
			 echo "<style>
                table, th, td {
                   border: 2px solid black;
                   border-collapse: collapse;
				   }
                th, td {
                   padding: 5px;
                    text-align: left;
                          }
                 </style>";

		 echo  " <form method=\"POST\" action=\"\">
            <select type=\"text\" name=\"name\" placeholder=\"Select\">
			<option label=\"SELECT TO CHECK\">SELECT TO CHECK</option>
		   <option label=\"TOTAL REGISTERED TENANT\">TOTAL REGISTERED TENANT</option>
          <option label=\"TOTAL RENTED TENANT\">TOTAL RENTED TENANT</option>
	      <option label=\"TOTAL REGISTERED OWNERS\">TOTAL REGISTERED OWNERS</option>
		  <option label=\"TENANT RENTED IN BANGLORE\">TENANT RENTED IN BANGLORE</option>
		  <option label=\"TOTAL VACANCIES\">TOTAL VACANCIES</option>
		


       <input type=\"submit\" style=\"color: black;\"></input>
        </form>" ;
				  if(isset($_POST['name']) && $_POST['name']=="TOTAL REGISTERED TENANT") {

               	 $sql = "SELECT * FROM tenant";
                $result = $conn->query($sql);

               echo "<h4 align=\"center\">REGISTERED TENANT</h4>";
			   echo "<br>";
             if ($result->num_rows > 0) {
                 echo "<table class=\"table table-hover\"><tr><th>Name</th><th>Email</th><th>Contact No.</th><th>From</th><th>Address</th><th>Status</th></tr>";

               while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["frrom"]."</td><td>".$row["adress"]."</td><td> ".$row["status"]."</td></tr>";
                    }
              echo "</table>";
         }  else {
            echo "0 results";
               }
				  }

			  if(isset($_POST['name']) && $_POST['name']=="TOTAL VACANCIES") {

               	 $sql = "SELECT * FROM vacancy";
                $result = $conn->query($sql);

               echo "<h4 align=\"center\">TOTAL VACANCIES</h4>";
			   echo "<br>";
             if ($result->num_rows > 0) {
                 echo "<table class=\"table table-hover\"><tr><th>Company Name</th><th>Owner Name</th><th>City</th><th>State</th><th>Address</th><th>Property Type</th><th>Floor Number</th><th>Rent</th><th>Deposit</th></tr>";

               while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["company_name"]."</td><td>".$row["owner_name"]."</td><td>".$row["city"]."</td><td>".$row["state"]."</td><td> ".$row["address"]."</td><td> ".$row["property_type"]."</td><td> ".$row["flor"]."</td><td> ".$row["rent"]."</td><td> ".$row["deposit"]."</td></tr>";
                    }
              echo "</table>";
         }  else {
            echo "0 results";
               }
				  }


			if(isset($_POST['name']) && $_POST['name']=="TOTAL REGISTERED OWNERS") {

               	 $sql = "SELECT * FROM owners";
                $result = $conn->query($sql);
				echo "<h4 align=\"center\">REGISTERED OWNERS</h4>";
				echo "<br>";
             if ($result->num_rows > 0) {
                 echo "<table class=\"table table-hover\"><tr><th>Name</th><th>Email</th><th>Phone</th><th>Location</th><th>Address</th></tr>";
                while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td> ".$row["phone"]."</td><td> ".$row["location"]."</td><td> ".$row["adress"]."</td></tr>";
                    }
              echo "</table>";
         }  else {
            echo "0 results";
               }
				  }

		 if(isset($_POST['name']) && $_POST['name']=="TOTAL RENTED TENANT") {

               	 $sql = "SELECT * FROM tenant as S,applications as A,vacancy as V where S.email=A.s_mail and A.job_id=V.job_id and A.status=1 ";
                $result = $conn->query($sql);

                   echo "<h4 align=\"center\">RENTED TENANT</h4>";
				   echo "<br>";
             if ($result->num_rows > 0) {
                 echo "<table class=\"table table-hover\"><tr><th>Name</th><th>Email</th><th>Contact No.</th><th>From</th><th>Address</th><th>Status</th></tr>";

               while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["frrom"]."</td><td>".$row["adress"]."</td><td> ".$row["status"]."</td></tr>";
                    }
              echo "</table>";
         }  else {
            echo "0 results";
               }
				  }

		  if(isset($_POST['name']) && $_POST['name']=="RENTED TENANT IN BANGLORE") {

               	 $sql = "SELECT * FROM tenant as S,applications as A,vacancy as V where S.email=A.s_mail and A.job_id=V.job_id and A.status=1 and V.location='Banglore'";
                $result = $conn->query($sql);

                   echo "<h4 align=\"center\">RENTED TENANT IN BANGLORE</h4>";
									 echo "<br>";
				             if ($result->num_rows > 0) {
				                 echo "<table class=\"table table-hover\"><tr><th>Name</th><th>Email</th><th>Contact No.</th><th>From</th><th>Address</th><th>Status</th></tr>";

				               while($row = $result->fetch_assoc()) {
				                echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["frrom"]."</td><td>".$row["adress"]."</td><td> ".$row["status"]."</td></tr>";
				                    }
				              echo "</table>";
				         }  else {
				            echo "0 results";
				               }
								  }

				 //  if(isset($_POST['name']) && $_POST['name']=="STUDENTS PLACED AS DEVELOPERS") {
				 //
         //       	 $sql = "SELECT * FROM tenant as S,applications as A,vacancy as V where S.email=A.s_mail and A.job_id=V.job_id and A.status=1 and V.job_title='Developer'";
         //        $result = $conn->query($sql);
				 //
         //           echo "<h4 align=\"center\">STUDENTS PLACED AS DEVELOPERS</h4>";
				 //   echo "<br>";
         //     if ($result->num_rows > 0) {
         //         echo "<table class=\"table table-hover\" ><tr><th>Name</th><th>Email</th><th>Contact No.</th><th>Degree</th><th>Branch</th><th>C.P.I.</th><th>12th Percentage</th><th>10th Percentage</th><th>Company</th><th>Job Title</th><th>Salary (LPA)</th><th>Location</th></tr>";
				 //
         //       while($row = $result->fetch_assoc()) {
         //        echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["degree"]."</td><td> ".$row["branch"]."</td><td>".$row["cpi"]."</td><td>".$row["12p"]."</td><td>".$row["10p"]."</td><td>".$row["company_name"]."</td><td>".$row["job_title"]."</td><td>".$row["salary"]."</td><td>".$row["location"]."</td></tr>";
         //            }
         //      echo "</table>";
         // }  else {
         //    echo "0 results";
         //       }
				 //  }
           $conn->close();
          ?>


<hr>

			</div>
		  </div>
		</div>
 </div>
<hr>
	</body>

<footer>
		<nav class="navbar navbad-default" id="bottom-nav">
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
