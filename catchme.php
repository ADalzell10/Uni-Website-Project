<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
   
$tcontent = <<<PAGE
	<div class="container">
		<div class="well">
			<h1 align="center"><strong>Catch Me If You Can</strong></h1>
		</div>
		<div align="center">
			<img src="img/movies/catch-me-if-you-can.jpg" class="img-rounded" alt="Catch Me If You Can">
		</div>	
		<div class="well">
			<h2><strong>Movie Information and Trailer</strong></h2>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/71rDQ7z4eFg" frameborder="0" allowfullscreen align="right"></iframe>
			<p><strong>Director:</strong> Steven Spielberg</p>
			<p><strong>Lead Actors:</strong> Leonardo DiCaprio, Tom Hanks</p>
			<p><strong>Release Date:</strong> 27 January 2003 (United Kingdom)</p>
			<p><strong>Genre:</strong> Drama, Biography</p>
			<p><strong>Production Companies:</strong> Dreamworks, Kemp Company, Amblin Entertainment, Splendid Pictures</p>
			<p><strong>Film Synopsis:</strong> Frank Abagnale, Jr. (Leonardo DiCaprio) worked as a doctor, a lawyer, and as a co-pilot for a
			major airline -- all before his 18th birthday. A master of deception, he was also a brilliant forger, whose skill 
			gave him his first real claim to fame: At the age of 17, Frank Abagnale, Jr. became the most successful bank robber 
			in the history of the U.S. FBI Agent Carl Hanratty (Tom Hanks) makes it his prime mission to capture Frank and bring 
			him to justice, but Frank is always one step ahead of him.</p>
		</div>
		<div class="well">
			<h2><strong>Editor's Review </strong></h2>
			<p>A true story based on a man named Frank Abagnail who at the age of 17, was a master forger and a notorious 
			bank robber because of it. He led people to believe he was a pilot, lawyer, and a doctor. Travelling around 
			the world for free due his master forging abilities of bank cheques that were so good that professionals 
			couldn't tell the difference. He is always one step ahead of the FBI agent Carl Hanratty due to how cunning 
			he is. Because of this you are always kept interested as to what Frank might do next in his attempt to evade 
			the police. </p>
			<h4><span class="label label-success">Rating: 7</span></h4>
		</div>
		<div class="well">
			<h2><strong>Other Review's</strong></h2>
			<h3 class="text-muted">The Guardian</h3>
			<p><i>"This story of a real-life Walter Mitty, would not be remotely credible were it not based on fact. But 
			this doesn't matter as Leonardo DiCaprio's ambitious teenager masquerades as pilot, doctor and lawyer while 
			mainlining in embezzlement.	Since it's Spielberg, he also has two father-son type relationships, with real dad 
			Christopher Walken - now there's a man who could believably charm or smarm his way into "...</i><a href="https://www.theguardian.com/culture/2003/jul/04/artsfeatures.dvdreviews1">Read More</a>.</p>
			<h3 class="text-muted">Empire</h3>
			<p><i>"Considerably darker than anticipated - abortion and infidelity simmer under a deceptively glossy sheen - 
			the film requires the highest calibre of acting talent, and in his casting Spielberg delivers an unprecedented 
			ensemble. For DiCaprio fans, this is the best reason to go to the cinema since he went down on the Titanic - he 
			is back at his blistering, finest-of-his-generation"...</i><a href="http://www.empireonline.com/movies/catch-can/review/">Read More</a>.</p>
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
$tpagetitle = "Catch Me If You Can";
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