<?php

class AuthModel extends CI_Model
{
    public function signin($id, $password) {
        $query = $this->db->get_where('users', array('no_petugas' => $id, 'password' => $password));
        return $query->num_rows();
    }
}
