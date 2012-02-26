				<div class="span5">
					
					<?php
					// Display a Single Flickr Photo That is 275 Wide
					$FlickrSearch = $where;  // Just doing where
					$DisplayCount = 1;
					$RandomCount = 100; // choose from random of potentially 50 images
					$width = 275;
					$flickr = new flickrphotos($FlickrKey);
					$photo = $flickr->displayFlickr($FlickrKey,$what,$where,$DisplayCount,$RandomCount, $width);						
					echo $photo;
					?>

					<br />
				
					<?php
					// Display a Web Ad that is 300 x 250
					$adid = 1;
					$publisher = 'citysearch';
					$citygridad = new citygridads($publishercode);
					$displayad = $citygridad->display_web_ad_300_250($adid,$publisher,$what,$where);						
					echo $displayad;
					?>			

					<br />
					
					<?php
					// Display a Single Flickr Photo That is 275 Wide
					$FlickrSearch = $where;  // Just doing where
					$DisplayCount = 1;
					$RandomCount = 100; // choose from random of potentially 50 images
					$width = 275;
					$flickr = new flickrphotos($FlickrKey);
					$photo = $flickr->displayFlickr($FlickrKey,$what,$where,$DisplayCount,$RandomCount, $width);						
					echo $photo;
					?>

				</div>
				
			</div>
		
		
			<footer>
      
      
            </footer>
            
      </div>
      
    </div>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1119465-69']);
  _gaq.push(['_setDomainName', 'hyp3rl0cal.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>