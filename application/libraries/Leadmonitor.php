<?php 

class Leadmonitor {
	
	public function process_request($data = FALSE)
	{
		if(!$data)
		{
			$data = $_POST;
		}
		$data['form'] 		= 'iDDzsAAbhNPpzNUT9m+uPgtEklgboh3krSGCWabNcaI=';
		$data['campaign'] 	= 'iDDzsAAbhNPpzNUT9m+uPgtEklgboh3krSGCWabNcaI=';
		foreach ($data as $key => $value) {
			$post_data['db_'.$key] = $value;
			$post_data[$key] = $value;
		}
		$post_data['db_message'] = '';
		$return = TRUE;
		$ch = curl_init('http://www.leadmonitor.com.au/_emailsave/saveemail.php');
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		if($result === FALSE)
		{
			$this->_set_error(curl_error($ch));
			$return = FALSE;
		}
		curl_close($ch);
		
		return $return;
	}

	private function _set_error($message)
	{
		$this->error = $message;
	}

	public function get_error($message)
	{
		return $this->error;
	}
}