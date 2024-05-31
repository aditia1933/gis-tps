<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLokasi extends Model
{
    //fungsi insert Data ke Database
    public function insertData($data)
    {
        $this->db->table('tbl_lokasi')->insert($data);
    }

    //fungsi mengambil seluruh Data
    public function getAllData()
    {
        return $this->db->table('tbl_lokasi')
        ->get()->getResultArray();
    }

    //fungsi mengedit data berdasarkan ID lokasi
    public function getDataById($id_lokasi)
    {
        return $this->db->table('tbl_lokasi')
        ->where('id_lokasi', $id_lokasi)
        ->get()->getRowArray();
    }

    //fungsi updateData ke Database
    public function updateData($data)
    {
        $this->db->table('tbl_lokasi')
        ->where('id_lokasi', $data['id_lokasi'])
        ->update($data);
    }

    //fungsi Delete Data ke Database
    public function deleteData($data)
    {
        $this->db->table('tbl_lokasi')
        ->where('id_lokasi', $data['id_lokasi'])
        ->delete($data);
    }
    
    public function DetailData($id_lokasi)
    {
        return $this->db->table('tbl_lokasi')
        ->where('id_lokasi', $id_lokasi)
        ->get()->getRowArray();
    }
}
