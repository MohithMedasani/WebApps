<!-- Medasani Venkat Mohith
Redid : 822088300
Instructor Cyndi Chie
Proj4 event_registration.php-->


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

	<!-- Same header for all pages -->

	<section class="fcontainer">
		<div class="c_21">

	<?php  

	$firstname = $lastname = $email = $address = $state = $phonenumber = "";

	$eventname = $totalnofattendees = $underfive = $bwfivetwelve = "";

	$bwthriteenseventeen = $eighteenplus = $signupnewsletter = "";

	$otherevents = "";



	$firstnameErr = $lastnameErr = $emailErr = $eventErr= $addressErr = "";
	$totalnofattendeesErr = $underfiveErr = $bwfivetwelveErr = $bwthriteenseventeenErr = "";
	$phonenumberErr=$eighteenplusErr ="";


	function test_input($data)
	 	{
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

    $valid = true;


            // Validating Firstname if empty to pring Err message and it should have alphabets in Upper and lower case,hyphen, fullstops forward and back slash and commas and spaces

    		if (empty(filter_input(INPUT_POST, firstname))) 
    		{
    			$valid = false;
			    $firstnameErr = "First name is required";
            }

            else
            {
               $_SESSION['firstname'] = test_input(filter_input(INPUT_POST, "firstname"));
			   $firstname = test_input(filter_input(INPUT_POST, "firstname"));

			   if (!preg_match('/[A-Za-z\-\\,.]+/',$firstname)) {
			   	   $valid = false;
                   $firstnameErr = "Alphabets in Upper and lower case,hyphen, fullstops forward and back slash and commas and spaces are allowed"; 
                }
            }

            // Validating Lastname if empty to pring Err message and it should have alphabets in Upper and lower case,hyphen, fullstops forward and back slash and commas and spaces

             if (empty(filter_input(INPUT_POST, lastname))) 
    		{
    			$valid = false;
			    $lastnameErr = "Last name is required";
            }

            else 
            {
               $_SESSION['lastname'] = test_input(filter_input(INPUT_POST, "lastname"));
			   $lastname = test_input(filter_input(INPUT_POST, "lastname"));
			    if (!preg_match('/[A-Za-z\-\\,.]+/',$lastname)) {
			   	   $valid = false;
                   $lastnameErr = "Alphabets in Upper and lower case,hyphen, fullstops forward and back slash and commas and spaces are allowed"; 
                }
            }

            // Validating email if empty to pring Err message and checking if it's vallid email format or not

            if (empty(filter_input(INPUT_POST, "email")))
            {
               $valid = false;
			   $emailErr = "Email is required";
            }
            else 
            {
               $_SESSION['email'] = test_input(filter_input(INPUT_POST, "email"));
			   $email = test_input(filter_input(INPUT_POST, "email"));


			if (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) 
			{
				$valid = false;
				$emailErr = "Invalid email format, please enter valid email"; 
			}
			}


			// Validating email if empty it ignores and moves on and checks if phone number have only numbers from one to 10

			if (empty(filter_input(INPUT_POST, "phonenumber"))) {
			   $_SESSION['phonenumber'] = "";
				
			}


			 else 
			{
			 	$_SESSION['phonenumber'] = test_input(filter_input(INPUT_POST, "phonenumber"));
			 	$phonenumber = test_input(filter_input(INPUT_POST, "phonenumber"));
			 	if(!preg_match('/^[0-9]{10}+$/', $phonenumber) ) {
		  	 	    $valid = false;
			 		$phonenumberErr="Only numbers are allowed and should have only ten numbers";
				}

			}


			// Validating address if empty it ignores and moves on and checks if address have alphabets in Upper and lower case, numbers, hyphen, fullstops forward and back slash and commas and spaces .

			if (empty(filter_input(INPUT_POST, "address"))) {
               $_SESSION['address'] = "";
			} 
			else 
			{
			$_SESSION['address'] = test_input(filter_input(INPUT_POST, "address"));
			$address = test_input(filter_input(INPUT_POST, "address"));
				if (!preg_match('/[A-Za-z0-9\-\\,.]+/', $address)){
				$valid = false;
			   $addressErr = "Alphabets in Upper and lower case, numbers, hyphen, fullstops forward and back slash and commas and spaces are allowed";
					}
			}

			if (empty(filter_input(INPUT_POST, "state"))) {
               $_SESSION['state'] = "";
			} else {
			$_SESSION['state'] = test_input(filter_input(INPUT_POST, "state"));
			$state = test_input(filter_input(INPUT_POST, "state"));
			}



			// Validating eventname if empty prints Error Message.

			if (filter_input(INPUT_POST, eventname) == "")
			{
				$valid = false;
				$eventErr = "Event name is required";
			}

			else 
			{
			   $_SESSION['eventname'] = test_input(filter_input(INPUT_POST, "eventname"));
			   $eventname = test_input(filter_input(INPUT_POST, "eventname"));

			}

			// Validating attendees if empty prints Error Message if it's 0 does'nt Print Error Message

			if (filter_input(INPUT_POST, underfive) == "")
		 	{
			   $valid = false;
			   $underfiveErr = "Number of attendees under five is required";
			}

			

			else 
			{
			   $_SESSION['underfive'] = test_input(filter_input(INPUT_POST, "underfive"));
			   $underfive = test_input(filter_input(INPUT_POST, "underfive"));

			}


			if (filter_input(INPUT_POST, bwfivetwelve) == "") 
			{
				$valid = false;
				$bwfivetwelveErr = "Number of attendees between five and twelve are required";

			}

			else 
			{
				$_SESSION['bwfivetwelve'] = test_input(filter_input(INPUT_POST, "bwfivetwelve"));
				$bwfivetwelve=test_input(filter_input(INPUT_POST, "bwfivetwelve"));
			}

			if (filter_input(INPUT_POST, bwthriteenseventeen) == "") 
			{
				$valid = false;
				$bwthriteenseventeenErr = "Number of attendees who are between thirteen and seventeen are required";

			}

			else 
			{
				$_SESSION['bwthriteenseventeen'] = test_input(filter_input(INPUT_POST, "bwthriteenseventeen"));
				$bwthriteenseventeen=test_input(filter_input(INPUT_POST, "bwthriteenseventeen"));
			}

			


			if (filter_input(INPUT_POST, eighteenplus) == "") 
			{
				$valid = false;
				$eighteenplusErr = "Number of attendees who are eighteenplus is required";

			}

			else 
			{
				$_SESSION['eighteenplus'] = test_input(filter_input(INPUT_POST, "eighteenplus"));
				$eighteenplus=test_input(filter_input(INPUT_POST, "eighteenplus"));
			}



			if (filter_input(INPUT_POST, "totalnofattendees") == "") 
			{
			   $valid = false;
			   $totalnofattendeesErr = "Total number of attendees is required";
			}

			// Checks if sum of the attendees matches
		
			else 
			{
			   $_SESSION['totalnofattendees'] = test_input(filter_input(INPUT_POST, "totalnofattendees"));
			   $totalnofattendees = test_input(filter_input(INPUT_POST, "totalnofattendees"));

			   if ($totalnofattendees != ($underfive + $bwfivetwelve + $bwthriteenseventeen + $eighteenplus))
			   {
			   	$valid = false;
			   	$totalnofattendeesErr="Sum does not match";
			   } 


			}


			// Validating for signup Newsletter

			if (empty(filter_input(INPUT_POST, "signupnewsletter"))) {
               $_SESSION['signupnewsletter'] = "";
            }else {
			$_SESSION['signupnewsletter'] = test_input(filter_input(INPUT_POST, "signupnewsletter"));
			}

			if (empty(filter_input(INPUT_POST, "otherevents"))) {
               $_SESSION['otherevents'] = "";
            }else {
			$_SESSION['otherevents'] = test_input(filter_input(INPUT_POST, "otherevents"));
			}





		if($valid)
		{
				header("location:eventprocessing.php");
        		exit();
		}
    }        
?>

	<h2>Sign up for the SDSU NHM Events</h2>

<h3>Please fill out this form and click Submit when finished</h3>
<p><span class="required">*</span> Required fields</p>

 <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <fieldset>

  <legend>Personal information:</legend>

  <label for="firstname">First name<span class="required">*</span>:</label><br />
  <input type="text" name="firstname" id="firstname" size="40"  maxlength="60" value="<?php echo $firstname; ?>" ><span class = "error"><?php echo " " . $firstnameErr;?></span>
	<br /><br />

    <label for="lastname">Last name<span class="required">*</span>:</label><br />
    <input type="text" name="lastname" id="lastname" size="40"  maxlength="60" value="<?php echo $lastname; ?>" ><span class = "error"><?php echo " " . $lastnameErr;?></span>
	<br /><br />

	<label for="email">Email<span class="required">*</span>:</label><br />
    <input type="email" name="email" id="email" size="80"  maxlength="255" value="<?php echo $email; ?>" ><span class = "error"><?php echo " " . $emailErr;?></span>
	<br /><br />

	<label for="address">Address :</label>
	<input type="text" name="address" id="address" value="<?php echo $address; ?>"><span class="error"><?php echo " " . $addressErr;?></span>
	<label for="State">States :</label>
	<select name="state" id="state" value ="<?php echo $state; ?>" >
	<option selected></option>
	<option value="AL">AL</option>
	<option value="AK">AK</option>
	<option value="AR">AR</option>	
	<option value="AZ">AZ</option>
	<option value="CA">CA</option>
	<option value="CO">CO</option>
	<option value="CT">CT</option>
	<option value="DC">DC</option>
	<option value="DE">DE</option>
	<option value="FL">FL</option>
	<option value="GA">GA</option>
	<option value="HI">HI</option>
	<option value="IA">IA</option>	
	<option value="ID">ID</option>
	<option value="IL">IL</option>
	<option value="IN">IN</option>
	<option value="KS">KS</option>
	<option value="KY">KY</option>
	<option value="LA">LA</option>
	<option value="MA">MA</option>
	<option value="MD">MD</option>
	<option value="ME">ME</option>
	<option value="MI">MI</option>
	<option value="MN">MN</option>
	<option value="MO">MO</option>	
	<option value="MS">MS</option>
	<option value="MT">MT</option>
	<option value="NC">NC</option>	
	<option value="NE">NE</option>
	<option value="NH">NH</option>
	<option value="NJ">NJ</option>
	<option value="NM">NM</option>			
	<option value="NV">NV</option>
	<option value="NY">NY</option>
	<option value="ND">ND</option>
	<option value="OH">OH</option>
	<option value="OK">OK</option>
	<option value="OR">OR</option>
	<option value="PA">PA</option>
	<option value="RI">RI</option>
	<option value="SC">SC</option>
	<option value="SD">SD</option>
	<option value="TN">TN</option>
	<option value="TX">TX</option>
	<option value="UT">UT</option>
	<option value="VT">VT</option>
	<option value="VA">VA</option>
	<option value="WA">WA</option>
	<option value="WI">WI</option>	
	<option value="WV">WV</option>
	<option value="WY">WY</option>

	</select>
	<br /><br />


	<label for="phonenumber">Phone Number :</label><br />
	<input type="text" name="phonenumber" id="phonenumber" value="<?php echo $phonenumber; ?>"><span class="error"><?php echo" ". $phonenumberErr?></span>
	<br /><br />


</fieldset>

<fieldset>

	<label for="eventname">Event Name <span class="required">*</span>:</label><br />
	<select name="eventname" id="eventname" value="<?php echo $eventname; ?>" >
	<option selected></option>
	<option value="Hidden Gems">Hidden Gems</option>
	<option value="Cool Stufffrom Storage">Cool Stuff from Storage</option>
	<option value="WildSide">Wild Side</option>
	<option value="The Cerutti Mastodon Discovery">The Cerutti Mastodon Discovery</option>
	<option value="Coastto Cactus in SouthernCalifornia">Coast to Cactus in Southern California</option>
	<option value="Fossil Mysteries">Fossil Mysteries</option>
	<option value="Water: ACaliforniaStory">Water: A California Story</option>
	<option value="Megalodon">Megalodon</option>
	</select>
	<span class = "error"><?php echo " " .$eventErr;?></span>
	<br /><br />


	<label for="underfive">Number of attendees under 5 years old  <span class="required">*</span>:</label><br />
    <input type="number" name="underfive" id="underfive" value="<?php echo $underfive; ?>" min="0" onchange="totalattendees()" ><span class = "error"><?php echo " ".$underfiveErr; ?> </span>
	<br /><br />

	<label for="bwfivetwelve">Number of attendees between 5 and 12 years old <span class="required">*</span>:</label><br />
    <input type="number" name="bwfivetwelve" id="bwfivetwelve"  value="<?php echo $bwfivetwelve; ?>" min="0" onchange="totalattendees()" ><span class = "error"><?php echo " ".$bwfivetwelveErr; ?> </span>
	<br /><br />

	<label for="bwthriteenseventeen">Number of attendees between 13 and 17 years old <span class="required">*</span>:</label><br />
    <input type="number" name="bwthriteenseventeen" id="bwthriteenseventeen" value="<?php echo $bwthriteenseventeen; ?>" min="0" onchange="totalattendees()"><span class = "error"><?php echo " ".$bwthriteenseventeenErr; ?> </span>
	<br /><br />


	

	<label for="eighteenplus">Number of attendees 18+ years old</label> <span class="required">*</span>:</label><br />
	<input type="number" name="eighteenplus" id="eighteenplus" value="<?php echo $eighteenplus; ?>" min="0" onchange="totalattendees()"><span class="error"><?php echo " ".$eighteenplusErr; ?> </span>
	<br /><br />


	<label for="totalnofattendees">Total number of attendees <span class="required">*</span>:</label><br />
    <input type="number" name="totalnofattendees" id="totalnofattendees" readonly ><span class = "error"><?php echo " ".$totalnofattendeesErr; ?> </span>
	<br /><br />


	<input type="checkbox" name="signupnewsletter" id="signupnewsletter" value="signupnewsletter" checked> <label for="signupnewsletter">Signup for newsletter </label><br /><br />


	<label for="otherevents">Other events the respondent would like offered</label><br />
    <textarea name="otherevents" id="otherevents" rows="5" cols="60"><?php echo $otherevents; ?></textarea>



</fieldset>
  <input type="submit" value="Submit">
  <input type="reset"><br /><br />
</form> 

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