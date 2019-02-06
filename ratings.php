<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

//Ratings are based on editor reviews and I couldn't get user reviews/ratings working

function createPage()
{
   
$tcontent = <<<PAGE
	<div class="container">
		<div class="row">
			<div class="well well-lg">
				<h1><strong>Movie Ratings</strong></h1>
		
		
				<p><u>List of Ratings for each Movie, from Highest Rating to Lowest</u></p>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Movie</th>
							<th>Genre</th>
							<th>Rating</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><a href="deadpool.php">Deadpool</a></td>
							<td>Science Fiction/Action</td>
							<td>9</td>
						</tr>
						<tr>
							<td><a href="doctorstrange.php">Doctor Strange</a></td>
							<td>Fantasy/Science Fiction</td>
							<td>9</td>
						</tr>
						<tr>
							<td><a href="interstellar.php">Interstellar</a></td>
							<td>Mystery/Science Fiction</td>
							<td>9</td>
						</tr>
						<tr>
							<td><a href="shutisland.php">Shutter Island</a></td>
							<td>Drama/Thriller</td>
							<td>8</td>
						</tr>
						<tr>
							<td><a href="vendetta.php">V for Vendetta</a></td>
							<td>Drama/Thriller</td>
							<td>8</td>
						</tr>
						<tr>
							<td><a href="inception.php">Inception</a></td>
							<td>Science Fiction/Thriller</td>
							<td>8</td>
						</tr>
						<tr>
							<td><a href="hacksawridge.php">Hacksaw Ridge</a></td>
							<td>Drama/History</td>
							<td>8</td>
						</tr>
						<tr>
							<td><a href="fantasticbeasts.php">Fantastic Beasts and Where to Find Them</a></td>
							<td>Fantasy/Action</td>
							<td>7</td>
						</tr>
						<tr>
							<td><a href="catchme.php">Catch Me If You Can</a></td>
							<td>Drama/Biography</td>
							<td>7</td>
						</tr>
						<tr>
							<td><a href="avengers.php">The Avengers</a></td>
							<td>Fantasy/Science Fiction</td>
							<td>7</td>
						</tr>	
					</tbody>
				</table>
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
$tpagetitle = "Ratings";
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