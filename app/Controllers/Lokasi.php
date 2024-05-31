<?php

namespace App\Controllers;

use App\Models\ModelLokasi;

class Lokasi extends BaseController
{
    public function __construct()
    {
        $this->ModelLokasi = new ModelLokasi();
    }

    public function index()
    {
        $data = [
            'judul' => '',
            'page'  => 'lokasi/v_data_lokasi',
            'lokasi' => $this->ModelLokasi->getAllData(),
        ];
        return view('v_template', $data);
    }

    public function inputLokasi()
    {
        $data = [
            'judul' => '',
            'page'  => 'lokasi/v_input_lokasi',
        ];
        return view('v_template', $data);
    }

    public function insertData()
    {
        if ($this->validate([
            'nama_lokasi' => [
                'label' => 'Nama Lokasi',
                'rules' => 'required',
                'errrors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!' 
                ]
                ], 'alamat_lokasi' => [
                    'label' => 'Alamat Lokasi',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ], 'jenis' => [
                    'label' => 'Jenis TPS',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ], 'jumlah' => [
                    'label' => 'Jumlah Unit',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ], 'kondisi' => [
                    'label' => 'Kondisi',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ], 'latitude' => [
                    'label' => 'Latitude',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ], 'longitude' => [
                    'label' => 'Longitude',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                 ], 'foto_lokasi' => [
                    'label' => 'Foto Lokasi',
                    'rules' => 'uploaded[foto_lokasi]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/png]',
                    'errrors' => [
                        'uploaded' => '{field} Tidak Boleh Kosong !!!',
                        'mime_in' => 'Format{field} Harus jpg, jpeg !!!' 
                    ]
                ]
        ])){
            $foto_lokasi = $this->request->getFile('foto_lokasi');
            $nama_file_foto = $foto_lokasi->getRandomName();
            //jika lolos validasi
            $data = [
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'jenis' => $this->request->getPost('jenis'),
                'jumlah' => $this->request->getPost('jumlah'),
                'kondisi' => $this->request->getPost('kondisi'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'foto_lokasi' => $nama_file_foto,
            ];
            $foto_lokasi->move('foto',$nama_file_foto);
            //kirim data ke function insert data di model lokasi
            $this->ModelLokasi->insertData($data);
            //notifikasi data berhasil di simpan
            session()->setFlashdata('pesan','Data Lokasi Berhasil di Tambahkan !!!');
            return redirect()->to('Lokasi/inputLokasi');

        }else{
            //jika tidak lolos validasi
            return redirect()->to('Lokasi/inputLokasi')->withInput();
        }
    }

    public function pemetaanLokasi()
    {
        $data = [
            'judul' => '',
            'page'  => 'lokasi/v_pemetaan_lokasi',
            'lokasi' => $this->ModelLokasi->getAllData(),
        ];
        return view('v_template', $data);
    }

    public function editLokasi($id_lokasi)
    {
        $data = [
            'judul' => '',
            'page'  => 'lokasi/v_edit_lokasi',
            'lokasi' => $this->ModelLokasi->getDataById($id_lokasi),
        ];
        return view('v_template', $data);
    }

    public function updateData($id_lokasi)
    {
        if ($this->validate([
            'nama_lokasi' => [
                'label' => 'Nama Lokasi',
                'rules' => 'required',
                'errrors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!' 
                ]
                ], 'alamat_lokasi' => [
                    'label' => 'Alamat Lokasi',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ], 'jenis' => [
                    'label' => 'Jenis TPS',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ], 'jumlah' => [
                    'label' => 'Jumlah Unit',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ], 'kondisi' => [
                    'label' => 'Kondisi',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ], 'latitude' => [
                    'label' => 'Latitude',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ], 'longitude' => [
                    'label' => 'Longitude',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                 ], 'foto_lokasi' => [
                    'label' => 'Foto Lokasi',
                    'rules' => 'mime_in[foto_lokasi,image/jpg,image/jpeg,image/png]',
                    'errrors' => [
                        'mime_in' => 'Format{field} Harus jpg, jpeg !!!',
                    ]
                ]
        ])){
            $foto_lokasi = $this->request->getFile('foto_lokasi');
            

            $lokasi = $this->ModelLokasi->getDataById($id_lokasi);
            if ($foto_lokasi-> getError()== 4) {
                $nama_file_foto = $lokasi['foto_lokasi'];
                # code...
            }else {
                $nama_file_foto = $foto_lokasi->getRandomName();
                $foto_lokasi->move('foto',$nama_file_foto);
            }
            //jika lolos validasi
            $data = [
                'id_lokasi' =>  $id_lokasi,
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'jenis' => $this->request->getPost('jenis'),
                'jumlah' => $this->request->getPost('jumlah'),
                'kondisi' => $this->request->getPost('kondisi'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'foto_lokasi' => $nama_file_foto,
            ];
            
            //kirim data ke function insert data di model lokasi
            $this->ModelLokasi->updateData($data);
            //notifikasi data berhasil di simpan
            session()->setFlashdata('pesan','Data Lokasi Berhasil di Update !!!');
            return redirect()->to('Lokasi/index');

        }else{
            //jika tidak lolos validasi
            return redirect()->to('Lokasi/editLokasi/' . $id_lokasi)->withInput();
        }
    }

    public function deleteLokasi($id_lokasi)
    {
        $data = [
            'id_lokasi' =>  $id_lokasi,
        ];
        
        //kirim data ke function insert data di model lokasi
        $this->ModelLokasi->deleteData($data);
        //notifikasi data berhasil di simpan
        session()->setFlashdata('pesan','Data Lokasi Berhasil di Delete !!!');
        return redirect()->to('Lokasi/index');

    }

    public function persebaranTPS()
    {
        $data = [
            'judul' => '',
            'page'  => 'lihat/v_persebaran_tps',
            'lokasi' => $this->ModelLokasi->getAllData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function DataTPS()
    {
        $data = [
            'judul' => '',
            'page'  => 'lihat/v_data_lokasi_tps',
            'lokasi' => $this->ModelLokasi->getAllData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function beranda()
    {
        $data = [
            'judul' => '',
            'page'  => 'lokasi/v_beranda',
            
        ];
        return view('v_template_front_end', $data);
    }

    public function visiMisi()
    {
        $data = [
            'judul' => '',
            'page'  => 'lokasi/v_visi_misi',
        ];
        return view('v_template_front_end', $data);
    }

    public function tujuan()
    {
        $data = [
            'judul' => '',
            'page'  => 'lokasi/v_tujuan',
        ];
        return view('v_template_front_end', $data);
    }

    public function rute()
    {
        $data = [
            'judul' => 'Rute',
            'page'  => 'Lokasi/v_rute',
        ];
        return view('v_template', $data);
    }

    public function ruteBaru()
    {
        $data = [
            'judul' => 'Rute',
            'page'  => 'Lokasi/v_rute_baru',
        ];
        return view('v_template', $data);
    }

    public function ruteUser($id_lokasi)
    {
        $data = [
            'judul' => '',
            'page'  => 'Lokasi/v_rute_user',
            'lokasi' => $this->ModelLokasi->DetailData($id_lokasi),
        ];
        return view('v_template', $data);
    }

    public function Detail($id_lokasi)
    {
        $data = [
            'judul' => '',
            'page'  => 'Lokasi/v_detail_back',
            'lokasi' => $this->ModelLokasi->DetailData($id_lokasi),
        ];
        return view('v_template_front_end', $data);
    }

    public function detailAdmin($id_lokasi)
    {
        $data = [
            'judul' => '',
            'page'  => 'Lokasi/v_detail',
            'lokasi' => $this->ModelLokasi->DetailData($id_lokasi),
        ];
        return view('v_template', $data);
    }

    public function persebaranTPSS()
    {
        $data = [
            'judul' => '',
            'page'  => 'lihat/v_persebaran_tpss',
            'lokasi' => $this->ModelLokasi->getAllData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function ruteLokasi($id_lokasi)
    {
        $data = [
            'judul' => '',
            'page'  => 'lihat/v_rute_tps',
            'lokasi' => $this->ModelLokasi->DetailData($id_lokasi),
            
        ];
        return view('v_template_front_end', $data);
    }


}