<?php

class KKModel extends CI_Model
{
    public function getCountKK() {
        $query = $this->db->get('kartukeluarga');
        return $query->num_rows();
    }
}
