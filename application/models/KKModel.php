<?php

class KKModel extends CI_Model
{
    public function getCountKK() {
        $query = $this->db->get('kartukeluarga');
        return $query->num_rows();
    }

    public function getAllKK() {
        $query = $this->db->get('kartukeluarga');
        return $query->result_array();
    }

    public function addDataKK($nokk, $nik, $status, $ayah, $ibu) {
        $data = array(
            'no_kk' => $nokk,
            'nik' => $nik,
            'status_dalam_keluarga' => $status,
            'ayah' => $ayah,
            'ibu' => $ibu
        );

        $query = $this->db->insert('kartukeluarga', $data);
        return $query;
    }

    public function editDataKK($id, $nokk, $nik, $status, $ayah, $ibu) {
        $this->db->set('no_kk', $nokk);
        $this->db->set('nik', $nik);
        $this->db->set('status_dalam_keluarga', $status);
        $this->db->set('ayah', $ayah);
        $this->db->set('ibu', $ibu);
        $this->db->where('id', $id);

        $query = $this->db->update('kartukeluarga');
        return $query;

    }

    public function deleteDataKK($id) {
        $data = array('id' => $id);
        $query = $this->db->delete('kartukeluarga', $data);
        return $query;
    }
}
