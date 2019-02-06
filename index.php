<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
   
$tcontent = <<<PAGE
        <div class="container">
			<div class="jumbotron">
    			<h1><strong>Welcome to Movie Central!</strong></h1>
				<p>On here, you will find infromation such as:</p>
				<ul>
					<li>Information about particular movie's and trailers</li>
					<li>A movie rating table showing the ratings of each movie, from best to worst</li>
					<li>Reviews about movies supplied by the Editor, other websites, and users</li>
				</ul> 
  			</div>
			<div class="well" align="center">
				<h1 align="center"><u><strong>Featured Movies</strong></u></h1>
			</div>
			<div class="row">
  				<div class="col-xs-6 col-md-4">
   					<div class="thumbnail">
						<a href="vendetta.php">
      						<img src="img/thumbnail/vendetta-thumb.jpg" alt="V for Vendetta">
      						<div class="caption">
        						<h3 align="center">V for Vendetta</h3>
								<p>Following world war, London is a police state occupied by a fascist 
								government, and a vigilante known only as V (Hugo Weaving) uses terrorist 
								tactics to fight the oppressors..</p>
      						</div>
						</a>
    				</div>
  				</div>
  				<div class="col-xs-6 col-md-4">
   					<div class="thumbnail">
						<a href="deadpool.php">
      						<img src="img/thumbnail/deadpool-thumb.jpg" alt="Deadpool">
      						<div class="caption">
        						<h3 align="center">Deadpool</h3>
								<p>Wade Wilson (Ryan Reynolds) is a former Special Forces operative 
								who now works as a mercenary. His world comes crashing down when evil 
								scientist Ajax (Ed Skrein) tortures, disfigures and transforms him into 
								Deadpool. The rogue experiment..</p>
      						</div>
						</a>
    				</div>
  				</div>
  				<div class="col-xs-6 col-md-4">
   					<div class="thumbnail">
						<a href="doctorstrange.php">
      						<img src="img/thumbnail/doctorstrange-thumb.jpg" alt="Doctor Strange">
      						<div class="caption">
        						<h3 align="center">Doctor Strange</h3>
								<p>Dr. Stephen Strange's (Benedict Cumberbatch) life changes after a car 
								accident robs him of the use of his hands. When traditional medicine fails 
								him, he looks for healing, and hope, in a mysterious enclave. He quickly 
								learns that the enclave..</p>
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
$tpagetitle = "Homepage";
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