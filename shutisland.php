<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
   
$tcontent = <<<PAGE
	<div class="container">
		<div class="well">
			<h1 align="center"><strong>Shutter Island</strong></h1>
		</div>
		<div align="center">
			<img src="img/movies/shutter-island.jpg" class="img-rounded" alt="Shutter Island">
		</div>	
		<div class="well">
			<h2><strong>Movie Information and Trailer</strong></h2>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/5iaYLCiq5RM" frameborder="0" allowfullscreen align="right"></iframe>
			<p><strong>Director:</strong> Martin Scorsese</p>
			<p><strong>Lead Actors:</strong> Leonardo DiCaprio, Mark Ruffalo</p>
			<p><strong>Release Date:</strong> 12 March 2010 (United Kingdom)</p>
			<p><strong>Genre:</strong> Drama, Thriller</p>
			<p><strong>Production Companies:</strong> Paramount Pictures, Dreamworks, Appian Way Productions, Phoenix Pictures, Spyglass Entertainment, The Montecito Picture Company</p>
			<p><strong>Film Synopsis:</strong> The implausible escape of a brilliant murderess brings U.S. Marshal Teddy Daniels (Leonardo DiCaprio) and his 
			new partner (Mark Ruffalo) to Ashecliffe Hospital, a fortress-like insane asylum located on a remote, windswept island. The woman
			appears to have vanished from a locked room, and there are hints of terrible deeds committed within the hospital walls. As the 
			investigation deepens, Teddy realizes he will have to confront his own dark fears if he hopes to make it off the island alive.</p>
		</div>
		<div class="well">
			<h2><strong>Editor Review </strong></h2>
			<p>Starts off with making you believe in the fact that the two U.S. Marshalls are on the island to
			investigate its mysterious happenings. Dramatic as it becomes tenser as their investigation widens
			and more things become apparent to them. Their discoveries lead to different parts of the island 
			to which the plan of the staff working on the island is eventually revealed. The revelation 
			completely twists the plot making the viewer look at it from another perspective, thus making 
			the movie even more interesting than the events that lead to the ending.</p>
			<h4><span class="label label-success">Rating: 8</span></h4>
		</div>
		<div class="well">
			<h2><strong>Other Review's</strong> </h2>
			<h3 class="text-muted">The Guardian</h3>
			<p><i>"Kingsley, DiCaprio, Von Sydow and Ruffalo give the picture solidity and weight, and Scorsese 
			provides Hitchcockian and Kubrickian perspectives on that weird, secluded place which is closed in 
			and yet agoraphobically exposed. It is perfectly possible to enjoy Shutter Island as a pulpy melodrama, 
			yet I couldn't help thinking that an actual pulpy melodrama would be leaner in terms of plot; it would 
			move more swiftly and"...</i><a href="https://www.theguardian.com/film/2010/mar/11/shutter-island-review">Read More</a>.</p>
			<h3 class="text-muted">Empire</h3>
			<p><i>"Though the US Marshals played by Leonardo DiCaprio (now as central to Scorsese's filmic universe as De 
			Niro or Keitel) and Mark Ruffalo sport film noir hats and tough guy attitudes, they are forced to surrender 
			their guns before they are allowed to enter an insane asylum which is also a haunted castle - passing out of 
			a hardboiled mystery into a full-on gothic melodrama which includes a creepy turn from genre fixture Max von 
			Sydow as"...</i><a href="http://www.empireonline.com/movies/shutter-island/review/">Read More</a>.</p>
		</div>
		<div class="well">
			<h2><strong>User Review's</strong></h2>
			<h4 align="center"><span class="label label-danger">There are currently no reviews for this Movie</span></h4>
			<h4 align="center">To submit a review, click <a href="reviewsubmit.php">here</a>.</h4>
		</div>
	</div>
        
PAGE;
return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

//Build up our Dynamic Content Items. 
$tpagetitle = "Shutter Island";
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