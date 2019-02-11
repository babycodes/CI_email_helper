<?php
if(!function_exists('sendEmail')){
	function sendEmail($message_config=[], $redirect = FALSE)	
	{
		$CI = get_instance();
		$config['protocol']  = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "your@email.com"; //your real email
        $config['smtp_pass'] = "your email password"; //your real email password
        $config['charset']   = "utf-8";
        $config['mailtype']  = "html";
        $config['newline']   = "\r\n";
        $config['starttls']  = TRUE;
        
        
        $CI->email->initialize($config);
		$CI->email->from('your@email.com', 'your company name');// change to your email and company name As aliases
		$CI->email->to($message_config['recipients']); //return recipients from parameter $message_config[]
        $CI->email->subject($message_config['subject']); //return subject from parameter $message_config[]
        $CI->email->message($message_config['htmlContent']); //return html content from parameter $message_config[]
        if ($CI->email->send()) {
            // if email success
            // return flashdata
            successMessage($message_config['success_message']); //return success_messag form parameter $message_config[]
            // if redirect
            if($redirect){
                // redirected to redirect page
				redirect($redirect);
            }
        } else {
            show_error($CI->email->print_debugger());
        }
	}
}

if(!function_exists('successMessage')){
	function successMessage($message)
	{
		return $message; //return flashdata message
	}
}