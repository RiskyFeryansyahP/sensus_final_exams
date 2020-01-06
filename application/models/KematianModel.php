<?php

class KematianModel extends CI_Model
{
    public function getCountKematian() {
        $query = $this->db->get('kematian');
        return $query->num_rows();
    }
}
