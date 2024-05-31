<?php

namespace App\Controllers;

use App\Models\ModelTamu;

class Pengunjung extends BaseController
{
    public function __construct()
    {
        $this->ModelTamu = new ModelTamu();
    }

    public function dataTamu()
    {
        $tamu = [
            'judul' => '',
            'page'  => 'tamu/v_data_pengunjung',
            'tamu' => $this->ModelTamu->getAllData(),
        ];
        return view('v_template', $tamu);
    }

    public function  bukuTamu()
    {
        $tamu = [
            'judul' => '',
            'page'  => 'tamu/v_input_tamu',
        ];
        
        return view('v_template_front_end', $tamu);
    }

    public function insertData()
    {
        if ($this->validate([
                'nama_tamu' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errrors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!' 
                ]
                ], 'email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                ]
                ],'pesan' => [
                    'label' => 'Pesan',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                ]
                ]
        ])){
            //jika lolos validasi
            $tamu = [
                'nama_tamu' => $this->request->getPost('nama_tamu'),
                'email' => $this->request->getPost('email'),
                'pesan' => $this->request->getPost('pesan'),
            ];
            //kirim data ke function insert data di model lokasi
            $this->ModelTamu->insertData($tamu);
            //notifikasi data berhasil di simpan
            session()->setFlashdata('pesan','Data Berhasil di Tambahkan !!!');
            return redirect()->to('Pengunjung/bukuTamu');

        }else{
            //jika tidak lolos validasi
            return redirect()->to('Pengunjung/bukuTamu')->withInput();
        }
    }

    public function deleteTamu($id_tamu)
    {
        $tamu = [
            'id_tamu' =>  $id_tamu,
        ];
        
        //kirim data ke function insert data di model lokasi
        $this->ModelTamu->deleteData($tamu);
        //notifikasi data berhasil di simpan
        session()->setFlashdata('pesan','Data Pengunjung Berhasil di Delete !!!');
        return redirect()->to('Pengunjung/dataTamu');

    }

    public function deleteNotification($id_tamu)
    {
        $tamu = [
            'id_tamu' =>  $id_tamu,
        ];
        
        //kirim data ke function insert data di model lokasi
        $this->ModelTamu->deleteData($tamu);
        //notifikasi data berhasil di simpan
        session()->setFlashdata('pesan','Data Berhasil di Delete !!!');
        return redirect()->to('Home');

    }

    public function detailTamu($id_tamu)
    {
        $tamu = [
            'judul' => '',
            'page'  => 'tamu/v_detail_tamu',
            'tamu' => $this->ModelTamu->DetailData($id_tamu),
        ];
        return view('v_template', $tamu);
    }

}