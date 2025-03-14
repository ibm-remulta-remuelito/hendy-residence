<?php

class MY_Exceptions extends CI_Exceptions
{
	public function __construct()
	{
		parent::__construct();
	}
	
	// public function show_404($page = "", $doLogError = TRUE)
	// {
	// 	header("HTTP/1.1 404 Not Found");
	// 	$ci = &get_instance();
	// 	$ci->load->model('page');
	// 	$data['row'] = $ci->page->get_permalink('404');

	// 	if($data['row'] === false)
	// 		$data['test'] = '<div class="container mg-t-lg">The Requested Page Is Not Found!</div>';
	// 	else 
	// 		$data['test']   = $ci->page->render_page($data['row']);

 //        $view = $ci->layout->view('errors/page_not_found', $data, TRUE);
 //        echo $view;
	// }
}