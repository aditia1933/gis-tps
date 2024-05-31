<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTamu extends Model
{
    //fungsi insert Data ke Database
    public function insertData($tamu)
    {
        $this->db->table('tbl_tamu')->insert($tamu);
    }

    //fungsi mengambil seluruh Data
    public function getAllData()
    {
        return $this->db->table('tbl_tamu')
        ->get()->getResultArray();
    }

    //fungsi mengedit data berdasarkan ID lokasi
    public function getDataById($id_tamu)
    {
        return $this->db->table('tbl_tamu')
        ->where('id_tamu', $id_tamu)
        ->get()->getRowArray();
    }

    //fungsi updateData ke Database
    public function updateData($tamu)
    {
        $this->db->table('tbl_tamu')
        ->where('id_tamu', $tamu['id_tamu'])
        ->update($tamu);
    }

    //fungsi Delete Data ke Database
    public function deleteData($tamu)
    {
        $this->db->table('tbl_tamu')
        ->where('id_tamu', $tamu['id_tamu'])
        ->delete($tamu);
    }
    
    public function DetailData($id_tamu)
    {
        return $this->db->table('tbl_tamu')
        ->where('id_tamu', $id_tamu)
        ->get()->getRowArray();
        $this->load->helper('url');
    }
}
