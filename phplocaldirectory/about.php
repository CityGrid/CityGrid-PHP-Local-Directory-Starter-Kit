<?php
include "header.php";

// what
if(isset($_REQUEST['what'])){ $what = $_REQUEST['what'];} elseif(isset($_POST['what'])){$what = $_POST['what']; } else { $what = $FeatureCategory; }
// where
if(isset($_REQUEST['where'])){ $where = $_REQUEST['where'];} elseif(isset($_POST['where'])){$where = $_POST['where']; } else { $where=$Site_Where; }

?> 
    <div class="span14"> 
      <div class="page-header"> 
        <h2>About</h2> 
      </div> 
      <p><img style="padding-top: 15px; padding-right: 15px; padding-bottom: 15px; padding-left: 15px; " width="250" align="right" src="http://kinlane-productions.s3.amazonaws.com/citygrid/citygrid_logo.jpg" /></p> 
      <p>I needed to learn more about the <a title="CityGrid APIs" target="" href="http://developer.citygrid.com">CityGrid APIs</a>. &nbsp;What better way than actually build a prototype. &nbsp;I thought it would be good to have a simple local directory that could be deployed all by itself, or as part of another web site.</p> 
      <p>I wanted the directory to look good, without having to do any graphic design, so I used <a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap</a> for the user interface (UI). &nbsp;</p> 
      <p>I put together five pages, allowing you to browse some local business categories in West Hollywood, CA.</p> 
      <ul> 
        <li>Home</li> 
        <li>About</li> 
        <li>Search w/&nbsp;Detail</li> 
        <li>Contact&nbsp;</li> 
      </ul> 
      <p>The site doesn't use a database, it makes calls to the&nbsp;<a title="CityGrid APIs" target="" href="http://developer.citygrid.com/">CityGrid APIs</a>&nbsp;in real-ime, for every search and pulling every business listing page. &nbsp;</p> 
      <p>This project is still in development, you can <a target="_blank" href="https://github.com/kinlane/CityGrid---Local-Directory">download it at Github</a>.&nbsp;</p> 
      <p>I will also extract a CityGrid API, PHP class and some samples out of this project, for you to use without having to deploy this whole directory.</p> 
      <p>After that I will work on Python and Ruby versions of this project. &nbsp;</p> 
    </div> 
<?php
include "footer.php";
?>
 
  