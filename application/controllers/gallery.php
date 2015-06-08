<?php

class Gallery extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('gallery_model');

        $this->output->enable_profiler(true);
    }

    function index()
    {
        $data = array();

        try
        {
            if($this->input->post())
            {
                $this->gallery_model->do_upload();
            }
        }
        catch(Exception $ex)
        {
            $data['error'] = $ex->getMessage();
        }

        $this->benchmark->mark('recuperacion_imagenes_start');
        $data['images'] = $this->gallery_model->getImages();
        $this->benchmark->mark('recuperacion_imagenes_end');

        $this->load->view('gallery/gallery', $data);
    }
}