<style>
	.img
	{
	display: inline-block;
	position: relative;
	text-decoration: none;
	}
	.img img
	{
	border: 1px solid #cccccc;
	padding: 10px;
	}
	img:hover { border-color: #aaaaaa; }
	.img div
	{
	background: #666666;
	color: #ffffff;
	opacity: .70;
	padding: 3px 0px;
	position: absolute;
	left: 0px;
	bottom: 25px;
	text-align: center;
	width: 100%;
	}
	.img:hover div { opacity: .90; }
</style>

<?php

require_once("phpFlickr.php");

$f = new phpFlickr("05e2d0fd2cd357f43850b3deaf479597");

$search = $f->photos_search(array("text"=>"libraries, eugene, oregon", "tag_mode"=>"any", "per_page"=>"25", "license"=>"Attribution Creative Commons"));
//var_dump($search);

// Create the illusion of random photo
$RandomPhoto = rand(1,25);
$photocount = 1;

foreach ($search['photo'] as $photo) {
	
	if($photocount==$RandomPhoto)
		{

	    $photo_id = $photo['id'];
	    $photo_owner = $photo['owner'];
	    $photo_title = $photo['title'];
	    $photo_farm = $photo['farm'];
	    $photo_server = $photo['server'];
	    $photo_secret = $photo['secret'];
	    
	    $url = "http://www.flickr.com/photos/" . $photo_owner . "/" . $photo_id . "/";

	    ?>
	    
		<a href="#" class="img">
			<img src="http://farm<?php echo $photo_farm;?>.staticflickr.com/<?php echo $photo_server; ?>/<?php echo $photo_id; ?>_<?php echo $photo_secret; ?>.jpg" width="250" />
			<div>Libraries in Eugene, OR</div>
		</a>	 	
		
		<?php
		}
		
	$photocount++;
}

?>
