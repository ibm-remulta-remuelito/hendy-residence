<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader
{
    public function clear_vars()
    {
        $this->_ci_cached_vars = array();
    }
} 