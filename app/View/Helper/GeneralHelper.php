<?php
App::uses('AppHelper', 'View/Helper');
class GeneralHelper extends AppHelper {


	public $helpers = array(
		'Html',
		'Form',
		'Session',
		'Js',
	);


	public function  adminLink($cmsId=0,$linkColor = 711101){
		$roleId=$this->Session->read('Auth.Admin.role_id');
		if($roleId==1){
		echo '<a target="_blank" style="color:#'. $linkColor . ';font-size:10px;" href="'.Router::url('/').'admin/CmsPages/edit/'.$cmsId.'"> Admin Edit</a>';
			}
		else 
		echo "";	
		}
		
	public function  adminLinkArray($cmsContent,$unique_name,$key='title',$linkColor = 711101){
		if(isset($cmsContent) and count($cmsContent)>0)
		{
			foreach($cmsContent as $cmsRow)
			{
				if(!empty($key)){
					if(strtoupper($cmsRow['Cmspage']['unique_name']) == strtoupper($unique_name)){
					
						echo $cmsRow['Cmspage'][$key];
						echo $this->adminLink($cmsRow['Cmspage']['id'],$linkColor);
						break;
					}
				}
			}
		
		}
	}	
	public function  adminImageLink($cmsImgId=0){
		$roleId=$this->Session->read('Auth.Admin.role_id');
		if($roleId==1){
		echo '<a target="_blank" style="color:#711101;font-size:10px;" href="'.Router::url('/').'admin/CmsImages/edit/'.$cmsImgId.'"> Admin Edit Image</a>';
			}
		else 
		echo "";	
	}
  
	public function  adminFaqLink($faqId=0){
		$roleId=$this->Session->read('Auth.Admin.role_id');
		if($roleId==1){
		echo '<a style="color:#711101;font-size:10px;" href="'.Router::url('/').'admin/Faqs/edit/'.$faqId.'"> Admin Edit</a>';
			}
		else 
		echo "";	
		}
		
	public function  fbShareLink($divClass='',$sharepath="",$shareImage="",$shareTitle="",$shareSummary=""){
		
		//$cms_data = $this->cms_page_text(131);
		//$shareSummary = @$cms_data['Cmspage']['description'];
		
		echo '<a href="http://www.facebook.com/sharer/sharer.php?m2w&s=100&p[url]='.$sharepath.'&p[images][0]='.$shareImage.'&p[title]='.$shareTitle.'&p[summary]='.$shareSummary.'" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;" target="_blank">
        	<div class="'.$divClass.'"></div>
		</a>';
		//echo $this->Html->link('', 'https://www.facebook.com/sharer/sharer.php?u='.$sharepath, array('class' => 'button', 'target' => '_blank'));
	}
	
	public function  fbShareButtonLink($imgbtn="",$sharepath="",$shareImage="",$shareTitle="",$shareSummary=""){
		
		$imgbtn = $this->Html->image($imgbtn);
				
		echo '<a class="site-share-btn" href="http://www.facebook.com/sharer/sharer.php?m2w&s=100&p[url]='.$sharepath.'&p[images][0]='.$shareImage.'&p[title]='.$shareTitle.'&p[summary]='.$shareSummary.'" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;" target="_blank">
            <i class="fa fa-facebook "></i>
        </a>';
		
		
		//echo $this->Html->link($this->Html->image($imgbtn, array("alt" => "fblink")),'https://www.facebook.com/sharer/sharer.php?u='.$sharepath,array('escape' => false,'target'=>'_blank'));
	}
	
	public function  twitterShareLink($divClass='',$sharepath="",$shareTitle="",$shareSummary=""){
		
		//$cms_data = $this->cms_page_text(133);
		//$shareSummary = @$cms_data['Cmspage']['description'];
		
		
		$text = $shareSummary;
		$hashtags = 'hautetrader1,fashionblog,stylist';
		
		$short_url = $sharepath;
		
		$url = 'http://twitter.com/share?text='.$text.'&hashtags='.$hashtags.'&url='.$short_url;
		
		echo '<a href="'.$url.'" data-lang="en" data-size="large" target="_blank" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;" data-count="none">
				<div class="'.$divClass.'"></div>
			  </a>';
		//echo $this->Html->link('', 'https://www.facebook.com/sharer/sharer.php?u='.$sharepath, array('class' => 'button', 'target' => '_blank'));
	}
	
	public function  twitterShareButtonLink($imgbtn="",$sharepath="",$shareTitle="",$shareSummary="",$flag=""){
		
		$img = $this->Html->image($imgbtn);
		//$cms_data = $this->cms_page_text(133);
		//$shareSummary = @$cms_data['Cmspage']['description'];
		
		/*if($flag==1){
			$text = '';
			$hashtags = '';
		}
		else{
			$text = $shareSummary;
			$hashtags = 'hautetrader,fashionblog,stylist';
		}*/
		$text = $shareTitle;
		$hashtags = 'hautetrader1,fashionblog,stylist';
		
		$short_url = $sharepath;
		
		$url = 'http://twitter.com/share?text='.$text.'&hashtags='.$hashtags.'&url='.$short_url;
		
		echo '<a class="site-share-btn" href="'.$url.'" data-lang="en" data-size="large" target="_blank" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;" data-count="none">
        	<i class="fa fa-twitter"></i>
        </a>';
		/*echo '<a href="http://twitter.com/home?status='.$sharepath.'" data-text="'.$text.'" data-url="'.$sharepath.'" data-related="jasoncosta" data-lang="en" data-size="large" target="_blank" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;" data-count="none">
        	'.$img.'
        </a>';*/
		 
	}
	
	public function pinterestShareLink($divClass="",$sharepath="",$shareImage="",$shareTitle="",$shareSummary=""){
		
		//$cms_data = $this->cms_page_text(131);
		//$shareTitle = @$cms_data['Cmspage']['description'].@$shareTitle;
		
		echo '<a href="//www.pinterest.com/pin/create/button/?url='.$sharepath.'&media='.$shareImage.'&description='.$shareTitle.'" target="_blank" data-pin-do="buttonPin" data-pin-config="above" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;">
        	<div class="'.$divClass.'"></div>
		</a>';
	}
	
	public function pinterestShareButtonLink($imgbtn="",$sharepath="",$shareImage="",$shareTitle="",$shareSummary=""){
		
		$imgbtn = $this->Html->image($imgbtn);
		
		//$cms_data = $this->cms_page_text(131);
		//$shareTitle = @$cms_data['Cmspage']['description'].@$shareTitle;
		
		echo '<a class="site-share-btn" href="//www.pinterest.com/pin/create/button/?url='.$sharepath.'&media='.$shareImage.'&description='.$shareTitle.'" target="_blank" data-pin-do="buttonPin" data-pin-config="above" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;">
        <i class="fa fa-pinterest"></i>
		</a>';
		 
	} 
	
	
	public function googlePlusShareLink($imgbtn="",$sharepath=""){
		
		$imgbtn = $this->Html->image($imgbtn);
		
		$cms_data = $this->cms_page_text(131);
		$shareTitle = @$cms_data['Cmspage']['description'].@$shareTitle;
		
		
		echo '<a href="https://plus.google.com/share?url='. $sharepath .'+'.$shareTitle.'" target="_blank"  onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;">
			'.$imgbtn.'
		</a>'; 
	
			
	}
	
	
	public function new_shorten_url($long_url=""){
		
		if(!empty($long_url)){
			
			App::import("Model", "ShortUrl");  
			$model = new ShortUrl();
			
			$long_url_array = $model->find('first',array('conditions'=>array('ShortUrl.long_url'=>$long_url)));

			if($long_url_array && count($long_url_array) > 0){
				//$this->set('SHORT_URL', $long_url_array['ShortUrl']['short_url']);
				return  $long_url_array['ShortUrl']['short_url'];
			}
			
			// Get API key from : http://code.google.com/apis/console/
			$apiKey = '926968577661';
			
			$postData = array('longUrl' => $long_url, 'key' => $apiKey);
			$jsonData = json_encode($postData);
			
			$curlObj = curl_init();
			
			curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
			curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curlObj, CURLOPT_HEADER, 0);
			curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
			curl_setopt($curlObj, CURLOPT_POST, 1);
			curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
			
			$response = curl_exec($curlObj);
			
			// Change the response json string to object
			$json = json_decode($response);
			
			curl_close($curlObj);
			if($json->id){
				$shortUrlArray = array();
				$shortUrlArray['ShortUrl']['short_url'] = $json->id;
				$shortUrlArray['ShortUrl']['long_url'] = $long_url;
				
				$model->save($shortUrlArray);
				//$this->set('SHORT_URL', $json->id);
				return  $json->id;
			}
			//$this->set('SHORT_URL', $long_url);*/
			return $long_url;
		}
		return '';
	}
	
	
	public function setstar($productId=0,$isSmall=0){
		      //$productId=(($productId)/($productId+$n))*5;
					//prd($productId);
		$blankStarImgName = 'tc_star_blank.png';
		$fillStarImgName = 'tc_star.png';
		if($isSmall==1){
			$blankStarImgName = 'tc_star_blank_s.gif';
			$fillStarImgName = 'tc_star_s.gif';
		}			
		$flag=1;
		if($productId<=0){
			while($flag<=5)
			{
				echo '<span>';
				echo $this->Html->image("ui_images/images/tca/".$blankStarImgName); 
				echo '</span>';
				$flag++;
			}
		}
		elseif($productId>=5){
			while($flag<=5)
			{
				echo '<span>';
				echo $this->Html->image("ui_images/images/tca/".$fillStarImgName); 
				echo '</span>';
				$flag++;
			}
		}				
		else{
			$i=1; 
			while($i<=$productId)
			{
				echo '<span>';
				echo $this->Html->image("ui_images/images/tca/".$fillStarImgName); 
				echo '</span>';
				$i++;
			}
			while($i<=5)
			{
				echo '<span>';
				echo $this->Html->image("ui_images/images/tca/".$blankStarImgName); 
				echo '</span>';
				$i++;
			}
		}			
	}

	public function setstar_new($productId=0,$isSmall=0){
		      //$productId=(($productId)/($productId+$n))*5;
					//prd($productId);
		$blankStarImgName = 'hpnov_unselectedstar.png';
		$fillStarImgName = 'hpnov_selectedstar.png';
		if($isSmall==1){
			$blankStarImgName = 'tc_star_blank_s.gif';
			$fillStarImgName = 'tc_star_s.gif';
		}			
		$flag=1;
		if($productId<=0){
			while($flag<=5)
			{
				echo '<span>';
				echo $this->Html->image("ui_images/images/tca/".$blankStarImgName); 
				echo '</span>';
				$flag++;
			}
		}
		elseif($productId>=5){
			while($flag<=5)
			{
				echo '<span>';
				echo $this->Html->image("ui_images/images/tca/".$fillStarImgName); 
				echo '</span>';
				$flag++;
			}
		}				
		else{
			$i=1; 
			while($i<=$productId)
			{
				echo '<span>';
				echo $this->Html->image("ui_images/images/tca/".$fillStarImgName); 
				echo '</span>';
				$i++;
			}
			while($i<=5)
			{
				echo '<span>';
				echo $this->Html->image("ui_images/images/tca/".$blankStarImgName); 
				echo '</span>';
				$i++;
			}
		}			
	}
	
	public function full_url()
	{
		$s = &$_SERVER;
		$ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
		$sp = strtolower($s['SERVER_PROTOCOL']);
		$protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
		$port = $s['SERVER_PORT'];
		$port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
		$host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : $s['SERVER_NAME'];
		return $protocol . '://' . $host . $port . $s['REQUEST_URI'];
	}
	
	public function emptyMsg($msg=NULL){
		/*No record found  --- Dharmendra*/
		echo "<div id='no_record_message'>";
		if(isset($msg) && !empty($msg))
		{
			echo $msg;
		}else{
			echo "no message found";
		}
		echo "</div>";
	}
	
	public function cms_page_text($cms_id=NULL){
				
		App::import("Model", "Cmspage");  
		$model = new Cmspage();  
		
		$data = $model->find('first',array('conditions'=>array(
																									'Cmspage.status'=>1,
																									'OR' => array(
																											array('Cmspage.id'=>$cms_id),
																											array('Cmspage.unique_name' => $cms_id),
																									)
																									)));
		if($data)
		return $data;
	}
	
	
	public function short_msg($msg=NULL,$length=NULL){
		
		$len = strlen($msg);
		if($len > $length){
			$msg = substr($msg,0,$length).'...';			
		}
		
		return $msg;
		
	}
	
	
	public function satisfiedCount($U_id=NULL){
		if($U_id){
			
			App::import("Model", "ProductRating");  
			$model = new ProductRating();  
			
			$data = $model->find('count',array('conditions'=>array('ProductRating.status'=>1,'ProductRating.satified'=>1,'ProductRating.user_id'=>$U_id)));;
			
			if($data)
			return $data;
			else
			return 0;
		}
		return false;
	}
	
	public function unsatisfiedCount($U_id=NULL){
				
		if($U_id){
			App::import("Model", "ProductRating");  
			$model = new ProductRating();  
			
			$data = $model->find('count',array('conditions'=>array('ProductRating.status'=>1,'ProductRating.satified'=>0,'ProductRating.user_id'=>$U_id)));;
			if($data)
			return $data;
			else
			return 0;
		}
		return false;
	}
	
function getagotime($date){
	$date1 = $date;
	$date2 = date('Y-m-d H:i:s');
	
	$diff = abs(strtotime($date2) - strtotime($date1)); 
	
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	
	$days_difference = floor($diff / 86400);
	$weeks = floor($days_difference / 7);
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	$hours = floor($diff / 3600);
	$minuts = floor($diff / 60);
	
	$s	=	'';
	if($years>=1){
				
		if($years>1){
			$s	=	's';
		}		
		return $years.' Year'.$s.' ago';
		
	}elseif($months>=1){
				
		if($months>1){
			$s	=	's';
		}
		return $months.' month'.$s.' ago';
		
	}elseif($weeks>=1){
				
		if($weeks>1){
			$s	=	's';
		}
		return $weeks.' week'.$s.' ago';

	}elseif($days>1){
				
		if($days>1){
			$s	=	's';
		}
		return $days.' day'.$s.' ago';
		
	}elseif($days==1){
		
		return $days.' day ago';;

	}elseif($hours>=1){
				
		if($hours>1){
			$s	=	's';
		}
		return $hours.' hour'.$s.' ago';
	
	}elseif($minuts>=1){
				
		if($minuts>1){
			$s	=	's';
		}
		return $minuts.' minute'.$s.' ago';
	
	}
	elseif($minuts<1){
		return 'few minutes ago';
	}	
}

	
	public function dateDiff($time1, $time2, $precision = 6){
		
		/* 
		*	For calculating time defferent between two date.
		*	Input : Timestamp	Output: Array of Defference
		*	Date : 20 Jan 2014 ...dk Use -Product Detail comment
		*/
		
        // If not numeric then convert texts to unix timestamps
        if (!is_int($time1)) {
            $time1 = strtotime($time1);
        }
        if (!is_int($time2)) {
            $time2 = strtotime($time2);
        }

        // If time1 is bigger than time2
        // Then swap time1 and time2
        if ($time1 > $time2) {
            $ttime = $time1;
            $time1 = $time2;
            $time2 = $ttime;
        }

        // Set up intervals and diffs arrays
        $intervals = array('year', 'month', 'day', 'hour', 'minute', 'second');
        $diffs     = array();

        // Loop thru all intervals
        foreach ($intervals as $interval) {
            // Set default diff to 0
            $diffs[$interval] = 0;
            // Create temp time from time1 and interval
            $ttime = strtotime("+1 " . $interval, $time1);
            // Loop until temp time is smaller than time2
            while ($time2 >= $ttime) {
                $time1 = $ttime;
                $diffs[$interval]++;
                // Create new temp time from time1 and interval
                $ttime = strtotime("+1 " . $interval, $time1);
            }
        }

        $count = 0;
        $times = array();
        // Loop thru all diffs
        foreach ($diffs as $interval => $value) {
            // Break if we have needed precission
            if ($count >= $precision) {
                break;
            }
            // Add value and interval
            // if value is bigger than 0
            if ($value >= 0) {
                // Add s if value is not 1
                if ($value != 1) {
                    $interval .= "s";
                }
                // Add value and interval to times array
                $times[] = $value; // . " " . $interval;
                $count++;
            }
        }

        // Return string with times
        //return implode(", ", $times);
        return $times;
    }

    public function addhttp($url) {
		if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
			$url = "http://" . $url;
		}
		return $url;
	}
	public function dateDiffInDay($start_date,$end_date = ""){
		if(empty($end_date))
			$end_date = date('Y-m-d H:i:s');
		$date_diff=strtotime($end_date) - strtotime(date('Y-m-d H:i:s', strtotime($start_date)));
		$days = floor($date_diff/(60 * 60 * 24));
		return $days;
	}

	public function readNumber($num, $depth=0)
		{
		    $num = (int)$num;
		    $retval ="";
		    if ($num < 0) // if it's any other negative, just flip it and call again
		        return "negative " + readNumber(-$num, 0);
		    if ($num > 99) // 100 and above
		    {
		        if ($num > 999) // 1000 and higher
		            $retval .= readNumber($num/1000, $depth+3);
		
		        $num %= 1000; // now we just need the last three digits
		        if ($num > 99) // as long as the first digit is not zero
		            $retval .= readNumber($num/100, 2)." hundred\n";
		        $retval .=readNumber($num%100, 1); // our last two digits                       
		    }
		    else // from 0 to 99
		    {
		        $mod = floor($num / 10);
		        if ($mod == 0) // ones place
		        {
		            if ($num == 1) $retval.="one";
		            else if ($num == 2) $retval.="two";
		            else if ($num == 3) $retval.="three";
		            else if ($num == 4) $retval.="four";
		            else if ($num == 5) $retval.="five";
		            else if ($num == 6) $retval.="six";
		            else if ($num == 7) $retval.="seven";
		            else if ($num == 8) $retval.="eight";
		            else if ($num == 9) $retval.="nine";
		        }
		        else if ($mod == 1) // if there's a one in the ten's place
		        {
		            if ($num == 10) $retval.="ten";
		            else if ($num == 11) $retval.="eleven";
		            else if ($num == 12) $retval.="twelve";
		            else if ($num == 13) $retval.="thirteen";
		            else if ($num == 14) $retval.="fourteen";
		            else if ($num == 15) $retval.="fifteen";
		            else if ($num == 16) $retval.="sixteen";
		            else if ($num == 17) $retval.="seventeen";
		            else if ($num == 18) $retval.="eighteen";
		            else if ($num == 19) $retval.="nineteen";
		        }
		        else // if there's a different number in the ten's place
		        {
		            if ($mod == 2) $retval.="twenty ";
		            else if ($mod == 3) $retval.="thirty ";
		            else if ($mod == 4) $retval.="forty ";
		            else if ($mod == 5) $retval.="fifty ";
		            else if ($mod == 6) $retval.="sixty ";
		            else if ($mod == 7) $retval.="seventy ";
		            else if ($mod == 8) $retval.="eighty ";
		            else if ($mod == 9) $retval.="ninety ";
		            if (($num % 10) != 0)
		            {
		                $retval = rtrim($retval); //get rid of space at end
		                $retval .= "-";
		            }
		            $retval.=readNumber($num % 10, 0);
		        }
		    }
		
		    if ($num != 0)
		    {
		        if ($depth == 3)
		            $retval.=" thousand\n";
		        else if ($depth == 6)
		            $retval.=" million\n";
		        if ($depth == 9)
		            $retval.=" billion\n";
		    }
		    return $retval;
		}
	
}
?>
