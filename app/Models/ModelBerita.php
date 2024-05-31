<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBerita extends Model
{
    //fungsi insert Data ke Database
    public function insertData($berita)
    {
        $this->db->table('tbl_berita')->insert($berita);
    }

    //fungsi mengambil seluruh Data
    public function getAllData()
    {
        return $this->db->table('tbl_berita')
        ->get()->getResultArray();
    }

    //fungsi mengedit data berdasarkan ID lokasi
    public function getDataById($id_berita)
    {
        return $this->db->table('tbl_berita')
        ->where('id_berita', $id_berita)
        ->get()->getRowArray();
    }

    //fungsi updateData ke Database
    public function updateData($berita)
    {
        $this->db->table('tbl_berita')
        ->where('id_berita', $berita['id_berita'])
        ->update($berita);
    }

    //fungsi Delete Data ke Database
    public function deleteData($berita)
    {
        $this->db->table('tbl_berita')
        ->where('id_berita', $berita['id_berita'])
        ->delete($berita);
    }
    
    public function DetailData($id_berita)
    {
        return $this->db->table('tbl_berita')
        ->where('id_berita', $id_berita)
        ->get()->getRowArray();
    }
}
