<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
   
$tcontent = <<<PAGE
	<div class="container">
		<div class="well">
			<h1 align="center"><strong>Doctor Strange</strong></h1>
		</div>
		<div align="center">
			<img src="img/movies/doctor-strange.jpg" class="img-rounded" alt="Doctor Strange">
		</div>
		<div class="well">
			<h2><strong>Movie Information and Trailer</strong></h2>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/HSzx-zryEgM" frameborder="0" allowfullscreen align="right"></iframe>
			<p><strong>Director:</strong> Scott Derrickson</p>
			<p><strong>Lead Actor:</strong> Benedict Cumberbatch, Tilda Swinton</p>
			<p><strong>Release Date:</strong> 24 October 2016 (United Kingdom)</p>
			<p><strong>Genre:</strong> Fantasy, Science Fiction</p>
			<p><strong>Production Companies:</strong> Marvel Studios, Walt Disney Studios Motion Pictures</p>
			<p><strong>Film Synopsis:</strong> Dr. Stephen Strange's (Benedict Cumberbatch) life changes after a car accident 
			robs him of the use of his hands. When traditional medicine fails him, he looks for healing, and hope, 
			in a mysterious enclave. He quickly learns that the enclave is at the front line of a battle against 
			unseen dark forces bent on destroying reality. Before long, Strange is forced to choose between his life 
			of fortune and status or leave it all behind to defend the world as the most powerful sorcerer in existence.</p>
		
		</div>
		<div class="well">
			<h2><strong>Editor's Review </strong></h2>
			<p>A Doctor named Stephen Strange who was an incredible surgeon, was involved in a horrific car accident destroying 
			the nerves in his hand. This resulted in him not being able to do the thing he loved, being a surgeon. Because 
			there was nothing that could help him physically, he looked elsewhere for help. Finding himself in a foreign 
			country with people who made him question everything he ever learned. He ends up changing from his very 
			egotistical personality to someone that considers helping others as he is trained to become a sorcerer. A comic 
			that came to life at the hands of Marvel once again, and like their other movies, it did not disappoint.</p>
			<h4><span class="label label-success">Rating: 9</span></h4>
		</div>
		<div class="well">
			<h2><strong>Other Review's</strong></h2>
			<h3 class="text-muted">The Guardian</h3>
			<p><i>"Doctor Strange is played with deadpan theatrical relish by Benedict Cumberbatch; and though his intellectual 
			glamour never quite reaches Sherlockian heights, it's a much more enjoyable and satisfying character for him than John 
			Harrison, the shady figure from Star Trek Into Darkness. Strange is a man of science who overcomes his foolish egotism 
			and"...</i><a href="https://www.theguardian.com/film/2016/oct/24/doctor-strange-review-benedict-cumberbatch-marvel-eyepoppingly-freaky-extravaganza">Read More</a>.</p>
			<h3 class="text-muted">Empire</h3>
			<p><i>"Horizons broadened, Strange is introduced to both the magical arts and the threats they're used as a defence 
			against: chiefly Kaecilius (Mads Mikkelsen), a former student of Kamar-Taj whose pact with a demonic entity threatens 
			to end the world. It's a far from revolutionary story but the invention with which it's told is something else entirely. 
			Gravity, time and reality"...</i><a href="http://www.empireonline.com/movies/doctor-strange/review/">Read More</a>.</p>
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
$tpagetitle = "Doctor Strange";
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