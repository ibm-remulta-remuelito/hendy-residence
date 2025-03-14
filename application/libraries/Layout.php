<?php
class Layout
{
    /**
     * Just a shorter way of loading a view
     * 
     * @param string $path
     * @param array $data
     */
    public $page_title = FALSE;
    
    function view($path, $data = array(), $return = FALSE)
    {   
        $ci                         = &get_instance();
        $data['meta_keywords']      = '';
        $data['meta_description']   = '';
        $data['meta_title']         = '';
        $data['current_page']       = '';
       

        if (isset($data['page_redirect']) && $data['page_redirect'])
        {
            /// only redirect directly if we do not have to close any fancybox, otherwise show fancy box and close ///
            if(!isset($data['close_fancybox']) || !$data['close_fancybox'])
                redirect($data['page_redirect']);
        }  
        
        $template = ($ci->uri->segment(1) == 'admin')? 'admin/template' : 'pages/template';

        if($ci->uri->segment(1) == 'admin' && $ci->input->get('dy') == 1)
        {
            $ci->load->clear_vars();

            $data['page_content'] = $ci->load->view($path, $data, TRUE);

            $template = 'admin/light';
        }
        elseif($ci->input->get('p') == '1')
        {
            $data['form_result'] = FALSE;
            $data['css'] = isset($data['css'])? array_merge($data['css'], config_item('css')) : config_item('css');
            $data['js'] = isset($data['js'])? array_merge($data['js'], config_item('js')) : config_item('js');
            $ci->load->clear_vars();
            if ($ci->input->post('ref')) 
            {
                $data['form_result'] = $this->_contact_submission($data);
            }
            $data['page_content'] = $ci->load->view($path, $data, TRUE);
            $template = 'popup_template';
        }
        elseif($ci->uri->segment(1) != 'admin')
        {   
            $data['page_content'] = $ci->load->view($path, $data, TRUE);

            //view($this->data['css'] );
            $data['site_name']        = config_item('site_name');       
            $data['css']              = config_item('css');
            $data['js']               = config_item('js');
            $data['page_name']        = 'member';


        }
        else
        {

            $data['page_title'] = ($this->page_title) ? $this->page_title : ucwords($ci->uri->segment(2));
            $data['admin_user'] = Auth_helper::get_user();
            $data['css']        = isset($data['css'])? array_merge($data['css'], config_item('admin_css')) : config_item('admin_css');
            $data['js']         = isset($data['js'])? array_merge($data['js'], config_item('admin_js')) : config_item('admin_js');

            $ci->load->clear_vars();
            $data['page_content'] = $ci->load->view($path, $data, TRUE);
        }

        $data['template'] = $path;
        if ($return) 
        {
           return $ci->load->view($template, $data, $return);
        }
        $ci->load->view($template, $data);
    }
    
    /**
     * Just a shorter way of loading a view for light box
     * 
     * @param string $path
     * @param array $data
     */
    function light_view($path, $data = array())
    {
        $ci = &get_instance();
        $template = ($ci->uri->segment(1) == 'admin')? 'admin/lightbox_template' : 'template';
        
        $data['page_content'] = $ci->load->view($path, $data, TRUE);
        $ci->load->view($template, $data);
    }

    function popup_view($path, $data = array())
    {
        $ci = &get_instance();
        $template = 'popup_template';
        
        $data['page_content'] = $ci->load->view($path, $data, TRUE);
        $ci->load->view($template, $data);
    }

    function _contact_submission($data = FALSE) 
    {

        $ci = &get_instance();

        $form = $ci->input->post('ref'); 

        $method = '_'.$form.'_form_validation';

        if (is_callable(array($this, $method))) 
        {

            call_user_func(array($this, $method));

            $ci->form_validation->set_error_delimiters('', '<br />');
        
            if($ci->form_validation->run()) 
            {   
                
                $ci->load->library('leadmonitor');
                $leadmonitor_sent = $ci->leadmonitor->process_request($_POST);

                //$responder_sent = $this->_send_autoresponder();
                
                if($leadmonitor_sent )
                {
                    $ci->form_validation->clear_field_data();
                    //set_message('success', 'Thankyou. Your message has sent');
                    return (object) array('form_name' => $form, 'form_success' => TRUE);
                } 

            }
        }
        unset($_POST['ref']);
        return (object) array('form_name' => $form, 'form_success' => FALSE);
    }

    /**
     * Just a shorter way of loading a view for light box
     * 
     * @param string $path
     * @param array $data
     */
    public function email($path, $data = array()) 
    {
        $ci = &get_instance();
        $template = 'email/template';

        $data['page_content'] = $ci->load->view($path, $data, TRUE);
        return $ci->load->view($template, $data, TRUE);
    }

}