<?php

include "header.php";

// what
if(isset($_REQUEST['what'])){ $what = $_REQUEST['what'];} elseif(isset($_POST['what'])){$what = $_POST['what']; } else { $what=''; }
// type
if(isset($_REQUEST['type'])){ $type = $_REQUEST['type'];} elseif(isset($_POST['type'])){$type = $_POST['type']; } else { $type=''; }
// where
if(isset($_REQUEST['where'])){ $where = $_REQUEST['where'];} elseif(isset($_POST['where'])){$where = $_POST['where']; } else { $where=$Site_Where; }

// page
if(isset($_REQUEST['page'])){ $page = $_REQUEST['page'];} elseif(isset($_POST['page'])){$page = $_POST['page']; } else { $page=1; }
// rpp
if(isset($_REQUEST['rpp'])){ $rpp = $_REQUEST['rpp'];} elseif(isset($_POST['rpp'])){$rpp = $_POST['rpp']; } else { $rpp=10; }
// sort
if(isset($_REQUEST['sort'])){ $sort = $_REQUEST['sort'];} elseif(isset($_POST['sort'])){$sort = $_POST['sort']; } else { $sort='dist'; }
?>

<div class="span14">
	
	<div class="page-header">
		<h2>Search</h2>
	</div>
	
	<ul class="breadcrumb">
		<li><a href="#"><?php echo $where;?></a> / </li>
		<?php if($what!='') {?>
			<li><a href="#"><?php echo $what;?></a></li>
		<?php } ?>
	</ul>

	<?php
	$max = 2;
	$format='json';
	
	//Get All Active APIs
	$citygrid = new citygridads($publishercode);
	$sponsored = $citygrid->custom_ads_where($what,$where,$max,$format);
	if(count($sponsored->ads)>0)
		{
		?>
		<p align="right">sponsored listings</p>
		<table cellpadding="5" cellspacing="5" with="450" align="center" class="zebra-striped">
			<tbody>				
			<?php
			foreach($sponsored->ads as $ad) 
				{
					
				$id = $ad->id;
				$type = $ad->type;
				$listingId = $ad->listingId;
				$name = $ad->name;
				$street = $ad->street;
				$city = $ad->city;
				$state = $ad->state;
				$zip = $ad->zip;
				$latitude = $ad->latitude;
				$longitude = $ad->longitude;
				$phone = $ad->phone;
				$tagline = $ad->tagline;
				$description = $ad->description;
				$net_ppe = $ad->net_ppe;
				$reviews = $ad->reviews;
				$offers = $ad->offers;
				$distance = $ad->distance;
				$overallReviewRating = $ad->overallReviewRating;
				$adDestinationUrl = $ad->adDestinationUrl;
				$adImageUrl = $ad->adImageUrl;
		        ?>
				<tr>
					<td align="left">
						<?php if($adImageUrl!='') { ?>
							<a href="<?php echo $adDestinationUrl;?>" target="_blank">
								<img src="<?php echo $adImageUrl;?>" width="75" align="left" style="padding: 5px;" />	
							</a>
						<?php } ?>
						<a href="<?php echo $adDestinationUrl;?>" target="_blank"><strong><?php echo $name; ?></strong><br /></a>
						<!-- Description -->
						<?php if($description!='') { ?>
							<?php echo $description;?><br />	
						<?php } ?>
						<!-- Tag Line -->
						<?php if($tagline!='') { ?>
							<?php echo $tagline;?><br />	
						<?php } ?>	
						<?php if($street!=''&&$city!=''&&$state!=''&&$zip!='') { ?>
				        <address>
				            <?php echo $street; ?> <?php echo $city; ?>, <?php echo $state; ?> <?php echo $zip; ?><br />
				        </address>
				        <?php } ?>	
					</td>
				</tr>				        
		        <?php									
			 } 	
			 ?>
			<tbody>
		</table>				 
	<?php
	}
	?>	

	<table cellpadding="5" cellspacing="5" with="500" align="center" class="zebra-striped">
		<tbody>
		<?php

			$placement=null;
			$has_offers=false;
			$histograms=false;
			$i=null;
			$type=null;
			$format='json';
			
			//Get All Active APIs
			$citygrid = new citygridplaces($publishercode);
			$search = $citygrid->srch_places_where($what,$type,$where,$page,$rpp,$sort,$format,$placement,$has_offers,$histograms,$i);
						
			foreach($search as $place) 
				{
					
		        $total_hits = $place->total_hits;
		        $first_hit = $place->first_hit;
		        $last_hit = $place->last_hit;
		        $page = $place->page;
		        $maxpage = $total_hits / $rpp;
		        $rpp = $place->rpp;;			        
		       
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
	
	<center>
		<div class="pagination" align="center">
			<ul>
			<?php
			if($maxpage>15) { $maxpage = 15; }
			?>
			<?php if($maxpage>1){?>
				<li class="prev disabled"><a href="search.php?what=<?php echo $what;?>&page=<?php echo $page-1;?>">&larr; Previous</a></li>
			<?php } ?>
			<?php
			for ( $counter = 1; $counter <= $maxpage; $counter += 1) 
				{
				?>  
				<li<?php if($counter==$page){?> class="active"<?php } ?>>
					<a href="search.php?what=<?php echo $what; ?>&page=<?php echo $counter;?>"><?php echo $counter;?></a>
				</li>
				<?php
				}		
			?>
			<?php if(round($page)!=round($maxpage)){?>
				<li class="next"><a href="search.php?what=<?php echo $what; ?>&page=<?php echo $page+1;?>">Next &rarr;</a></li>
			<?php } ?>
			</ul>
		</div>	
	</center>
	
</div>
        
<?php
include "footer.php";
?>