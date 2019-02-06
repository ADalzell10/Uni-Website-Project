<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
   
$tcontent = <<<PAGE
	<div class="container">
		<div class="well">
			<h1 align="center"><strong>The Avengers</strong></h1>
		</div>
		<div align="center">
			<img src="img/movies/avengers.jpg" class="img-rounded" alt="The Avengers">
		</div>
		<div class="well">
			<h2><strong>Movie Information and Trailer</strong></h2>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/eOrNdBpGMv8" frameborder="0" allowfullscreen align="right"></iframe>
			<p><Strong>Director:</strong> Joss Whedon </p>
			<p><Strong>Lead Actors:</strong> Robert Downey jr., Chris Evans, Scarlett Johansson, Chris Hemsworth, Mark Ruffalo, Jeremy Renner, Samuel L. Jackson </p>
			<p><Strong>Release Date:</strong> 26 April 2012 (United Kingdom)</p>
			<p><Strong>Genre:</strong> Fantasy, Science Fiction</p>
			<p><Strong>Production Companies:</strong> Marvel Studios, Paramount Pictures</p>
			<p><Strong>Film Synopsis:</strong> When Thor's evil brother, Loki (Tom Hiddleston), gains access to the unlimited power of the energy cube 
			called the Tesseract, Nick Fury (Samuel L. Jackson), director of S.H.I.E.L.D., initiates a superhero recruitment effort to 
			defeat the unprecedented threat to Earth. Joining Fury's "dream team" are Iron Man (Robert Downey Jr.), Captain America 
			(Chris Evans), the Hulk (Mark Ruffalo), Thor (Chris Hemsworth), the Black Widow (Scarlett Johansson) and Hawkeye (Jeremy Renner).</p>
		
		</div>
		<div class="well">
			<h2><strong>Editor's Review</strong></h2>
			<p>A team of fighters brought together by S.H.I.E.L.D to defeat Thor's evil brother, Loki, who gains 
			access to a powerful weapon that could be used to invade earth. From the mixture of their different 
			personalities and views on each situation they face, it makes for an entertaining viewing. From 
			disagreements to moments of teamwork, and added bits of comedy. It's an all-round entertaining 
			movie hosting a team of superheroes heroically fighting to protect others thus resulting in the earth 
			being saved and Loki being imprisoned.</p>
			<h4><span class="label label-success">Rating: 7</span></h4>
		</div>
		<div class="well">
			<h2><strong> Other Review's</strong></h2>
			<h3 class="text-muted">The Guardian</h3>
			<p><i>"It's all great stuff, although the final showdown is drawn out. There is arguably now nothing 
			to stop the mega-villains of the world forming their own Traveling Wilburys' supergroup of evilness; perhaps 
			the point is that it is precisely their innate wickedness and selfishness that prevents them doing this, yet 
			if each could be persuaded that their interests were served by going"...</i><a href="https://www.theguardian.com/film/2012/apr/26/avengers-assemble-review">Read More</a>.</p>
			<h3 class="text-muted">Empire</h3>
			<p><i>"It's a smaller piece of the overall puzzle, but there's more than enough to be worthy of Renner's 
			talents. The Marvel movies' secret weapon, Clark Gregg's Agent Phil Coulson ("Phil? His first name is 'Agent',"
			cracks Stark) steals many of the scenes he's in, whether it's hero-worshipping Steve Rogers or providing his usual
			cool, calm, collected reaction to the sort of peril that would reduce most mortal men to blubbering wrecks. In fact, 
			if anyone"...</i><a href="http://www.empireonline.com/movies/avengers-assemble/review/">Read More</a>.</p>
			
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
$tpagetitle = "The Avengers";
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