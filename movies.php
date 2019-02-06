<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
   
$tcontent = <<<PAGE
	<div class="container">
		<div class="well">
			<h1 align="center"><strong>Movies</strong></h1>
		</div>
		<div class="row">
  			<div class="col-xs-6 col-md-3">
   				<div class="thumbnail">
					<a href="shutisland.php">
      					<img src="img/thumbnail/shutisland-thumb.jpg" alt="Shutter Island">
      					<div class="caption">
        					<h3 align="center">Shutter Island</h3>
      					</div>
					</a>
    			</div>
  			</div>
			<div class="col-xs-6 col-md-3">
   				<div class="thumbnail">
					<a href="deadpool.php">
      				<img src="img/thumbnail/deadpool-thumb.jpg" alt="Deadpool">
      					<div class="caption">
        					<h3 align="center">Deadpool</h3>
      					</div>
					</a>
    			</div>
  			</div>
  			<div class="col-xs-6 col-md-3">
   				<div class="thumbnail">
					<a href="avengers.php">
      				<img src="img/thumbnail/avengers-thumb.jpg" alt="The Avengers">
      					<div class="caption">
        					<h3 align="center">The Avengers</h3>
      					</div>
					</a>
    			</div>
  			</div>
			<div class="col-xs-6 col-md-3">
   				<div class="thumbnail">
					<a href="vendetta.php">
      				<img src="img/thumbnail/vendetta-thumb.jpg" alt="V for Vendetta">
      					<div class="caption">
        					<h3 align="center">V for Vendetta</h3>
      					</div>
					</a>
    			</div>
  			</div>
			<div class="col-xs-6 col-md-3">
   				<div class="thumbnail">
					<a href="catchme.php">
      				<img src="img/thumbnail/catchme-thumb.jpg" alt="Catch Me If You Can">
      					<div class="caption">
        					<h3 align="center">Catch Me If You Can</h3>
      					</div>
					</a>
    			</div>
  			</div>
			<div class="col-xs-6 col-md-3">
   				<div class="thumbnail">
					<a href="inception.php">
      				<img src="img/thumbnail/inception-thumb.jpg" alt="Inception">
      					<div class="caption">
        					<h3 align="center">Inception</h3>
      					</div>
					</a>
    			</div>
  			</div>
			<div class="col-xs-6 col-md-3">
   				<div class="thumbnail">
					<a href="interstellar.php">
      				<img src="img/thumbnail/interstellar-thumb.jpg" alt="Interstellar">
      					<div class="caption">
        					<h3 align="center">Interstellar</h3>
      					</div>
					</a>
    			</div>
  			</div>
			<div class="col-xs-6 col-md-3">
   				<div class="thumbnail">
					<a href="hacksawridge.php">
      				<img src="img/thumbnail/hacksaw-thumb.jpg" alt="Hacksaw Ridge">
      					<div class="caption">
        					<h3 align="center">Hacksaw Ridge</h3>
      					</div>
					</a>
    			</div>
  			</div>
			<div class="col-xs-6 col-md-3">
   				<div class="thumbnail">
					<a href="doctorstrange.php">
      				<img src="img/thumbnail/doctorstrange-thumb.jpg" alt="Doctor Strange">
      					<div class="caption">
        					<h3 align="center">Doctor Strange</h3>
      					</div>
					</a>
    			</div>
  			</div>
			<div class="col-xs-6 col-md-3">
   				<div class="thumbnail">
					<a href="fantasticbeasts.php">
      				<img src="img/thumbnail/fantasticbeasts-thumb.jpg" alt="Fantastic Beasts and Where to Find Them">
      					<div class="caption">
        					<h3 align="center">Fantastic Beasts and Where to Find Them</h3>
      					</div>
					</a>
    			</div>
  			</div>
		</div>
	</div>
        
PAGE;
return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

//Build up our Dynamic Content Items. 
$tpagetitle = "Movies";
$tpagelead  = "";
$tpagecontent = createPage();
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