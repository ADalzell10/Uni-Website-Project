<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
   
$tcontent = <<<PAGE
	<div class="container">
		<div class="well">
			<h1 align="center"><strong>Inception</strong></h1>
		</div>
		<div align="center">
			<img src="img/movies/inception.jpg" class="img-rounded" alt="Inception">
		</div>	
		<div class="well">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/YoHD9XEInc0" frameborder="0" allowfullscreen align="right"></iframe>
			<h2><strong>Movie Information and Trailer</strong></h2>
			<p><strong>Director:</strong> Christopher Nolan</p>
			<p><strong>Lead Actors:</strong> Leonardo DiCaprio, Joseph Gordon-Levitt</p>
			<p><strong>Release Date:</strong> 8 July 2010 (United Kingdom)</p>
			<p><strong>Genre:</strong> Science Fiction, Thriller</p>
			<p><strong>Production Companies:</strong> Warner Bros, Legendary Entertainment, Syncopy Inc.</p>
			<p><strong>Film Synopsis:</strong> Dom Cobb (Leonardo DiCaprio) is a thief with the rare ability to enter people's dreams and steal
			their secrets from their subconscious. His skill has made him a hot commodity in the world of corporate espionage but
			has also cost him everything he loves. Cobb gets a chance at redemption when he is offered a seemingly impossible task: 
			Plant an idea in someone's mind. If he succeeds, it will be the perfect crime, but a dangerous enemy anticipates Cobb's every move.</p>
		
		</div>
		<div class="well">
			<h2><strong>Editor Review </strong></h2>
			<p>An interesting idea where the lead character, Dom Cobb, can enter peoples dreams and use it against 
			them to steal their secrets. Unfortunately, it has cost him dearly as the story unfolds and we are 
			shown the effect it has had on his family thus making his ability weaken. He is offered the chance 
			to return to his children through a difficult task. On attempt, there is a twist and they come up 
			against difficult obstacles with could leave them trapped or even killed from inside the mind of the 
			man dreaming. The movie ending with a cliff hanger leaving the viewer wondering if Dom ever escaped 
			the dreamers mind, or if he is trapped forever reliving a memory over and over. </p>
			<h4><span class="label label-success">Rating: 8</span></h4>
		</div>
		<div class="well">
			<h2><strong>Other Review's</strong></h2>
			<h3 class="text-muted">The Guardian</h3>
			<p><i>"There are some dizzying flourishes of FX magic in this movie. Cobb and Ariadne go for a stroll in 
			the streets of Paris, which Nolan folds and tweaks and twists, with the avenues rising and falling like a 
			pop-up book. They encounter a street that rises in front of them like a sheer rockface and, bracing a foot 
			against it first, like Fred Astaire dancing around the walls in Royal Wedding, they proceed"...</i><a href="https://www.theguardian.com/film/2010/jul/15/inception-review">Read More</a>.</p>
			<h3 class="text-muted">Empire</h3>
			<p><i>"But there are bigger things in play here than simply Art, and Nolan isn't given to self-referential 
			indulgence. This is about life and death and what might be beyond and between. It is also about blazing gun 
			battles, zero-gravity fist fights and stars you'd like to sleep with. Fret not, Batfans - Nolan hasn't turned 
			into Andrei Tarkovsky. The muscular action that distinguished"...</i><a href="http://www.empireonline.com/movies/inception/review/">Read More</a>.</p>
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
$tpagetitle = "Inception";
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