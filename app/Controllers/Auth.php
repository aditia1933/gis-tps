<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        helper('form');
    }

    public function index()
    {
        //
    }

    public function formLogin()
    {
        $data = [
            'judul' => '',
            'page'  => 'v_login',
        ];
        return view('v_template_front_end', $data);
    }

    public function cekLogin()
    {
        if ($this->validate([
        'email' => [
            'label' => 'E-Mail',
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => '{field} Wajin Diisi !!', 
                'valid_email' =>'Harus isi Email !!!'
            ]
        ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors'=> [
                    'required' => '{field} Wajin Diisi !!',
                ]
            ]
        ])){
            //valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cekLogin = $this->ModelAuth->login($email, $password);
            if ($cekLogin){
                session()->set('nama_adm', $cekLogin['nama_adm']);
                session()->set('email', $cekLogin['email']);
                session()->set('foto', $cekLogin['foto']);
                return redirect()->to(base_url('Home'));
            }else {
                session()-> setFlashdata('pesan', 'Email atau Password Salah !!!');
                return redirect()->to(base_url('auth/formLogin'));
            }
        }else{
            //Tidak Valid
            session()->setFlashdata('errors',\config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/formLogin'));
        }
    }

    public function logout()
    {
        session()->remove('nama_adm');
        session()->remove('email');
        session()->remove('foto');
        session()-> setFlashdata('pesan', 'Logout Succes');
        return redirect()->to(base_url('auth/formLogin'));
    }

    public function profil()
    {
        $data = [
            'judul' => '',
            'page'  => 'profil/v_profil',
            'profil' => $this->ModelAuth->getAllData(),
        ];
        return view('v_template', $data);
    }
    
    public function inputProfil()
    {
        $data = [
            'judul' => '',
            'page'  => 'profil/v_input_profil',
        ];
        return view('v_template', $data);
    }

    public function insertData()
    {
        if ($this->validate([
            'nip' => [
                'label' => 'NIP',
                'rules' => 'required',
                'errrors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!' 
                ]
                ], 'nama_adm' => [
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
                ], 'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ],'foto' => [
                    'label' => 'Foto',
                    'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errrors' => [
                        'mime_in' => 'Format{field} Harus jpg, jpeg !!!',
                    ]
                ], 'foto' => [
                    'label' => 'Foto',
                    'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errrors' => [
                        'mime_in' => 'Format{field} Harus jpg, jpeg !!!',
                    ]
                ]
        ])){
            $foto = $this->request->getFile('foto');
            $nama_file_foto = $foto->getRandomName();
            //jika lolos validasi
            $data = [
                'nip' => $this->request->getPost('nip'),
                'nama_adm' => $this->request->getPost('nama_adm'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'foto' => $nama_file_foto,
            ];
            $foto->move('foto',$nama_file_foto);
            //kirim data ke function insert data di model lokasi
            $this->ModelAuth->insertData($data);
            //notifikasi data berhasil di simpan
            session()->setFlashdata('pesan','Data User Berhasil di Tambahkan !!!');
            return redirect()->to('Auth/profil');

        }else{
            //jika tidak lolos validasi
            return redirect()->to('Auth/inputProfil')->withInput();
        }
    }

    public function editProfil($id_adm)
    {
        $data = [
            'judul' => '',
            'page'  => 'profil/v_edit_profil',
            'profil' => $this->ModelAuth->getDataById($id_adm),
        ];
        return view('v_template', $data);
    }

    public function updateData($id_adm)
    {
        if ($this->validate([
            'nip' => [
                'label' => 'NIP',
                'rules' => 'required',
                'errrors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!' 
                ]
                ], 'nama_adm' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ],'email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ], 'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errrors' => [
                        'required' => '{field} Tidak Boleh Kosong !!!' 
                    ]
                ],'foto' => [
                    'label' => 'Foto',
                    'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errrors' => [
                        'uploaded' => '{field} Tidak Boleh Kosong !!!',
                        'mime_in' => 'Format{field} Harus jpg, jpeg !!!' 
                    ]
                ]
        ])){
            $foto = $this->request->getFile('foto');
            

            $profil = $this->ModelAuth->getDataById($id_adm);
            if ($foto-> getError()== 4) {
                $nama_file_foto = $profil['foto'];
                # code...
            }else {
                $nama_file_foto = $foto->getRandomName();
                $foto->move('foto',$nama_file_foto);
            }
            //jika lolos validasi
            $data = [
                'id_adm' =>  $id_adm,
                'nip' => $this->request->getPost('nip'),
                'nama_adm' => $this->request->getPost('nama_adm'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'foto' => $nama_file_foto,
            ];
            
            //kirim data ke function insert data di model lokasi
            $this->ModelAuth->updateData($data);
            //notifikasi data berhasil di simpan
            session()->setFlashdata('pesan','Data User Berhasil di Update !!!');
            return redirect()->to('Auth/profil');

        }else{
            //jika tidak lolos validasi
            return redirect()->to('Auth/editProfil/' . $id_adm)->withInput();
        }
    }

    public function deleteProfil($id_adm)
    {
        $data = [
            'id_adm' =>  $id_adm,
        ];
        
        //kirim data ke function insert data di model lokasi
        $this->ModelAuth->deleteData($data);
        //notifikasi data berhasil di simpan
        session()->setFlashdata('pesan','Data Lokasi Berhasil di Delete !!!');
        return redirect()->to('Auth/profil');

    }

    public function detailProfil($id_adm)
    {
        $data = [
            'judul' => '',
            'page'  => 'profil/v_detail_profil',
            'profil' => $this->ModelAuth->DetailData($id_adm),
        ];
        return view('v_template', $data);
    }

}
