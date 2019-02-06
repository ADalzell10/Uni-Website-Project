<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
   
$tcontent = <<<PAGE
	<div class="container">
		<div class="well">
			<h1 align="center"><strong>Fantastic Beasts and Where to Find Them</strong></h1>
		</div>
		<div align="center">
			<img src="img/movies/fantastic-beasts.jpg" class="img-rounded" alt="Fantastic Beasts and Where to Find Them">
		</div>	
		<div class="well">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/Vso5o11LuGU" frameborder="0" allowfullscreen align="right"></iframe>
			<h2><strong>Movie Information and Trailer</strong></h2>
			<p><strong>Director:</strong> David Yates</p>
			<p><strong>Lead Actor:</strong> Dddie Redmayne</p>
			<p><strong>Release Date:</strong> 18 November 2016 (United Kingdom)</p>
			<p><strong>Genre:</strong> Fantasy, Action</p>
			<p><strong>Production Companies:</strong> Warner Bros, Heyday Films</p> 
			<p><strong>Film Synopsis:</strong> The year is 1926, and Newt Scamander (Eddie Redmayne) has just completed a global 
			excursion to find and document an extraordinary array of magical creatures. Arriving in New York for a 
			brief stopover, he might have come and gone without incident, were it not for a No-Maj (American for Muggle) 
			named Jacob, a misplaced magical case, and the escape of some of Newt's fantastic beasts, which could spell trouble
			for both the wizarding and No-Maj worlds.</p>
		
		</div>
		<div class="well">
			<h2><strong>Editor's Review</strong></h2>
			<p>A spinoff of the Harry Potter series into the area of magical creatures from a wizard called Newt Scamander 
			who was kicked out of Hogwarts. Traveling to New York for a brief visit until he runs into trouble and some 
			of his magical creatures get loose in the city causing for him to acquire help from some American wizards. 
			With other mysterious magical events, his creatures are not the only thing he ends up having to deal with. 
			From being imprisoned to weaselling his way out and eventually helping the wizards of New York to regain 
			control and imprison an escaped dangerous rogue wizard. As much as it was like Harry Potters wizardry, it 
			showed another side to the wizarding world in which Harry Potter was apart off. Also very Entertaining and 
			comical. </p>
			<h4><span class="label label-success">Rating: 7</span></h4>
		</div>
		<div class="well">
			<h2><strong>Other Review's</strong></h2>
			<h3 class="text-muted">The Guardian</h3>
			<p><i>"Fantastic Beasts is a rich, baroque, intricately detailed entertainment with some breathtaking digital 
			fabrications of prewar New York City. This is Steampunk 2.0, taking its inspirations from Terry Gilliam's Brazil 
			or Howard Hawks's His Girl Friday but the New York she creates also has the dark, traumatised look of Gotham City. 
			The American wizards themselves are subject to an internal debate about their attitude to the"...</i><a href="https://www.theguardian.com/film/2016/nov/13/fantastic-beasts-review-jk-rowling-eddie-redmayne-harry-potter">Read More</a>.</p>
			<h3 class="text-muted">Empire</h3>
			<p><i>"But the film has some structural problems. Rowling's varied beasts are fun, and brilliantly realised by 
			the effects team, but they're ultimately a sideshow, and the numerous action sequences to capture each one can drag. 
			The sight of Oscar winner Redmayne performing a mating dance for a giant hippo-monster will stay with you, but it's 
			not what we need to see when there"...</i><a href="http://www.empireonline.com/movies/fantastic-beasts/review/">Read More</a>.</p>
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
$tpagetitle = "Fantastic Beasts and Where to Find Them";
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