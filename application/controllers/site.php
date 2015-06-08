<?php

class Site extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('nativesession');
    }

    function index() // esta función será la ejecutada por defecto si sólo se accede con el nombre del controlador
    {
        $this->load->model('site_model');

        $data['titles'] = $this->site_model->getAll();

        $this->load->view('home', $data); // renderiza la vista del controlador
    }

    function restricted()
    {
        if($this->nativesession->get('user'))
        {
            $this->load->view('private');
        }
        else
        {
            $this->load->helper('url');

            redirect('/login');
        }
    }

    function data($author = null)
    {
        $this->load->model('data_model');

        if(!$author)
        {
            $author = $this->input->post('author');
        }

        $data['currentAuthor'] = $author;

        $data['rows'] = $this->data_model->getAll($author);
        $data['authors'] = $this->data_model->getAuthors();

        $this->load->view('data', $data);
    }

    function single($id)
    {
        $this->load->model('data_model');

        $data['post'] = $this->data_model->get($id);

        $this->load->view('single', $data);
    }

    function about()
    {
        $this->load->view('about');
    }

    function doSomething()
    {
        echo 'doing something';

        $this->_privateSomething();
    }

    function _privateSomething() // con un guión bajo hacemos que la función sea inaccesible desde el navegador
    {
        echo 'doing something private';
    }
}