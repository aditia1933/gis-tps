<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    //fungsi insert Data ke Database
    public function login($email,$password)
    {
        return $this->db->table('tbl_admin')->where(
            [
                'email' => $email,
                'password' => $password
            ]
        )->get()->getRowArray();
    }

    //fungsi insert Data ke Database
    public function insertData($data)
    {
        $this->db->table('tbl_admin')->insert($data);
    }

    public function getAllData()
    {
        return $this->db->table('tbl_admin')
        ->get()->getResultArray();
    }

    //fungsi mengedit data berdasarkan ID lokasi
    public function getDataById($id_adm)
    {
        return $this->db->table('tbl_admin')
        ->where('id_adm', $id_adm)
        ->get()->getRowArray();
    }

    //fungsi updateData ke Database
    public function updateData($data)
    {
        $this->db->table('tbl_admin')
        ->where('id_adm', $data['id_adm'])
        ->update($data);
    }

    //fungsi Delete Data ke Database
    public function deleteData($data)
    {
        $this->db->table('tbl_admin')
        ->where('id_adm', $data['id_adm'])
        ->delete($data);
    }
    
    public function DetailData($id_adm)
    {
        return $this->db->table('tbl_admin')
        ->where('id_adm', $id_adm)
        ->get()->getRowArray();
    }
}
