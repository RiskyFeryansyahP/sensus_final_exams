<?php

class PendudukModel extends CI_Model
{
    public function getAllPenduduk() {
        $query = $this->db->get('penduduk');
        return $query->result_array();
    }
}
