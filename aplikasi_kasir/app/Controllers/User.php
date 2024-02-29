<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class User extends BaseController
{
    public function __construct(){
        helper('form');
        $this->user = new Usermodel();
    }

    public function index()
    {
        return view('login');
    }

 
    public function Ceklogin()
    {
        $data = new Usermodel();
        $syarat = [ 
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];
        $user = $data->where($syarat)->find();
        
        if ($user) {
            $session_data = [
                'username' => $user[0]['username'],
                'id_user' => $user[0]['id_user'],
                'level' => $user[0]['level'],
                'sudahkahLogin' => true
            ];
    
            if ($user[0]['level'] == 'admin') {
                session()->set($session_data);
                return redirect()->to('dashboard'); // Ubah sesuai dengan rute yang benar
            } elseif ($user[0]['level'] == 'kasir') {
                session()->set($session_data);
                return redirect()->to('order'); // Ubah sesuai dengan rute yang benar
            }
        } 
        
        // Jika tidak ada hasil atau level tidak valid
        return redirect()->to('/');
    }
    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function user()
    {
        $data = [
            'ListUser' => $this->user->findAll()
        ];
        return view('user', $data);
    }

    public function simpan()
    {
        $data = [
            'id_user'  => $this->request->getVar('id_user'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'nama'     => $this->request->getVar('nama'),
            'level'    => $this->request->getVar('level')
        ];
        $this->user->insert($data);
        session()->setFlashdata('pesan', 'data user berhasil disimpan!');
        return redirect()->to('user');
    }

    public function edit($username)
    {
        $syarat = [
                'username' => $username
        ];
    
        $data = [
                'username' => $this->user->where($syarat)->findAll()
        ];
    
        return view('user', $data);
    }

    public function update()
    {
        $data = [
            'id_user'    => $this->request->getVar('id_user'),
            'username'   => $this->request->getVar('username'),
            'password'      => $this->request->getVar('password'),
            'nama'     => $this->request->getVar('nama'),
            'level'     => $this->request->getVar('level')
        ];

        $this->user->update($this->request->getVar('username'), $data);
        return redirect()->to('user'); 
    }

    public function hapus($username)
    {
        $syarat = [
            'username' => $username
        ];
        $this->user->where($syarat)->delete();
        return redirect()->to('user');
    }
}
