<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
   
$tcontent = <<<PAGE
	<div class="container">
		<div class="well">
			<h1 align="center"><strong>Deadpool</strong></h1>
		</div>
		<div align="center">
			<img src="img/movies/deadpool.jpg" class="img-rounded" alt="Deadpool">
		</div>	
		<div class="well">
			<h2><strong>Movie Information and Trailer</strong></h2>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/FyKWUTwSYAs" frameborder="0" allowfullscreen align="right"></iframe>
			<p><strong>Director:</strong> Tim Miller</p> 
			<p><strong>Lead Actor:</strong> Ryan Reynolds</p>
			<p><strong>Release Date:</strong> 10 February 2016 (United Kingdom)</p>
			<p><strong>Genre:</strong> Science Fiction, Action</p>
			<p><strong>Production Companies:</strong> 20th Century Fox, The Donners' Company, TSG Entertainment, Genre Films</p>
			<p><strong>Film Synopsis:</strong> Wade Wilson (Ryan Reynolds) is a former Special Forces operative who now works as a mercenary. 
			His world comes crashing down when evil scientist Ajax (Ed Skrein) tortures, disfigures and transforms him into Deadpool.
			The rogue experiment leaves Deadpool with accelerated healing powers and a twisted sense of humor. With help from mutant 
			allies Colossus and Negasonic Teenage Warhead (Brianna Hildebrand), Deadpool uses his new skills to hunt down the man who 
			nearly destroyed his life.</p>
		
		</div>
		<div class="well">
			<h2><strong>Editor's Review</strong></h2>
			<p>The tail of Wade Wilson who worked as a mercenary but unfortunately got diagnosed with cancer. Approached by a 
			man claiming he could save his life, he was willing to do anything. The experiment however changed him drastically 
			giving him abilities which made him near immortal and destroying his appearance. A funny and action filled movie 
			which shows Deadpool formed, including the 4th wall break where Deadpool talks to the viewer. Adding to this he 
			is always coming out with something comical due to his personality. A very entertaining movie.</p>
			<h4><span class="label label-success">Rating: 9</span></h4>
		</div>
		<div class="well">
			<h2><strong>Other Review</strong></h2>
			<h3 class="text-muted">The Guardian</h3>
			<p><i>"As a self-deconstructing superhero movie, Deadpool is in a recognisable line from Matthew Vaughn's outrageous 
			Kick-Ass, which shows the superhero's secret un-super homespun existence behind the scenes (there is the same relationship 
			with Tarantino's Kill Bill). It also has something in common with Watchmen, the costumed vigilantes who ply"...</i><a href="https://www.theguardian.com/film/2016/feb/07/deadpool-review-marvel-ryan-reynolds-film-superhero">Read More</a>.</p>
			<h3 class="text-muted"></h3>
			<p><i>"And this is where the film isn't entirely successful. It's at its best in its moments of meta-humour - Deadpool 
			wondering whether it'll be James McAvoy or Patrick Stewart in charge at the X-Mansion, or bemoaning the budgetary reasons 
			that mean the only two X-Men he ever gets to actually meet are metallic giant Colossus (Stefan Kapicic) and sullen youngster"...</i><a href="http://www.empireonline.com/movies/deadpool-2/review/">Read More</a>.</p>
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
$tpagetitle = "Deadpool";
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