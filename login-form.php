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
				<h2>Login</h2>   
				<h4>Don't have an account? Signup <a href="signup-form.php">here</a>.</h4>
					<form class="form-horizontal" method="POST" action="$PostTo">
FORMPAGE;
	
	$temailWithError = <<<FORMPAGE
						<div class="form-group $emailErrorStyle">
							<label class="control-label col-xs-1" for="inputEmail">Email:</label>
							<div class="col-xs-4" >
								<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="">
								<span class="glyphicon $emailIcon form-control-feedback"></span>
								<p id="email_help" class="help-block">$emailError</p>
							</div>
FORMPAGE;
	
	$temail = <<<FORMPAGE
						<div class="form-group">
							<label class="control-label col-xs-1" for="inputEmail">Email:</label>
							<div class="col-xs-4" >
								<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="">
							</div>
FORMPAGE;
	
	$tcontent .= $emailEmpty ? $temailWithError : $temail;   
	
	$tcontent .= <<<FORMPAGE
		
						</div>
						<div class="form-group">
							<label class="control-label col-xs-1" for="inputPassword">Password:</label>
							<div class="col-xs-4">
								<input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
							</div>
						</div>
						<div class="form-group"> 
							<div class="col-xs-offset-1 col-xs-10">
								<input type="submit" class="btn btn-primary" value="Submit">      
						    </div>       
						</div>	
					</form>   
				</div>
FORMPAGE;
	return $tcontent; 
}

function createFormResponsePage() {
	
	$email = test_input($_POST["inputEmail"]); 
	
	$tcontent = <<<FORMRESPONSE
	<div class="container">
		<section class="panel panel-primary" id="Form Response">
			<div class="jumbotron">
				<h1>An unexpected error has occured!</h1>
				<p>Please return to the Homepage.</p>
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
$tpagetitle = "Login";
$tpagelead  = "";
$tpagecontent;

$formData = Array();

if($_SERVER["REQUEST_METHOD"] == "POST") 
{    
	$formData["email"] = test_input($_POST["inputEmail"]);   
	
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