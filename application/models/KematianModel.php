<?php

class KematianModel extends CI_Model
{
    public function getCountKematian() {
        $query = $this->db->get('kematian');
        return $query->num_rows();
    }

    public function getAllKematian() {
        $query = $this->db->get('kematian');
        return $query->result_array();
    }

    public function addDataKematian($nik, $tglkematian, $penyebab) {
        $data = array(
            'nik' => $nik,
            'tgl_kematian' => $tglkematian,
            'penyebab' => $penyebab
        );

        $query = $this->db->insert('kematian', $data);
        return $query;
    }

    public function editDataKematian($nokematian, $nik, $tglkematian, $penyebab) {
        $this->db->set('nik', $nik);
        $this->db->set('tgl_kematian', $tglkematian);
        $this->db->set('penyebab', $penyebab);
        $this->db->where('no_kematian', $nokematian);

        $query = $this->db->update('kematian');
        return $query;
    }

    public function deleteDataKematian($nokematian) {
        $query = $this->db->delete('kematian', array('no_kematian' => $nokematian));
        return $query;
    }
}
