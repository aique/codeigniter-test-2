<?php

class User_model extends CI_Model
{
    function getAll($numRows = null, $offset = null)
    {
        $users = array();

        if($numRows == null || $offset == null)
        {
            $q = $this->db->get('user');
        }
        else
        {
            $this->db->limit($numRows, $offset);

            $q = $this->db->get('user');
        }

        if($q->num_rows() > 0)
        {
            foreach($q->result() as $row)
            {
                $users[] = $this->createUserFromData($row);
            }
        }

        return $users;
    }

    function getNumAll()
    {
        $q = $this->db->get('user');

        return $q->num_rows();
    }

    function getUser($id)
    {
        $user = null;

        $q = $this->db->get_where('user', array('id' => $id));

        if($q->num_rows() > 0)
        {
            $user = $this->createUserFromData($q->row());
        }

        return $user;
    }

    function addUser($data)
    {
        $this->db->insert('user', array
        (
            'name' => $data->getName(),
            'email' => $data->getEmail(),
            'description' => $data->getDescription()
        ));

        return $this->db->insert_id();
    }

    function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', array
        (
            'email' => $data->getEmail(),
            'description' => $data->getDescription()
        ));
    }

    function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    private function createUserFromData($row)
    {
        $user = new User_Item();

        $user->setId($row->id);
        $user->setName($row->name);
        $user->setEmail($row->email);
        $user->setDescription($row->description);

        return $user;
    }
}