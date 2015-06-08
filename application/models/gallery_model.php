<?php

class Gallery_model extends CI_Model
{
    private $path; // dirección de la carpeta de imágenes para el sistema de ficheros
    private $url; // dirección de la carpeta de imágenes para el acceso mediante navegador

    function __construct()
    {
        parent::__construct();

        $this->path = FCPATH . '/resources/img';
        $this->url = '/resources/img';
    }

    function do_upload()
    {
        $imgData = $this->uploadImage();
        $this->generateThumb($imgData);
    }

    function uploadImage()
    {
        $config = array
        (
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->path
        );

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('file'))
        {
            throw new Exception($this->upload->display_errors());
        }

        return $this->upload->data();
    }

    function generateThumb($imgData)
    {
        $config = array
        (
            'source_image' => $imgData['full_path'],
            'new_image' => $this->path.'/thumb',
            'maintain_ration' => true,
            'width' => 150,
            'height' => 100
        );

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

    function getImages()
    {
        $files = scandir($this->path);
        $files = array_diff($files, array('.', '..', 'thumb')); // se eliminan estos elementos del anterior array para obtener únicamente las imágenes

        $images = array();

        foreach($files as $file)
        {
            $images[] = array
            (
                'url' => $this->url . $file,
                'thumb' => $this->url . '/thumb/' . $file
            );
        }

        return $images;
    }
}