<?php

class PendatangModel extends CI_Model
{
    public function getCountPendatang() {
        $query = $this->db->get('pendatang');
        return $query->num_rows();
    }
}
