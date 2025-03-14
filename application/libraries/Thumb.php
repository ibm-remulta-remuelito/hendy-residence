<?php 
class Thumb
{
	function make_thumb($source_image,$destination_image_path, $max_width, $max_height) {

		if(!is_file($source_image)) return FALSE;

	    ini_set('memory_limit','512M');
	    set_time_limit(0);
	 
	    $segments         	= explode('/',$source_image);
	    $image_name         = end($segments);
	    $name_segments     	= explode('.',$image_name);
	    $ext 				= strtolower(end($name_segments));
	    $quality 			= 70;
	    
	    if(!in_array($ext, array('jpg', 'jpeg', 'gif', 'png'))) return FALSE;
	    //Set image ratio
	    $sizes = @getimagesize($source_image);
	    
	    if(!$sizes) return FALSE;
	    $width = $sizes[0];
	    $height = $sizes[1];

	    $ratio = ($width > $height) ? $max_width/$width : $max_height/$height;
	    $ratiow = $width/$max_width ;
	    $ratioh = $height/$max_height;
	    $ratio = ($ratiow > $ratioh) ? $max_width/$width : $max_height/$height;
	 
	    if($width > $max_width || $height > $max_height) {
	        $new_width = $width * $ratio;
	        $new_height = $height * $ratio;
	    } else {
	        $new_width = $width;
	        $new_height = $height;
	    }
	 
	    if ($ext == 'jpg' || $ext == 'jpeg') {
	        //JPEG type thumbnail
	        $image_p = imagecreatetruecolor($new_width, $new_height);
	        $image = imagecreatefromjpeg($source_image);
	        imageinterlace($image, true);
	        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	        imagejpeg($image_p, $destination_image_path, $quality);
	        imagedestroy($image_p);
	 
	    } elseif ($ext == 'png') {
	        //PNG type thumbnail
	        $im = imagecreatefrompng($source_image);
	        $image_p = imagecreatetruecolor ($new_width, $new_height);
	        imagealphablending($image_p, false);
	        imagecopyresampled($image_p, $im, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	        imagesavealpha($image_p, true);
	        imagepng($image_p, $destination_image_path);
	 
	    } elseif ($ext == 'gif') {
	        //GIF type thumbnail
	        $image_p = imagecreatetruecolor($new_width, $new_height);
	        $image = imagecreatefromgif($source_image);
	        $bgc = imagecolorallocate ($image_p, 255, 255, 255);
	        imagefilledrectangle ($image_p, 0, 0, $new_width, $new_height, $bgc);
	        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	        imagegif($image_p, $destination_image_path, $quality);
	        imagedestroy($image_p);
	 
	    } 
	    return is_file($destination_image_path);
	}

	function make_thumbs($source_image, $config_sizes, $dest = FALSE)
	{
		$sizes = config_item($config_sizes);

		if(!$sizes) return FALSE;

		$source_image 	= str_replace(ROOT, '', $source_image);
		$segments		= explode('/', $source_image);
		$file_name		= array_pop($segments);
		$path 			= ($dest)? str_replace(ROOT, '', $dest) : implode('/', $segments).'/';

		foreach ($sizes as $prefix => $sizes) 
		{
			$new_name = $path.$prefix.'_'.$file_name;
			//view(ROOT.$source_image);
			$this->make_thumb(ROOT.$source_image, ROOT.$new_name, $sizes[0], end($sizes));
			$return[$prefix] = $new_name;
		}
		return $return;
	}

	function remove_thumbs($source_image, $config_sizes)
	{
		$sizes = config_item($config_sizes);
		$return = array();

		if(!$sizes) return FALSE;

		$source_image 	= str_replace(ROOT, '', $source_image);
		$segments		= explode('/', $source_image);
		$file_name		= array_pop($segments);
		$path 			= implode('/', $segments).'/';

		foreach ($sizes as $prefix => $sizes) {
			$new_name = $path.$prefix.'_'.$file_name;

			if(is_file(ROOT.$new_name))
			{
				unlink(ROOT.$new_name);
				$return[$prefix] = $new_name;
			}
			
		}
		if(is_file(ROOT.$source_image))
		{
			unlink(ROOT.$source_image);
			$return[$prefix] = $source_image;
		}
		return $return;
	}

	function remove_video_file($file_path)
	{
		if(($file_path = trim($file_path)) === '')
			return false;

		$file_path = str_replace(ROOT, '', $file_path);
		if(file_exists(ROOT.$file_path))
		{
			@unlink(ROOT.$file_path);
			return true;
		}
		return false;
	}
}