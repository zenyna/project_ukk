<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function __construct(){
        helper('form');
        $this->kategori     =   new KategoriModel();
    }

    public function index()
    {
        $data = [
            'judul'        => 'Kategori', 
            'ListKategori' => $this->kategori->findAll()
        ];
        return view('kategori', $data);
    }

    public function simpan()
    {
        $data=[
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ];

        $this->kategori->insert($data);
        return redirect()->to('kategori');
    }

    public function hapus($namaKategori)
    {
        $syarat = [
            'nama_kategori' => $namaKategori
        ];
        $this->kategori->where($syarat)->delete();
        return redirect()->to('kategori');
    }
}
