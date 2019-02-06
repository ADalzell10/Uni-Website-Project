<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
   
$tcontent = <<<PAGE
	<div class="container">
		<div class="well">
			<h1 align="center"><strong>Interstellar</strong></h1>
		</div>
		<div align="center">
			<img src="img/movies/Interstellar.jpg" class="img-rounded" alt="Interstellar">
		</div>
		<div class="well">
			<h2><strong>Movie Information and Trailer</strong></h2>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/zSWdZVtXT7E" frameborder="0" allowfullscreen align="right"></iframe>
			<p><strong>Director:</strong> Christopher Nolan</p>
			<p><strong>Lead Actors:</strong> Matthew McConaughey, Anne Hathaway</p>
			<p><strong>Release Date:</strong> 7 November 2014 (United Kingdom)</p>
			<p><strong>Genre:</strong> Mystery, Science Fiction</p>
			<p><strong>Production Companies:</strong> Warner Bros, Legendary Entertainment, Syncopy Inc., Lynda Obst Productions</p>
			<p><strong>Film Synopsis:</strong> In Earth's future, a global crop blight and second Dust Bowl are slowly rendering the planet 
			uninhabitable. Professor Brand (Michael Caine), a brilliant NASA physicist, is working on plans to save mankind 
			by transporting Earth's population to a new home via a wormhole. But first, Brand must send former NASA pilot Cooper
			(Matthew McConaughey) and a team of researchers through the wormhole and across the galaxy to find out which of three
			planets could be mankind's new home.</p>
		
		</div>
		<div class="well">
			<h2><strong>Editor Review </strong></h2>
			<p>The earth is dying and food resources are low due to increasing amounts of dust that is spreading. 
			A former pilot and engineer named Cooper is forced to become a farmer for what food is left. His 
			only choice is to re-join a crew from NASA and help them find a new planet for mankind. Dramatic 
			events unfold on earth with Cooper's daughter and in Coopers own ventures in space, lives are lost 
			as they continue in hope. In the Cooper makes a huge sacrifice to save the life of another crew member 
			that results in a spectacular twist showing the real reason as to why Cooper was lead back to NASA in 
			the first place. A great movie keeping you pinned the whole way through.</p>
			<h4><span class="label label-success">Rating: 9</span></h4>
		</div>
		<div class="well">
			<h2><strong>Other Review's</strong></h2>
			<h3 class="text-muted">The Guardian</h3>
			<p><i>"While it's temptingly easy to cite 2001 (anything invoking a dimensional "star gate" triggers 
			rarely positive Kubrick comparisons), the movie that hangs over Interstellar like the dust cloud atmospherically 
			engulfing its earthbound scenes is Contact, with which it shares much more than just leading man McConaughey. 
			Adapted from a novel by Carl Sagan (with signature"...</i><a href="https://www.theguardian.com/film/2014/nov/09/interstellar-review-sci-fi-spectacle-delivers">Read More</a>.</p>
			<h3 class="text-muted">Empire</h3>
			<p><i>"The planets themselves are no less spectacular. Let The Right One In cinematographer Hoyte Van Hoytema 
			(replacing Nolan regular Wally Pfister) captures the bleak expanse of southern Iceland as both a watery hell 
			with thousand-foot waves and an icy expanse where even the clouds freeze solid. With more than an hour of 
			footage shot in 70mm IMAX, you'll want to park your arse"...</i><a href="http://www.empireonline.com/movies/interstellar/review/">Read More</a>.</p>
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
$tpagetitle = "Interstellar";
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