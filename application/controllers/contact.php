<?php

class Contact extends CI_Controller
{
    function index()
    {
        $this->load->view('contact/contact');
    }

    function submit()
    {
        $isAjax = $this->input->post('ajax');

        if($isAjax)
        {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('result' => 'success')));
        }
        else
        {

        }
    }
}