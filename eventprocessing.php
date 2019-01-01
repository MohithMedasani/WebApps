<!-- Medasani Venkat Mohith
Redid : 822088300
Instructor Cyndi Chie
Proj4 eventprocessing.php-->


<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>SDSU National History Museum Website</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">
	<script type="text/javascript" src="eventregjs.js"></script>
</head>
<body>
	<header>

			<div class="header">
			<img src="Images/logo.png" alt="sdsulogo">
			<h1 class="h1">SAN DIEGO STATE UNIVERSITY NATIONAL HISTORY MUSEUM </h1> 

			</div>

			<nav class="nav">
		
			<ul class="HNav1">
			<li>
			<a href="index.html">Home</a>
			</li>
			<li>
			<a href="about.html">About</a>
			</li>
			<li>
			<a href="exhibits.html">Exhibits</a>
			</li>
			<li>
			<a href="events.html">Events</a>
			</li>
			<li>
			<a href="science.html">Science</a>
			</li>
			<li>
			<a href="career.html">Careers</a>
			</li>
			<li>
			<a href="membership.html">Membership</a>
			</li>
			<li>
			<a href="donate.html">Donate</a>
			</li>
			</ul>
		
			</nav>
			
		</header>

		<section class="fcontainer">
		<div class="c_21">

		<h2>Sign up for the SDSU NHM Events</h2>
		<h3>Thank you for Registering to our event.</h3>

		
		<!-- Processing and echoing the vales from events_registration page -->





		<?php
  		$firstname = $_SESSION['firstname'];
  		$lastname = $_SESSION['lastname'];
  		$email = $_SESSION['email'];
  		$address = $_SESSION['address'];
  		$state = $_SESSION['state'];
  		$phonenumber = $_SESSION['phonenumber'];
  		$eventname = $_SESSION['eventname'];
  		$totalnofattendees = $_SESSION['totalnofattendees'];
  		$underfive = $_SESSION['underfive'];
  		$bwfivetwelve = $_SESSION['bwfivetwelve'];
  		$bwthriteenseventeen = $_SESSION['bwthriteenseventeen'];
  		$eighteenplus = $_SESSION['eighteenplus'];
  		$signupnewsletter =  $_SESSION['signupnewsletter'];
  		$otherevents = $_SESSION['otherevents'];
  		?>

  		<!-- JavaScript to acess php variables to javascript and using Function toProperCase to convert to proper  -->

  		<!-- Added additional Full name to the processing page  -->

  		<script type="text/javascript">

  		fn=<?php echo json_encode($firstname);?>; 

  		fname = toProperCase(fn);

  		ln=<?php echo json_encode($lastname);?>;

  		lname = toProperCase(ln);

  		funame = fname + " " + lname ;
	
  		</script>


  		<?php 

  		// Access Javascript variables in php 
  		
  		echo "First Name: "." "."<script>document.writeln(fname); </script>" ;
  		echo "<br>";
  		echo "Last Name: "." " ."<script>document.writeln(lname); </script>" ;
  		echo "<br>";
  		echo "Full Name: "." ". "<script>document.writeln(funame) </script>";
  		echo "<br>";
  		echo "Email: " . $email; 
  		echo "<br>";
  		echo "Address: ". $address . " ". $state;
  		echo "<br>";
  		echo "Phone Number: ". $phonenumber;
  		echo "<br>";
  		if ($eventname != "unknown") {
			echo "Events at Museum: " . $eventname . "<br>";  
		}
		echo "Number of attendees under five: " . $underfive;
		echo "<br>";
		echo "Number of attendees between five and twelve: " . $bwfivetwelve;
		echo "<br>";
		echo "Number of attendees between thirteen and seventeen: ". $bwthriteenseventeen;
		echo "<br>";
		echo "Number of attendees who are eighteenplus: " . $eighteenplus;
		echo "<br>";
		echo "Total number of attendees: " .$totalnofattendees;
		echo "<br>";
		if (empty($_SESSION['signupnewsletter']))
		{
			echo "Signupnewsletter: No";

		}
		else 
		{
			echo "Signupnewsletter: Yes";
		}

		echo "<br>";

		echo "Other events the respondent would like offered: " .$otherevents ;


  		?>

  		<!-- <p id="demo"> dbfksdk </p> -->

  		
  	

  		


  	    </div>

  	    <div class="c_22">
		<h2>Featured Exhibits</h2>
			<div class="exhibits">
				<a href="exhibits.html">
				<img src="Images/wildside.jpg" alt="desert" width="320px">
				</a>
			</div> 	

			<h3>Baja's Wild Side May 15, 2017 through February 22, 2019 </h3>
			<p>Enjoy the breathtaking photography of Dr. Dan Cartamil, a shark expert and marine biologist at the Scripps Institution of Oceanography, as he explores Baja California's Pacific coast region.</p>

			<div class="exhibits">
				<a href="exhibits.html">
				<img src="Images/fossil.jpg" alt="desert" width="320px"> 
				</a>
			</div> 

			<h3>Fossil Mysteries Always on view</h3>
			<p>From dinosaurs to mastodons, travel through 75 million years and dig into the rich fossil history of Southern California and Baja California. The fossils on display were discovered locally by our paleontology team during construction projects.</p>
		</div>
	</section>	


	




		<footer>
		<div class="fc1">
			<address>
			San Diego State University &copy; <br>
			National History Museum <br>
			San Diego,CA 92182 <br>
			619.594.5200<br>
			<a href="mailto:nhmuseum@sdsu.edu">nhmuseum@sdsu.edu</a>
			</address>
			</div>	

			<div class="fc2">	
				<p>
					Museum Hours <br>
    				Daily 10 AM to 5 PM <br> 
    				Closed when the campus is closed.<br>
    				Hours subject to change. <br>
				</p>

				<p id="modified"> 
				<script type="text/javascript">
					lastModified();
				</script>
				</p>
			</div>

			<div class="fc3">
				<ul class="fbuttons">
				<li><a href="membership.html">Join</a></li>
				<li><a href="donate.html">Donate</a></li>
				<li><a href="membership.html">Volunteer</a></li>
				</ul>
			</div>
			
			
	</footer>
	<!-- Same footer for all pages -->
	

</body>
</html>