<?php 
class citygrid {
	
	private $publishercode;
	private $dbserver;
	private $dbname;
	private $dbuser;
	private $dbpassword;

	public function __construct($publishercode) {
		
	  	$this->publishercode = $publishercode;
		
	}

	public function __destruct() {
		 
	}

	// content/places/v2/search/where
   	public function srch_places_where(
		$what=null, 
		$type=null, 
		$where=null, 
		$page = 1,
		$rpp = 20,
		$sort = 'dist',
		$format='xml',
		$placement=null,
		$has_offers=null,
		$histograms=null,
		$i=null){

   		$qStr = "";
   		$url = "http://api.citygridmedia.com/content/places/v2/search/where?";
   		
   		if($what!=''){ $qStr .= "what=" . urlencode($what); }
   		if($type!=''){ $qStr .= "&type=" . urlencode($type); }
   		if($where!=''){ $qStr .= "&where=" . urlencode($where); }
   		
   		$qStr .= "&sort=" . urlencode($sort);
   		$qStr .= "&page=" . urlencode($page);
   		$qStr .= "&rpp=" . urlencode($rpp);
   		
   		if($placement!=''){ $qStr .= "&placement=" . urlencode($placement); }
   		if($has_offers!=''){ $qStr .= "&has_offers=" . urlencode($has_offers); }
   		if($histograms!=''){ $qStr .= "&histograms=" . urlencode($histograms); }
   		if($i!=''){ $qStr .= "&i=" . urlencode($i); }
   		
   		$qStr .= "&format=" . $format;
   		
   		$qStr .= "&publisher=" . $this->publishercode;
   		
   		$url .= $qStr;
   		
	 	//echo "pulling - " . $url . "<br /><br />";
		
		$curl_handle = curl_init();  
		curl_setopt($curl_handle, CURLOPT_URL, $url);  
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);   
		
		curl_setopt($curl_handle,CURLOPT_SSL_VERIFYPEER,0); 
		curl_setopt($curl_handle,CURLOPT_CAINFO,'D:\wwwroot\hyp3rl0cal.laneworks.net\system\ca-bundle.crt');
		
		$searchResponse = curl_exec($curl_handle);  
		curl_close($curl_handle);    
		
		$search = json_decode($searchResponse);
		return $search;   		
   			
   		}
   		
	// content/places/v2/detail
   	public function places_detail(
   		$id,
		$id_type='cg',
		$phone=null,
		$customer_only=null,
		$all_results=null,
		$review_count=null,
		$placement=null,
		$format=null,
		$callback=null,
		$i
   		){
   			
   		//var_dump($_SERVER);	
   		
   		$client_ip = gethostbyname($_SERVER['HTTP_HOST']);	
   		//echo "IP: " . $client_ip . "<br />";
   		
   		$qStr = "";
   		$url = "http://api.citygridmedia.com/content/places/v2/detail?";
   		
   		$qStr .= "id=" . $id;
   		
   		if($id_type!=''){ $qStr .= "&id_type=" . urlencode($id_type); }
   		if($phone!=''){ $qStr .= "&phone=" . urlencode($phone); }
   		if($customer_only!=''){ $qStr .= "&customer_only=" . urlencode($customer_only); }
   		
   		if($all_results!=''){ $qStr .= "&all_results=" . urlencode($all_results); }
   		if($review_count!=''){ $qStr .= "&review_count=" . urlencode($review_count); }
   		if($placement!=''){ $qStr .= "&placement=" . urlencode($placement); }
   		if($callback!=''){ $qStr .= "&callback=" . urlencode($callback); }
   		if($i!=''){ $qStr .= "&i=" . urlencode($i); }
   		
   		$qStr .= "&format=" . $format;
   		
   		$qStr .= "&client_ip=" . $client_ip;
   		
   		$qStr .= "&publisher=" . $this->publishercode;
   		
   		$url .= $qStr;
   		
	 	//echo "pulling - " . $url . "<br /><br />";
		
		$curl_handle = curl_init();  
		curl_setopt($curl_handle, CURLOPT_URL, $url);  
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);   
		
		curl_setopt($curl_handle,CURLOPT_SSL_VERIFYPEER,0); 
		curl_setopt($curl_handle,CURLOPT_CAINFO,'D:\wwwroot\hyp3rl0cal.laneworks.net\system\ca-bundle.crt');
		
		$searchResponse = curl_exec($curl_handle);  
		curl_close($curl_handle);    
		
		$search = json_decode($searchResponse);
		return $search;   		
   			
   		}   		
   		
   	public function display_web_ad_300_250($adid,$publisher,$what,$where)
   		{
   		
		$returnAd = '<div id="sidebar_ad_slot_' . $adid . '"></div>';
		$returnAd .= '<script type="text/javascript">';
		$returnAd .= "new CityGrid.Ads('sidebar_ad_slot_" . $adid . "', {";
		$returnAd .= "    collection_id: 'web-002-300x250',";
		$returnAd .= "    publisher: '" . $publisher . "',";
		$returnAd .= "    what:'" . $what . "',";
		$returnAd .= "    where: '" . $where . "',";
		$returnAd .= "    width: 300,";
		$returnAd .= "    height: 250";
		$returnAd .= "  });";
		$returnAd .= "</script>";
   		
   		return $returnAd;
   		
		}
		
   	public function display_web_ad_630_100($adid,$publisher,$what,$where)
   		{		
		
		$returnAd = '<script type="text/javascript">';
		$returnAd .= "new CityGrid.Ads('" . $adid . "', {";
		$returnAd .= "    collection_id: 'web-001-630x100',";
		$returnAd .= "    publisher: '" . $publisher . "',";
		$returnAd .= "    what:'" . $what . "',";
		$returnAd .= "    where: '" . $where . "',";
		$returnAd .= "    width: 630,";
		$returnAd .= "    height: 100";
		$returnAd .= "  });";
		$returnAd .= "</script>";
   		
   		return $returnAd;		
   		
   		}
	}
?>