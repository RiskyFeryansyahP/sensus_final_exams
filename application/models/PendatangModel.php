<?php

class PendatangModel extends CI_Model
{
    public function getCountPendatang() {
        $query = $this->db->get('pendatang');
        return $query->num_rows();
    }

    public function getAllPendatang() {
        $query = $this->db->get('pendatang');
        return $query->result_array();
    }

    public function addPendatang($nik, $tgldatang, $alamatasal, $alamatsekarang) {
        $data = array(
            'nik' => $nik,
            'tgl_datang' => $tgldatang,
            'alamat_asal' => $alamatasal,
            'alamat_sekarang' => $alamatsekarang
        );

        $query = $this->db->insert('pendatang', $data);
        return $query;
    }

    public function editPendatang($nopendatang, $nik, $tgldatang, $alamatasal, $alamatsekarang) {
        $this->db->set('nik', $nik);
        $this->db->set('tgl_datang', $tgldatang);
        $this->db->set('alamat_asal', $alamatasal);
        $this->db->set('alamat_sekarang', $alamatsekarang);
        $this->db->where('no_pendatang', $nopendatang);

        $query = $this->db->update('pendatang');
        return $query;
    }

    public function deletePendatang($nopendatang) {
        $query = $this->db->delete('pendatang', array('no_pendatang' => $nopendatang));
        return $query;
    }
}
