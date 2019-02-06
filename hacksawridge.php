<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
   
$tcontent = <<<PAGE
	<div class="container">
		<div class="well">
			<h1 align="center"><strong>Hacksaw Ridge</strong></h1>
		</div>
		<div align="center">
			<img src="img/movies/hacksawridge.jpg" class="img-rounded" alt="Hacksaw Ridge">
		</div>
		<div class="well">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/s2-1hz1juBI" frameborder="0" allowfullscreen align="right"></iframe>
			<h2><strong>Movie Information and Trailer</strong></h2>
			<p><strong>Director:</strong> Mel Gibson</p>
			<p><strong>Lead Actor:</strong> Andrew Garfield</p>	
			<p><strong>Release Date:</strong> 16 October 2016 (Australia)</p>
			<p><strong>Genre:</strong> Drama, History</p>
			<p><strong>Production Company:</strong> Summit Entertainment</p>
			<p><strong>Film Synopsis:</strong> The true story of Pfc. Desmond T. Doss (Andrew Garfield), who won the Congressional Medal of Honor 
			despite refusing to bear arms during WWII on religious grounds. Doss was drafted and ostracized by fellow soldiers for 
			his pacifist stance but went on to earn respect and adoration for his bravery, selflessness and compassion after he risked 
			his life -- without firing a shot -- to save 75 men in the Battle of Okinawa.</p>
		
		</div>
		<div class="well">
			<h2><strong>Editor's Review</strong></h2>
			<p>An unbelievable true story about a soldier who refused to use a gun after signing up for war, due to 
			his religious believe. This caused distrust and hate from the men who were in training around him as 
			they felt he would be not be able to help them in battle. Sadness surrounding the movie as private Doss 
			might get imprisoned for his rejection to use a weapon until his father steps in. Interested as to what 
			Doss will do on the battle ground, the viewer is left wondering. This is until Doss fearlessly shows 
			courage when other men are injured around him were filled with fear of death. Private Doss never gave 
			up and in the end when men were ready to go back up, they would not move until they had Doss with them 
			as he was what gave them hope. A film that portrays a strong message about war and beliefs. </p>
			<h4><span class="label label-success">Rating: 8</span></h4>
		</div>
		<div class="well">
			<h2><strong>Other Review's</strong></h2>
			<h3 class="text-muted">The Guardian</h3>
			<p><i>"Thus Doss (played with an unlined forehead and semi-vacant grin by Andrew Garfield) must scramble 
			over piles of mutilated corpses, exploded skulls, and screaming wounded as he carries out his heroic deeds; 
			though Gibson employs a battery of cinematic shock tactics and impact-maximising moves, there's no sense that 
			he is going overboard, or straying into"...</i><a href="https://www.theguardian.com/film/2016/sep/04/hacksaw-ridge-review-mel-gibson-finds-a-conscience-in-gruesome-war-story">Read More</a>.</p>
			<h3 class="text-muted">Empire</h3>
			<p><i>"It's a moving recreation of a khaki-clad superhero at work, an old-fashioned story that Gibson mainlines 
			with bleeding-edge craft and technique - he's lost little of his knack for spectacle. But as with some of his previous 
			work, the hero is occasionally depicted as an almost Christ-like figure - one shot could be renamed 'The Passion Of The 
			Doss' - leaving it to"...</i><a href="http://www.empireonline.com/movies/hacksaw-ridge/review/">Read More</a>.</p>
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
$tpagetitle = "Hacksaw Ridge";
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