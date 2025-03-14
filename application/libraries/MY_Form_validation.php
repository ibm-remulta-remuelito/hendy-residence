<?php

/**
* 
*/
class MY_Form_validation extends CI_Form_validation
{
	public function __construct($rules = array())
	{
		parent::__construct($rules);
		//$this->CI->lang->load('MY_form_validation');
	}

	function input_validations()
	{
		$html = FALSE;
		$fields = $this->_error_array;

		if($fields)
		{
			// foreach ($fields as $key => $value) {
				
			// }
			$html = '<script type="text/javascript"> $(document).ready(function() { scroll_to("enquireform"); });</script>';
		}
		return $html;
		//view($this->_field_data);
	}

	function show_validation_errors()
	{
		$html = FALSE;
		$fields = $this->_error_array;
		//view($fields);
		if($fields)
		{
			foreach ($fields as $key => $value) {
				$html .= '<script type="text/javascript"> $(document).ready(function() { $("*[name='.$key.']").addClass("validation-error"); });</script>';
			}
		}
		return $html;
	}

	function phone_number($str_in)
	{
		if (! preg_match("/^([-0-9_ ])+$/i", $str_in))
	    {
	        $this->set_message('phone_number', 'The %s field may only contain numeric values and spaces.');
	        return FALSE;
	    }
	    else
	    {
	        return TRUE;
	    }
	}

	public function clear_field_data()
	{
		$this->_field_data = array();
	}

	//form validation callback function
    function check_lolly($field, $lolly)
    {
        if ($field != $lolly)
        {
            $this->form_validation->set_message('check_lolly', 'The Validation field does not match');
            return FALSE;
        }
        else
        {
            return TRUE;
        }

    }

}