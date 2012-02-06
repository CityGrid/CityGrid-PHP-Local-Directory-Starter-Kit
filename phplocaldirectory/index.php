<?php
include "header.php";

// what
if(isset($_REQUEST['what'])){ $what = $_REQUEST['what'];} elseif(isset($_POST['what'])){$what = $_POST['what']; } else { $what = $FeatureCategory; }
// where
if(isset($_REQUEST['where'])){ $where = $_REQUEST['where'];} elseif(isset($_POST['where'])){$where = $_POST['where']; } else { $where=$Site_Where; }
?>
		
<div class="span14">

  		<div class="row">
		
			<div class="hero-unit">
	
				<h2><?php echo $Site_Name;?></h2>
				<p>I needed a project to learn more about the <a href="http://developer.citygridmedia.com">CityGrid APIs</a>, so using <a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap</a>, I built a prototype of a local business directory. </p>
				<p><a class="btn primary large" href="/about.php">Learn more &raquo;</a></p>
				
				
			</div>
				
			<table cellpadding="5" cellspacing="5" with="500" align="center" class="zebra-striped">
				<tbody>
				<?php
		
				$placement=null;
				$has_offers=false;
				$histograms=false;
				$i=null;
				$format='json';
				
				$type='';
				$where=$Site_Where;
				$page=1;
				$rpp=6;
				$sort='dist';			
				
				$citygrid = new citygrid($publishercode);
				$search = $citygrid->srch_places_where($what,$type,$where,$page,$rpp,$sort,$format,$placement,$has_offers,$histograms,$i);
		
				foreach($search as $place) 
					{
						
			        $total_hits = $place->total_hits;
			        $first_hit = $place->first_hit;
			        $last_hit = $place->last_hit;
			        $last_hit = $place->last_hit;
			        $page = $place->page;
			        $maxpage = $total_hits / $rpp;
			        $rpp = $place->rpp;
		
					foreach($place->locations as $location) 
						{
		
						$featured = $location->featured;
						$public_id = $location->public_id;
						$name = $location->name;
						$address = $location->address;
						$street = $address->street;
						$city = $address->city;
						$state = $address->state;
						$postal_code = $address->postal_code;
						$neighborhood = $location->neighborhood;
						$latitude = $location->latitude;
						$longitude = $location->longitude;
						$distance = $location->distance;
						$image = $location->image;
						$phone_number = $location->phone_number;
						$fax_number = $location->fax_number;
						$rating = $location->rating;
						$tagline = $location->tagline;
						$profile = $location->profile;
						$website = $location->website;
						$has_video = $location->has_video;
						$has_offers = $location->has_offers;
						$offers = $location->offers;
						if(isset($location->user_reviews_count))
							{
							$user_reviews_count = $location->user_reviews_count;
							}
						$sample_categories = $location->sample_categories;
						$impression_id = $location->impression_id;
						$expansion  = $location->expansion;
						
				        ?>
						<tr>
							<td align="left">
						        <address>
						            <strong><?php echo $name; ?></strong><br />
						            <?php echo $street; ?><br />
						            <?php echo $city; ?>, <?php echo $state; ?><br />
						         </address>							
							</td>
							<td align="left" valign="middle" width="7%" style="padding-top: 40px;">
								<a href="detail.php?id=<?php echo $public_id; ?>&what=<?php echo $what; ?>&where=<?php echo $where; ?>" class="btn small primary">Detail</a>
							</td>
						</tr>				        
				        <?php					
						
						}					
					 } 													
				?>	
			<tbody>
		</table>
		<div>
			<!---CityGrid Attribution-->
			<p align="right">
				<span style="margin-left: 5px;"><strong>Powered by</strong>&nbsp;&nbsp;&nbsp;</span><br />
				<img src="http://kinlane-productions.s3.amazonaws.com/citygrid/citygrid_logo.jpg" width="150" />
			</p>
		</div>		
		
	</div>

</div>
    
<?php
include "footer.php";
?>