<?php
date_default_timezone_set("America/Los_Angeles");

$ThisPage = $_SERVER['PHP_SELF'];
$ThisURL = $_SERVER['REQUEST_URI'];
$ThisHost = $_SERVER['HTTP_HOST'];								

include "config.php";

include "/var/www/html/system/class-citygrid-places.php";
include "/var/www/html/system/class-citygrid-advertising.php";
include "/var/www/html/system/class-utility.php";
include "/var/www/html/system/class-flickr-photos.php";
include "/var/www/html/system/phpFlickr.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    
    <title><?php echo $Site_Name;?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	<script type="text/javascript" src="http://static.citygridmedia.com/ads/scripts/v2/loader.js"></script>

    <link href="bootstrap.css" rel="stylesheet">
    
    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <!-- This is for the Flickr Images -->
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
    
  </head>

  <body>

    <div class="topbar">
      <div class="topbar-inner">
        <div class="container-fluid">
          <a class="brand" href="http://hyp3rl0cal.com/"><?php echo $Site_Name;?></a>
          <ul class="nav">
            <li><a href="http://hyp3rl0cal.com/index.php">Home</a></li>
            <li><a href="http://hyp3rl0cal.com/blog/">Blog</a></li>
			<li class="active"><a href="http://phplibraries.hyp3rl0cal.com/">PHP</a></li>
			<li><a href="http://pythonlibraries.hyp3rl0cal.com/">Python</a></li>
			<li class="active"><a href="http://rubylibraries.hyp3rl0cal.com/">Ruby</a></li>
            <li><a href="http://hyp3rl0cal.com/contact.php">Contact</a></li>
          
          </ul>
			<form class="navbar-search pull-left" action="/search.php" style="padding-left: 300px; float: right;">
			  <input type="text" class="search-query" placeholder="Search" name="what">
			</form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
    
      <div class="sidebar">
        <div class="well">
        
			<ul>
          
			<?php
			// Get All Business Categories from Database
			//$utility = new utility($dbserver,$dbname,$dbuser,$dbpassword);
			//$BusinessCategories = $utility->getBusinessCategories();
			
			$myStore = "/var/www/html/system/business-categories-datastore.txt";
			$fh = fopen($myStore, 'r');
			//$BusinessCategories = fgets($Content);
			$BusinessCategories = fread($fh, filesize($myStore));

			$BusinessCategories = str_replace("\r","",$BusinessCategories);

			$BusinessCategory = json_decode($BusinessCategories);

			foreach($BusinessCategory as $category)
				{                              
				?><li><a href="/search.php?what=<?php echo $category->Name;?>"><?php echo $category->Name;?></a></li><?php
				}		
				
			//  Set a random Business Category for Use Elsewhere
			$FeatureCategory = $BusinessCategory[array_rand($BusinessCategory, 1)]->Name;
			$what = $FeatureCategory;
			$where = $Site_Where;
			?>          

          </ul>     
          
        </div>
      </div>     
      
      <div class="content">
			
			<div class="row">      