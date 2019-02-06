<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
   
$tcontent = <<<PAGE
	<div class="container">
		<div class="well">
			<h1 align="center"><strong>V for Vendetta</strong></h1>
		</div>
		<div align="center">
			<img src="img/movies/vendetta1.jpg" class="img-rounded" alt="V for Vendetta">
		</div>	
		<div class="well">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/k_13fFIrhPk" frameborder="0" allowfullscreen align="right"></iframe>
			<h2><strong>Movie Information and Trailer</strong></h2>
			<p><strong>Director:</strong> James McTeigue</p>
			<p><strong>Lead Actors:</strong> Hugo Weaving, Natalie Portman</p>
			<p><strong>Release Date:</strong> 17 March 2006 (United Kingdom)</p>
			<p><strong>Genre:</strong> Drama, Thriller</p>
			<p><strong>Production Companies:</strong> DC Comics, Warner Bros, Silver Pictures, Virtual Studios, Babelsberg Studio, Medienboard Berlin-Brandenburg</p>
			<p><strong>Film Synopsis:</strong> Following world war, London is a police state occupied by a fascist government, and a vigilante known only as V (Hugo Weaving)
			uses terrorist tactics to fight the oppressors of the world in which he now lives. When V saves a young woman named Evey (Natalie Portman) 
			from the secret police, he discovers an ally in his fight against England's oppressors.</p>
		
		</div>
		<div class="well">
			<h2><strong>Editor Review</strong></h2>
			<p>A mysterious vigilante named V saves the life of a young woman named Evey, who in turn ends up supporting 
			him in his fight against the English government. V, the main character, was created by the government through 
			experimentation. They thought he was killed but as he survived he fights against the fascist government and 
			generates support from the public. A thriller that keeps you trusting in V as he works towards defeating those 
			whose wish to stand against the people.</p>
			<h4><span class="label label-success">Rating: 8</span></h4>
		</div>
		<div class="well">
			<h2><strong>Other Review's</strong></h2>
			<h3 class="text-muted">The Guardian</h3>
			<p><i>"V is a mystery; he begins the film by blowing up London's central criminal court, the Old Bailey, with a 
			firework display of explosives, accompanied by Tchaikovsky's 1812, which he has sneaked on to the police PA 
			system - and he has more inspiring and, apparently, victimless crime-spectaculars in mind. How exactly V has managed 
			to do this is a big mystery, the secret to which the film is uninterested in revealing. Pettifogging real-world 
			considerations wouldn't matter, or matter as much, if the style"...</i><a href="https://www.theguardian.com/culture/2006/mar/17/1">Read More</a>.</p>
			<h3 class="text-muted">Empire</h3>
			<p><i>"Opposite her, though, Hugo Weaving proves compelling as V, even if his performance is largely vocal. 
			He has some clumsy moments to deal with (V's overly alliterative entrance speech is a dire scripting mis-step), 
			but he overcomes them to make this borderline psychotic vigilante a memorable and unsettlingly charismatic anti-hero. 
			Alan Moore may be snubbing Weaving's vicious"...</i><a href="http://www.empireonline.com/movies/v-vendetta/review/">Read More</a>.</p>
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
$tpagetitle = "V for Vendetta";
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