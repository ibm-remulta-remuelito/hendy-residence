<?php
class Colliers {

	public $service;
	public $post_service;

	function __construct()
	{
		$this->service 		= 'https://crmresiws.colliers.com.au/ColliersWebService.asmx?op=ProjectSpecificEnquiries';
		$this->post_service = 'https://crmresiws.colliers.com.au/ColliersWebService.asmx/ProjectSpecificEnquiries';
	}

	function process_request($data)
	{
		unset($data['ref']);

		$envelope = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"><soap:Body><ProjectSpecificEnquiries xmlns="http://customersystems.com.au/">';

		foreach ($data as $key => $value) 
		{
			$envelope .= '<'.$key.'>'.$value.'</'.$key.'>';
		}
		$envelope .= '</ProjectSpecificEnquiries></soap:Body></soap:Envelope>';

		$ch = curl_init();

		$headers = array(
                        "Content-type: text/xml;charset=\"utf-8\"",
                        "Accept: text/xml",
                        "Cache-Control: no-cache",
                        "Pragma: no-cache",
                        "SOAPAction: http://customersystems.com.au/ProjectSpecificEnquiries",
                        "Content-length: ".strlen($envelope)
        );

		//set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_URL, $this->service);
		//curl_setopt($ch, CURLOPT_POST, count($data));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $envelope);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		// receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		//execute post
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);

		// converting
        $response1 = str_replace("<soap:Body>","",$result);
        $response2 = str_replace("</soap:Body>","",$response1);

        // convertingc to XML
        $parser = simplexml_load_string($response2);

		return TRUE;

	}

	function process_request_post($data)
	{
		unset($data['ref']);
		$post_data = urldecode(http_build_query($data));
		//view($envelope);
		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $this->post_service);
		curl_setopt($ch,CURLOPT_POST, count($data));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/x-www-form-urlencoded; charset=utf-8', 'Content-Length: '.strlen($post_data) ));
		//curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/soap+xml; charset=utf-8', 'Content-Length: '.strlen($envelope) ));
		//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
		// receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		//execute post
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);

		return TRUE;

	}

	function get_hear_options()
	{
		$return = array(
			'Communications - Colliers International E-comms' => 'Colliers Email Notice',
			'Online - Search Online' => 'Online Search',
			'Online - Realestate.com.au' => 'Realestate.com.au',
			'Online - Domain.com.au' => 'Domain.com.au',
			'Press - Other' => 'Press',
			'Signage - Signboard' => 'Signage',
			'Other' => 'Other'
		);

		return $return;
	}
}