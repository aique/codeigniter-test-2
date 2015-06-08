<?php

class Email extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->config->load('email'); // ¿es necesaria esta línea si ya se declara en el fichero autoload que se utilizará esta librería?

        $config = $this->config->item('email'); // los datos de configuración están en un fichero creado para este propósito en la carpeta config

        $this->load->library('email', $config); // se ha de cargar la librería 'email' en el fichero config/autoload.php
        $this->email->set_newline("\r\n"); // obligatorio incluir esta línea

        $this->email->from('aiquefernandez@gmail.com', 'Aique CI');
        $this->email->to('aique@q-interactiva.com');
        $this->email->subject('Email de prueba con el framework CI');
        $this->email->message('Esta funcionando!.');

        if($this->email->send())
        {
            echo 'Email enviado';
        }
        else
        {
            show_error($this->email->print_debugger());
        }
    }
}