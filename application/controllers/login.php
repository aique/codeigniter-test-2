<?php

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('nativesession');
    }

    function index()
    {
        if($this->nativesession->get('user'))
        {
            $this->load->view('private');
        }
        else
        {
            $this->_validateUser();
        }
    }

    function logout()
    {
        $this->nativesession->delete('user');

        $this->index();
    }

    function _validateUser()
    {
        $this->load->model('user_model');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('login_name', 'nombre', 'required');
        $this->form_validation->set_rules('login_pass', 'password', 'required');

        $name = $this->input->post('login_name');

        if($this->form_validation->run())
        {
            $user = new User_Item();

            $user->setName($name);

            $this->nativesession->set('user', $user);

            $this->load->view('private');
        }
        else
        {
            $data['name'] = $name;

            $this->load->view('login', $data);
        }
    }
}