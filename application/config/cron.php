<?php if ( ! defined('CRON')) exit('CLI script access allowed only'');

/*
|--------------------------------------------------------------------------
| CRON Configuration
|--------------------------------------------------------------------------
*/

$config['SERVER_NAME'] 		= 'www.example.com';						// Your web site url
$config['CRON_TIME_LIMIT']	= 0;										// 0 = no time limit
$config['argv']				= array(									// Over-ride CLI parameters 
								1		=> 'run_cron/all'
							);
$config['CRON_BETA_MODE']	= false;									// Beta Mode (useful for blocking submissions for testing)
