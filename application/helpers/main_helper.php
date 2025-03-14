<?php

function view($data, $die = TRUE)
{
    $ci = &get_instance();
    if($ci->input->ip_address() == '::1')
    {
    	echo '<pre>'.print_r($data, TRUE).'</pre>';
		if ($die) die;
    } 	
}


/**
 * Encode a string safe for passing through url
 * basic level but do-able
 * @param string $data
 * @return string
 */
function encode($data) {
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function decode($data) {
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
} 

function referer()
{
	$CI =& get_instance();
	return $CI->session->userdata('referer');
}

/**
 * gets the site notifacitions
 * @return String
 */
function get_message(){

	$CI =& get_instance();
	
	$message = $CI->session->userdata('message');
	$class = $CI->session->userdata('class');
	$timer = $CI->session->userdata('timer');
	$CI->session->set_userdata(array('class' => NULL, 'message' => NULL, 'timer' => NULL));

	$wrapper = 'container';

	return ($message && $class)?  '<div id="notifications"><div class="'.$class.'" id="info-box" data-timeout="'.$timer.'"><div class="'.$wrapper.'"><span class="txt-responsive-xs">'.$message.'</span><i class="fui-cross glyphicon glyphicon-remove notification-close"></i></div></div></div>' : FALSE;
}

/**
 * Sets the site notifacitions
 * 
 * @param string $class = 'error', 'success', 'info', 'warning'
 * @param string $message = the message you wish to infoem the user
 */
function set_message($class = 'error', $message = NULL, $timer = NULL){

	$CI =& get_instance();
	$CI->session->set_userdata(array('class' => $class, 'message' => $message, 'timer' => $timer));
}


function get_form_message()
{

	$CI =& get_instance();
	
	$message = $CI->session->userdata('form_message');
	$class = $CI->session->userdata('form_class');
	//$timer = $CI->session->userdata('form_timer');
	$CI->session->set_userdata(array('form_class' => NULL, 'form_message' => NULL));
	
	//$wrapper = ($CI->uri->segment(1) != 'admin')? 'container' : '';
	return ($message && $class) ?  (object) array('class'=>$class, 'message'=>$message) : FALSE;
	
}

/**
 * Sets the site notifacitions
 * 
 * @param string $class = 'error', 'success', 'info', 'warning'
 * @param string $message = the message you wish to infoem the user
 */
function set_form_message($class = 'error', $message = NULL) 
{
	$CI =& get_instance();
	$CI->session->set_userdata(array('form_class' => $class, 'form_message' => $message));
}





/**
 * Pass a string and it will return a string of key words
 * 
 * @param type $content = the string in which to process keywords
 * @param string $limit = limit the amount of keywords
 * @param array $ignore = words to ignore
 * @return string a sites keywords
 */
function generate_keywords($content, $limit = '20', $ignore = array()) 
{
	
	if(!$content) return '';
	$ignore = array( "a", "all", "am", "an", "and", "any", "are", "as", "at", "be", "but", "can", "did", "do", "does", "for", "from", "had", "has", "have", "here", "how", "i", "if", "in", "is", "it", "no", "not", "of", "on", "or", "so", "that", "the", "then", "there", "this", "to", "too", "up", "use", "what", "when", "where", "who", "why", "you" );
	
	// extend common ignore words
	$ignore += array('gajshost', 'the', 'to', 'their', 'of', 'a', 'be' ,'and','is','in','or','that','for','will','over','as','when','on','can','with','your','are','at','not','you','using','each','end','this','used','may','by','if','any','same','gap','an','it','use','being','allow','side','so','we','long','edge','have','make','ends','occur','down','up','run','from','all','one','amp','fix','do','them','more','need','out','off','must','than');
	
	$ignore = array_unique($ignore);
	
	// strip out any 'ignore' words from our specified keywords.
	$keywords = 'urbanedge homes, homes, new build';
	$keyword_array = explode(',', $keywords);
	if($keyword_array) foreach($keyword_array as $word) if(in_array($word, $ignore)) unset($ignore[$word]);

	// clean and parse our input.
	$words = array_unique(array_filter(explode(' ', strtolower(trim(htmlentities(preg_replace('/[^a-z0-9\\\\040]/i', ' ', strip_tags(trim($content)))))))));

	@$keys & $out = array();

	// loop over our founds words, and create a new array or words with scores
	foreach($words as $word) 
	{

		if(is_numeric($word))
		{
			unset($word);
			continue;
		}

		// we dont want short words
		if(strlen($word) <= 3)
		{
			unset($word);
			continue;
		}
		// Ignore common words
		if(!in_array($word, $ignore)) @$keys[$word]++;
		// if this is a specified 'keyword' increase its score by one.
		if(in_array($word, $keyword_array)) @$keys[$word]++;
	}

	// this should already be done,  but just making sure.
	@array_unique($keys);
	// order our array by the highest score
	@array_multisort($keys, SORT_NUMERIC, SORT_DESC);
	// knock off the first record - a space ' '.
	@array_shift($keys);

	// create our final list of keywords and scores
	$key   = 0;
	$total = count($keys);
	$limit = ($total > $limit)?$limit:$total;
	if($keys) 
	{
		foreach($keys as $keyword => $count) 
		{
			$out[$keyword] = $count; $key++;
			if($key==$limit) break;
		} 
	}
	$control = '';
	// output.
	foreach($out as $name => $score) $control .= ','. $name;
	
	return substr($control, 1);
}

function blog_url($segments = FALSE)
{
	$ci     = &get_instance();
	$query 	= $ci->db->query("SELECT permalink FROM pages WHERE template = ? LIMIT 1", array('blog'));

	if($query->num_rows() == 0) return '';
	return ($segments)? trim($query->row()->permalink,'/').'/'.trim($segments, '/').'/' : trim($query->row()->permalink,'/').'/';
	//return ($query->num_rows() > 0)? $query->row()->permalink : '';
}

function project_url($segments = FALSE)
{
	$ci     = &get_instance();
	$query 	= $ci->db->query("SELECT permalink FROM pages WHERE template = ? LIMIT 1", array('projects'));

	if($query->num_rows() == 0) return '';
	return ($segments)? trim($query->row()->permalink,'/').'/'.trim($segments, '/').'/' : trim($query->row()->permalink,'/').'/';
	//return ($query->num_rows() > 0)? $query->row()->permalink : '';
}
/**
 * return if someone has access
 * 
 * @return bool
 */
function local_ajax()
{
    $ci     = &get_instance();
    $ajax   = $ci->input->is_ajax_request();
    $ref    = $ci->agent->is_referral();
    
    return $ajax;//(bool)($ajax || $ref === TRUE);
}

function is_ajax()
{
    $ci     = &get_instance();    
    return $ci->input->is_ajax_request();
}

function whole_number($number = FALSE, $default = FALSE, $decimals = 0)
{
    if(!$number) return $default;
    $number = round($number);
    return number_format($number,$decimals,'.',',');
}

// Round to the custom whole number.
// eg: 5.89 = 5, 5.90 = 6
function round_int($number = FALSE, $default = FALSE)
{
	$segments = explode('.', $number);
	if(count($segments) > 0)
	{
		//view($number);
		$whole = (int)$segments[0];
		$float = '.'.end($segments);
		return ((float)$float > .89)? $whole + 1 : $whole;
	}
    return $number;
}

function dp($number = FALSE, $default = 0.00)
{
	if(!$number) return $default;
    return sprintf('%0.2f',round($number, 2)); // truncate 2dp
}

function clean_num($number = 0, $default = '')
{
	if($number == 0) return $default;
	return round($number, 2);
	//return sprintf('%0.2f',$number); // truncate 2dp
	//return rtrim(rtrim($number, "0"),"."); // truncate trailing zeros - check data type - not for int
}

function formate_date($format = FALSE, $date = FALSE)
{
    if(!$format) $format = 'Y-m-d H:i:s';
    if($date)
    {
    	if(is_int(($date)))
    		$clean_date = date_timestamp_set(new DateTime(), $date);
    	else
    		$clean_date = date_timestamp_set(new DateTime(), strtotime($date));
    }
    else
    {
    	$clean_date = new DateTime('now');
    }
    return $clean_date->format($format);
}

/**
 * 
 * @param string $house_safe_name
 * @param boolean $root_path = (true)ROOT : (false)base_url
 * @return boolean | string
 */
function house_assets($house_safe_name = FALSE, $root_path = FALSE, $return = FALSE)
{
    $base_path = (($root_path)? ROOT : base_url()).'assets/media/homes/';
    
    if($house_safe_name) return $base_path.$house_safe_name.'/';    
    return ($return)? $base_path : FALSE;
}

function make_folder($path)
{
    $made = file_exists($path);
    
    if(!$made)
    {
        $made = @mkdir($path, 0755, TRUE);
    }
    return $made;
}

function display_image($path, $prefix = FALSE, $end = FALSE){
	if(!$prefix) return base_url($path);

	$paths 		= explode('/', $path);
	$image 		= array_pop($paths);

	if($end) 
	{
		$segments 	= explode('.', $image);
		$ext 		= array_pop($segments);
		$new_path 	= implode('/', $paths).'/'.implode('.', $segments).$prefix.'.'.$ext;
	}
	else
	{
		$new_path 	= implode('/', $paths).'/'.$prefix.$image;
	}

	return base_url($new_path);

}

function display_video($mp4_path = '', $webm_path = '')
{
	$videoLink = '';
	if((($mp4_path = trim($mp4_path)) !== '') || (($webm_path = trim($webm_path)) !== ''))
	{	 
		$videoLink = '<video class = "video" loop = "" width = "768">'.
						(($mp4_path !== '') ? '<source src = "'.base_url($mp4_path).'" type = "video/mp4">' : '').
						(($webm_path !== '') ? '<source src = "'.base_url($webm_path).'" type = "video/webm">' : '').
					 '</video>';
	}
	return $videoLink;
}

function tip($message = FALSE)
{
	$html = '<span class="tip" data-toggle="tooltip" data-placement="top" title="'.$message.'"><img src="'.base_url('assets/admin/images/icon/msg_info.png').'" /></span>';
	return $html;
}

function ip_to_location()
{
	$ci 			=& get_instance();
	$ip 			= $ci->input->ip_address();
	$details 		= json_decode(file_get_contents("http://ipinfo.io/".$ip."/json"));
	//$details 		= var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip)));
	view($details);
	return $details;
}

/**
 * Requires geocoding DB
 */
function lat_lng_to_address($lat,$lng = FALSE)
{
	$latlng 	= ($lng)? trim($lat).','.trim($lng) : $lat;
	$storage 	= explode(',', $latlng);
	$ci 		= &get_instance();
	//view($storage);
	$ci->db->where('latitude', $storage[0]);
	$ci->db->where('longitude', $storage[1]);
	$query = $ci->db->get('geocoding', 1);
	if($query->num_rows() == 1)
	{
		return $query->row()->address;
	}

	$url 		= 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$latlng.'&sensor=false';
	$json 		= @file_get_contents($url);
	$data 		= json_decode($json);

	//view($data->results[0]->formatted_address);
	if(@$data->status=="OK")
	{
		// $ci->db->set('latitude', $storage[0]);
		// $ci->db->set('longitude', $storage[1]);
		// $ci->db->set('address', $data->results[0]->formatted_address);
		// $ci->db->insert('geocoding');

		return $data->results[0];
	}
	return FALSE;
	
	
}

function full_url()
{
    $CI =& get_instance();

    $url = $CI->config->site_url($CI->uri->uri_string());
    return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
}

class Input_helper
{
	static public function heading($title = '')
	{
		$html = '<div class="row">
			<div class="col-xs-60 col-sm-60">
			 	<div class="txt-responsive-lg txt-light bg-dark-grey txt-white pd-all-md pd-t-sm pd-b-sm txt-white col-sm-60">	
			 		'.$title.'
			 	</div>
		 	</div>
		</div>';
		return $html;
	}
}


function filter_blurb($content, $limit = 384)
{
	if (!$content)
	{
		return false;
	}
	//$str = $content;
	$str = strip_tags($content);
	//var_dump($str);
	//$str = str_replace("\n", '<span class="custom-br"></span>', strip_tags($content));
	
	//if ($limit) return nl2br(character_limiter($str, $limit));
	if ($limit) return str_replace("\n", '<span class="custom-br"></span>', character_limiter($str, $limit));

	//return nl2br($str);
	return str_replace("\n", '<span class="custom-br"></span>', $str);
}

function translate_media_position($media_position_id)
{
	if (!$media_position_id)
		return false;

	$hmpConfig = config_item('house_media_position');
	return array_search(trim($media_position_id), $hmpConfig);
}

function get_geo_location_distance($latitude1, $longitude1, $latitude2, $longitude2)
{  
    // $earth_radius = 6371;

    // $dLat = deg2rad( $latitude2 - $latitude1 );  
    // $dLon = deg2rad( $longitude2 - $longitude1 );  

    // $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);  
    // $c = 2 * asin(sqrt($a));  
    // $d = $earth_radius * $c;  

    // return $d; 


 //    $lat_origin = 56.130366;
	// $long_origin = -106.34677099999;

	// $lat_dest = 57.223366;
	// $long_dest = -106.34675644699;

	$radius      = 3958;      # Earth's radius (miles, convert to meters)
	$deg_per_rad = 57.29578;  # Number of degrees/radian (for conversion)

	$distance = ($radius * pi() * sqrt(
	            ($latitude1 - $latitude2)
	            * ($latitude1 - $latitude2)
	            + cos($latitude1 / $deg_per_rad)  # Convert these to
	            * cos($latitude2 / $deg_per_rad)    # radians for cos()
	            * ($longitude1 - $longitude2)
	            * ($longitude1 - $longitude2)
	    ) / 180); 
	return $distance;
}

function format_phone_number($number = FALSE)
{
	if ($number)
	{
		$number = str_replace(' ', '', $number);
		$formatted_number = $number;

		if (strlen($number) == 8)
		{
			$formatted_number = substr_replace($number, ' ', 4, 0);
		}
		
		if (strlen($number) == 10)
		{
			if (substr($number, 0, 2) == '04')
			{
				$formatted_number = substr_replace($number, ' ', 7, 0);
				$formatted_number = substr_replace($formatted_number, ' ', 4, 0);
			}
			else
			{
				$formatted_number = substr_replace($number, ' ', 6, 0);
				$formatted_number = substr_replace($formatted_number, ' ', 2, 0);
			}
		}
		
		if (strlen($number) == 11)
		{
			$formatted_number = substr_replace($number, ' ', 7, 0);
			$formatted_number = substr_replace($formatted_number, ' ', 3, 0);
		}
		
		if (strlen($number) == 12)
		{
			$formatted_number = substr_replace($number, ' ', 8, 0);
			$formatted_number = substr_replace($formatted_number, ' ', 4, 0);
		}

		return $formatted_number;
	}

}

function safe_phone_number($number = FALSE)
{
	if ($number)
	{
		return preg_replace('/[- ]/', '', $number);
	}
}

function format_external_video_link($external_video_link)
{
	if(($external_video_link = trim($external_video_link)) === '')
		return '';

	$url = parse_url($external_video_link);
	if(!isset($url['scheme']) || trim($url['scheme']) === '')
		$external_video_link = 'http://'.ltrim($external_video_link, '/');

	return $external_video_link;

}

/// this function is specifically for youtbe/vimeo videos being sent from realestataview for a property
///****************************************************************************************************************************************
/// It will convert youtube video URLs from http://youtu.be/9ySXjlmsmaw TO http://www.youtube.com/embed/9ySXjlmsmaw 
/// It will also convert URL http://www.youtube.com/watch?v=lNdMd8eRwCI&feature=youtu.be to http://www.youtube.com/embed/lNdMd8eRwCI
///****************************************************************************************************************************************
/// It will also convert URL http://vimeo.com/70005329  to http://player.vimeo.com/video/70005329
///****************************************************************************************************************************************
function rectify_youtube_url($videoURL)
{
	$urlArray = parse_url($videoURL);
	if(isset($urlArray['host']) && trim($urlArray['host']) !== '')
	{	
		if(stripos($urlArray['host'], 'youtube') !== false || stripos($urlArray['host'], 'youtu.be') !== false)
		{
			$videoId = '';

			if(isset($urlArray['query']) && trim($urlArray['query']) !== '')
			{
				parse_str($urlArray['query']);
				if(isset($v) && trim($v) !== '')
					$videoId = trim($v);		
			}	
			else
			{
				if(isset($urlArray['path']) && ($videoId = trim($urlArray['path'])) !== '' && strpos($videoId, 'embed') === false)
				{
					if(strpos($videoId, '/') !== false)
						$videoId = substr($videoId, 1);
				}
				else
					$videoId = '';
			}

			if($videoId)
				$videoURL = 'http://www.youtube.com/embed/'.$videoId;
		}
		else if(stripos($urlArray['host'], 'vimeo') !== false && stripos($urlArray['host'], 'player') === false)
		{
			if(isset($urlArray['path']) && ($videoId = trim($urlArray['path'])) !== '' && stripos($videoId, 'video') === false)
			{
				$videoId = rtrim(ltrim($videoId, '/'), '/');
				if($videoId)
					$videoURL = "http://player.vimeo.com/video/".$videoId;
			}
		}
	}	
	
	return $videoURL;
}

function get_file_extension($fileFullPath)
{
	$fileFullPath = rtrim(ltrim(trim($fileFullPath), '/'), '/');
	$fileName = end(explode("/", $fileFullPath));
	$extension = end(explode(".", $fileName));
	return $extension;
}

function gallery_message()
{
	return '
	<div class="txt-responsive-xxs col-xs-48 mg-t-xs">
		All images must be no bigger than 1600px wide, and less than 2mb in file size.
	</div>
	';
}


function convert_number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return $string;
}

