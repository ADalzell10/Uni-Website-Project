<?php 

function checkRequiredResponsesNotEmpty($formData) 
{  
	if (empty($formData["email"])){   
		return false;  
	}  
	
	return true; 
}

function isValidName($name) 
{  
	//pass variable through test input before this function 
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {   
		return false;  
	}    
	
	return true; 
}

function isValidEmail($email) 
{  
	//pass variable through test input before this function  
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {   
		return false;  
	}    
	
	return true; 
}

function isValidURL($url)
{  
	//pass variable through test input before this function  
	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z09+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) { 
		return false;  
	} 
	
	return true; 
}

function test_input($data) {
	$data = trim($data); 
	$data = stripslashes($data); 
	$data = htmlspecialchars($data);  
	return $data; 
}

//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createFormPage() {  
	
	$emailError = ""; 
	$emailErrorStyle = ""; 
	$emailEmpty = false; 
	$emailIcon = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST")  
	{   
		//check email is valid   
		if(empty($formData["email"]))   
		{    
			$emailError = "Email Required" ; 
			$emailErrorStyle = "has-warning has-feedback";
			$emailIcon = "glyphicon-warning-sign";  
			$emailEmpty = true;   
		}  
		else if(!isValidEmail($formData["email"]))   
		{   
			$emailError = "Invalid Email" ;   
			$emailErrorStyle = "has-error has-feedback";
			$emailIcon = "glyphicon-remove"; 
			$emailEmpty = true;   
		}
	}
	
	$PostTo = htmlspecialchars($_SERVER['PHP_SELF']);
	
	$tcontent = <<<FORMPAGE
		<div class="container">     
			<div class="well">
				<h1 align="center">Submit a Review</h1>
			</div>
			<form class="form-horizontal" method="POST" action="$PostTo">
FORMPAGE;
	
	$temailWithError = <<<FORMPAGE
				<div class="form-group $emailErrorStyle">
					<label class="control-label col-xs-2" for="inputEmail">Email:</label>
					<div class="col-xs-10" >
						<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="">
							<span class="glyphicon $emailIcon form-control-feedback"></span>
							<p id="email_help" class="help-block">$emailError</p>
					</div>
FORMPAGE;
	
	$temail = <<<FORMPAGE
				<div class="form-group">
					<label for="inputEmail" class="control-label col-xs-2">Email:</label>
					<div class="col-xs-10"> 
						<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value=""> 
					</div>       
				</div> 
FORMPAGE;
	
	$tcontent .= $emailEmpty ? $temailWithError : $temail;   
	
	$tcontent .= <<<FORMPAGE
		

 				<div class="form-group"> 
					<label class="control-label col-xs-2" for="firstName">First Name:</label>
					<div class="col-xs-10">
						<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
					</div>
				</div> 
				<div class="form-group"> 
					<label class="control-label col-xs-2" for="lastName">Last Name:</label>
					<div class="col-xs-10"> 
						<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
					</div>
				</div> 
				<div class="form-group">   
					<label class="control-label col-xs-2">Movie:</label>
					<div class="col-xs-4">
						<select class="form-control">
							<option>Shutter Island</option>
							<option>Deadpool</option>
							<option>The Avengers</option>
							<option>V for Vendetta</option>
							<option>Catch Me If You Can</option>
							<option>Inception</option>
							<option>Interstellar</option>
							<option>Hacksaw Ridge</option>
							<option>Doctor Strange</option>
							<option>Fantastic Beasts and Where to Find Them</option>
						</select> 
					</div>
				</div>
				<div class="form-group"> 
					<label class="control-label col-xs-2" for="reviewTitle">Title:</label>
					<div class="col-xs-10"> 
						<input type="text" class="form-control" id="reviewTitle" name="reviewTitle" placeholder="Title">
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-xs-2" for="userReview">Review:</label>	
					<div class="col-xs-10">
						<textarea rows="8" class="form-control" id="userReview" name="userReview" placeholder="Review"></textarea>
					</div>
				</div>   
				<div class="form-group">   
					<label class="control-label col-xs-2">Rating:</label>
					<div class="col-xs-2">
						<select class="form-control">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
						</select> 
					</div>
				</div>
				<div class="form-group"> 
					<div class="col-xs-offset-2 col-xs-10">
						<input type="submit" class="btn btn-primary" value="Submit">      
						<input type="reset" class="btn btn-default" value="Reset">     
					</div>       
				</div>
			</form>  
		</div> 
FORMPAGE;
	return $tcontent; 
}

function createFormResponsePage() {
	
	$email = test_input($_POST["inputEmail"]); 
	$firstName = test_input($_POST["firstName"]);
	$lastName = test_input($_POST["lastName"]);  
	$reviewTitle = test_input($_POST["reviewTitle"]);
	$postalAddress = test_input($_POST["userReview"]);
	
	$tcontent = <<<FORMRESPONSE
	<div class="container">
		<section class="panel panel-primary" id="Form Response">
			<div class="jumbotron">
				<h1>Thank You $firstName</h1>
				<h3><span class="label label-success">Your review has been submitted.</span></h3>
				
			</div>
		</section>
	</div>
FORMRESPONSE;
	
	return $tcontent;

}




//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

//Build up our Dynamic Content Items.
$tpagetitle = "Review Submission";
$tpagelead  = "";
$tpagecontent;

$formData = Array();

if($_SERVER["REQUEST_METHOD"] == "POST") 
{    
	$formData["email"] = test_input($_POST["inputEmail"]);  
	$formData["firstName"] = test_input($_POST["firstName"]);  
	$formData["lastName"] = test_input($_POST["lastName"]); 
	$formData["reviewTitle"] = test_input($_POST["reviewTitle"]);
	$formData["userReview"] = test_input($_POST["userReview"]);  
	
	if(checkRequiredResponsesNotEmpty($formData) == true){   
		$tpagecontent = createFormResponsePage($formData);  
	}
	else 
	{   
		$tpagecontent = createFormPage($formData);  
	}  

} 
else 
{  
	$tpagecontent = createFormPage($formData); 
}
	
$tpagefooter = "";

//----BUILD OUR HTML PAGE----------------------------
//Create an instance of our Page class
$tpage = new MasterPage($tpagetitle);
//Set the Three Dynamic Areas (1 and 3 have defaults)
if(!empty($tpagelead))
	$tpage->setDynamic1($tpagelead);
	$tpage->setDynamic2($tpagecontent);
if(!empty($tpagefooter))
	$tpage->setDynamic3($tpagefooter);
//Return the Dynamic Page to the user.
$tpage->renderPage();
?>