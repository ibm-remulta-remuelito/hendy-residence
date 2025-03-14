<?php class Auth_helper {
    
    static $current_user = FALSE;
           
    static function encript_password($password = FALSE)
    {
        return sha1($password.config_item('encryption_key')); 
    }
}