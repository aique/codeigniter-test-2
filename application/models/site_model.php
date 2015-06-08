<?php

class Site_model extends CI_Model
{
    function getAll()
    {
        $data = array();

        $q = $this->db->get('test'); // será necesario cargar la librería 'database' en el fichero config/autoload.php

        if($q->num_rows() > 0)
        {
            foreach($q->result() as $row)
            {
                $data[] = $row;
            }
        }

        return $data;
    }
}