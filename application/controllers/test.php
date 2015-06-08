<?php

class Test extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->output->enable_profiler(true);
    }

    function index()
    {
        $this->load->view('test');
    }
}