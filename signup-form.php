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
			<h2>Signup Form</h2>     
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
				<label class="control-label col-xs-2" for="inputEmail">Email:</label>
				<div class="col-xs-10" >
					<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="">
				</div>
FORMPAGE;
	
	$tcontent .= $emailEmpty ? $temailWithError : $temail;   
	
	$tcontent .= <<<FORMPAGE
		
			</div>
			<div class="form-group">
				<label class="control-label col-xs-2" for="inputPassword">Password:</label>
				<div class="col-xs-10">
					<input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
				</div>
			</div>
			<div class="form-group"> 
				<label class="control-label col-xs-2" for="confirmPassword">Confirm Password:</label>
				<div class="col-xs-10">
					<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
				</div>       
			</div> 
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
				<label class="control-label col-xs-2" for="phoneNumber">Phone:</label>
				<div class="col-xs-10">
					<input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-2" for="postalAddress">Address:</label>	
				<div class="col-xs-10">
					<textarea rows="3" class="form-control" id="postalAddress" name="postalAddress" placeholder="Postal Address"></textarea>
				</div>
			</div>
			<div class="form-group">   
				<label class="control-label col-xs-2" for="PostCode">Postcode:</label>
				<div class="col-xs-10">
					<input type="text" class="form-control" id="PostCode" name="PostCode" placeholder="Postcode">
				</div>
			</div>
			<div class="form-group"> 
				<label class="control-label col-xs-2">Gender:</label> 
				<div class="col-xs-2">          
					<label class="radio-inline">       
						<input type="radio" name="genderRadios" value="male"> Male   
					</label>          
				</div>           
				<div class="col-xs-2">
					<label class="radio-inline">
						<input type="radio" name="genderRadios" value="female"> Female
					</label>
				</div>
			</div> 
			<div class="form-group"> 
				<div class="col-xs-offset-2 col-xs-10"> 
					<label class="checkbox-inline">               
						<input type="checkbox" value="news"> Send me latest news and updates. 
					</label>          
				</div>      
			</div>       
			<div class="form-group">
				<div class="col-xs-offset-2 col-xs-10">
					<label class="checkbox-inline">             
						<input type="checkbox" value="agree">  I agree to the <a href="#">Terms and Conditions</a>.
					</label>
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
	$phoneNumber= test_input($_POST["phoneNumber"]); 
	$postalAddress = test_input($_POST["postalAddress"]);
	$PostCode = test_input($_POST["PostCode"]);
	
	$tcontent = <<<FORMRESPONSE
	<div class="container">
		<section class="panel panel-primary" id="Form Response">
			<div class="jumbotron">
				<h1>Thank You $firstName!</h1>
				<p>Your account is now set up. You will now be able to post Reviews!</p>
				<p>You will receive weekly updates to $email</p>
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
$tpagetitle = "Signup Form";
$tpagelead  = "";
$tpagecontent;

$formData = Array();

if($_SERVER["REQUEST_METHOD"] == "POST") 
{    
	$formData["email"] = test_input($_POST["inputEmail"]);  
	$formData["firstName"] = test_input($_POST["firstName"]);  
	$formData["lastName"] = test_input($_POST["lastName"]); 
	$formData["phoneNumber"] = test_input($_POST["phoneNumber"]);
	$formData["postalAddress"] = test_input($_POST["postalAddress"]); 
	$formData["PostCode"] = test_input($_POST["PostCode"]); 
	
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