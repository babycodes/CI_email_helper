<?php
// put this in you controller
public function sample(){
    $this->load->helper('send_email');
    $message_config = [
        'htmlContent' => $this->load->view('html_template',$email_data),
        'recipients'  => 'email_recipients@mail.com',
        'subject'     => 'your subject',
        'message'     => your success message // $this->session->set_flashdata(),
    ];
    
    //this function have 2 parameters 1: $config, 2: redirect page (optional);
    
    // you can use this with redirect page
    sendEmail($message_config, 'user/login' );

    // or without redirect page
    sendEmail($message_config); 
}