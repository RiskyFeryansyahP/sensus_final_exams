<?php

class PendudukModel extends CI_Model
{
    public function getAllPenduduk() {
        $query = $this->db->get('penduduk');
        return $query->result_array();
    }

    public function getSpecificationPenduduk($nik) {
        $query = $this->db->get_where('penduduk', array('nik' => $nik));
        return $query->result_array();
    }

    public function editDataPenduduk($nik, $nama, $tempat, $tgl, $jk, $rtrw, $pekerjaan, $kewarganegaraan, $pendidikanterakhir, $agama, $golongandarah) {
        $this->db->set('nama', $nama);
        $this->db->set('tempat', $tempat);
        $this->db->set('tgl_lahir', $tgl);
        $this->db->set('JK', $jk);
        $this->db->set('RT/RW', $rtrw);
        $this->db->set('pekerjaan', $pekerjaan);
        $this->db->set('kewarganegaraan', $kewarganegaraan);
        $this->db->set('pendidikan_terakhir', $pendidikanterakhir);
        $this->db->set('agama', $agama);
        $this->db->set('gol_darah', $golongandarah);
        $this->db->where('nik', $nik);
        
        $query = $this->db->update('penduduk');

        return $query;
    }

    public function saveDataPenduduk($nik, $nama, $tempat, $tgl, $jk, $rtrw, $pekerjaan, $kewarganegaraan, $pendidikanterakhir, $agama, $golongandarah) {
        $data = array(
            'nik' => $nik,
            'nama' => $nama,
            'tempat' => $tempat,
            'tgl_lahir' => $tgl,
            'JK' => $jk,
            'RT/RW' => $rtrw,
            'pekerjaan' => $pekerjaan,
            'kewarganegaraan' => $kewarganegaraan,
            'pendidikan_terakhir' => $pendidikanterakhir,
            'agama' => $agama,
            'gol_darah' => $golongandarah 
        );

        $query = $this->db->insert('penduduk', $data);
        return $query;
    }
}
