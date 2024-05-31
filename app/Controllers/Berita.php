<?php

namespace App\Controllers;

use App\Models\ModelBerita;

class Berita extends BaseController
{
    public function __construct()
    {
        $this->ModelBerita = new ModelBerita();
    }

    public function dataBerita()
    {
        $berita = [
            'judul' => '',
            'page'  => 'berita/v_data_berita',
            'berita' => $this->ModelBerita->getAllData(),
        ];
        return view('v_template', $berita);
    }

    public function inputBerita()
    {
        $berita = [
            'judul' => '',
            'page'  => 'Berita/v_input_berita',
        ];
        return view('v_template', $berita);
    }

    public function insertData()
    {
        if ($this->validate([
                'judul_berita' => [
                'label' => 'Judul Berita',
                'rules' => 'required',
                'errrors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!' 
                ]
                ], 'isi' => [
                    'label' => 'Isi Berita',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ],'foto_berita' => [
                    'label' => 'Foto Berita',
                    'rules' => 'uploaded[foto_berita]|mime_in[foto_berita,image/jpg,image/jpeg,image/png]',
                    'errrors' => [
                        'uploaded' => '{field} Tidak Boleh Kosong !!!',
                        'mime_in' => 'Format{field} Harus jpg, jpeg !!!' 
                    ]
                    ]
        ])){
            $foto_berita = $this->request->getFile('foto_berita');
            $nama_file_foto = $foto_berita->getRandomName();
            //jika lolos validasi
            $berita = [
                'judul_berita' => $this->request->getPost('judul_berita'),
                'isi' => $this->request->getPost('isi'),
                'foto_berita' => $nama_file_foto,
            ];
            $foto_berita->move('foto',$nama_file_foto);
            //kirim data ke function insert data di model lokasi
            $this->ModelBerita->insertData($berita);
            //notifikasi data berhasil di simpan
            session()->setFlashdata('pesan','Data Berita Berhasil di Tambahkan !!!');
            return redirect()->to('Berita/dataBerita');

        }else{
            //jika tidak lolos validasi
            return redirect()->to('Berita/inputBerita')->withInput();
        }
    }

    public function editBerita($id_berita)
    {
        $berita = [
            'judul' => '',
            'page'  => 'berita/v_edit_berita',
            'berita' => $this->ModelBerita->getDataById($id_berita),
        ];
        return view('v_template', $berita);
    }

    public function updateData($id_berita)
    {
        if ($this->validate([
            'judul_berita' => [
                'label' => 'Judul Berita',
                'rules' => 'required',
                'errrors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!' 
                ]
                ], 'isi' => [
                    'label' => 'Isi Berita',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                ]
                ], 'foto_berita' => [
                    'label' => 'Berita',
                    'rules' => 'mime_in[foto_berita,image/jpg,image/jpeg,image/png]',
                    'errrors' => [
                        'mime_in' => 'Format{field} Harus jpg, jpeg !!!',
                    ]
                ]
                
        ])){
            $foto_berita = $this->request->getFile('foto_berita');
            

            $berita = $this->ModelBerita->getDataById($id_berita);
            if ($foto_berita-> getError()== 4) {
                $nama_file_foto = $berita['foto_berita'];
                # code...
            }else {
                $nama_file_foto = $foto_berita->getRandomName();
                $foto_berita->move('foto',$nama_file_foto);
            }
            //jika lolos validasi
            $berita = [
                'id_berita' =>  $id_berita,
                'judul_berita' => $this->request->getPost('judul_berita'),
                'isi' => $this->request->getPost('isi'),
                'foto_berita' => $nama_file_foto,
            ];
            
            //kirim data ke function insert data di model lokasi
            $this->ModelBerita->updateData($berita);
            //notifikasi data berhasil di simpan
            session()->setFlashdata('pesan','Data Berita Berhasil di Update !!!');
            return redirect()->to('Berita/dataBerita');

        }else{
            //jika tidak lolos validasi
            return redirect()->to('Berita/editBerita/' . $id_berita)->withInput();
        }
    }

    public function deleteBerita($id_berita)
    {
        $berita = [
            'id_berita' =>  $id_berita,
        ];
        
        //kirim data ke function insert data di model lokasi
        $this->ModelBerita->deleteData($berita);
        //notifikasi data berhasil di simpan
        session()->setFlashdata('pesan','Data berita Berhasil di Delete !!!');
        return redirect()->to('Berita/dataBerita');

    }

    public function detailBerita($id_berita)
    {
        $berita = [
            'judul' => '',
            'page'  => 'Berita/v_view_berita',
            'berita' => $this->ModelBerita->DetailData($id_berita),
        ];
        return view('v_template', $berita);
    }
}