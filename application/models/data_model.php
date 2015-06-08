<?php

class Data_model extends CI_Model
{
    /**
     * Obtiene un listado de elementos de la base de datos.
     *
     * @param string $author
     *
     *      Cadena de texto opcional con el nombre del autor
     *      al de han que pertenecer los post devueltos.
     *
     * @return array
     */
    function getAll($author = null)
    {
        $this->db->select('title, author, contents'); // toma sólo los campos que se especifican en esta función para optimizar tiempos

        if($author)
        {
            $data = $this->getPostsByAuthor($author);
        }
        else
        {
            $data = $this->getAllPosts();
        }

        return $data;
    }

    private function getPostsByAuthor($author)
    {
        $data = array();

        $q = $this->db->get_where('post', array('author' => $author)); // será necesario cargar la librería 'database' en el fichero config/autoload.php

        if($q->num_rows() > 0)
        {
            foreach($q->result() as $row)
            {
                $data[] = $row;
            }
        }

        return $data;
    }

    private function getAllPosts()
    {
        $data = array();

        $q = $this->db->get('post'); // será necesario cargar la librería 'database' en el fichero config/autoload.php

        if($q->num_rows() > 0)
        {
            foreach($q->result() as $row)
            {
                $data[] = $row;
            }
        }

        return $data;
    }

    /**
     * Obtiene un elemento concreto de la base de datos cuyo
     * identificador recibe como parámetro.
     *
     * @param $id
     *
     *      Número entero que representa el identificador del
     *      elemento a recuperar.
     *
     * @return null
     */
    function get($id)
    {
        $this->db->select('title, author, contents');

        $data = null;

        if($id)
        {
            $q = $this->db->get_where('post', array('id' => $id));

            if($q->num_rows() > 0)
            {
                $data = $q->row();
            }
        }

        return $data;
    }

    /**
     * Obtiene todos los autores de los post.
     *
     * @return array
     */
    function getAuthors()
    {
        $this->db->select('author');

        $authors = array();

        $q = $this->db->group_by('author')->get('post');

        if($q->num_rows() > 0)
        {
            foreach($q->result() as $row)
            {
                $authors[] = $row->author;
            }
        }

        return $authors;
    }
}