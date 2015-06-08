<?php

class Files extends CI_Controller
{
    private $filePath;

    function __construct()
    {
        parent:: __construct();

        $this->load->helper('file');

        $this->filePath = FCPATH . '../logs/test.txt';
    }

    function write()
    {
        $data = 'Hello world';

        write_file($this->filePath, $data); // escribe un texto a fichero

        echo "finished writing";
    }

    function read()
    {
        echo read_file($this->filePath); // lee el contenido de un fichero y lo muestra por pantalla
    }

    /**
     * Fuerza la descarga de un fichero para atender la petición
     * cuyo contenido será copiado de un fichero ya existente.
     */
    function download()
    {
        $this->load->helper('download');

        force_download('Log.txt', read_file($this->filePath));
    }
}