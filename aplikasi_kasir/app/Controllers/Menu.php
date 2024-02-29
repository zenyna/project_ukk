<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MenuModel;
use App\Models\KategoriModel;

class Menu extends BaseController
{
    public function __construct(){
        helper('number');
        helper('form');
        $this->menu = new MenuModel;
        $this->kategori = new KategoriModel;
    }
    
    public function index()
    {
        $data = [
            'judul'        => 'Menu', 
            'ListMenu' => $this->menu->findAll(),
            'ListKategori'  => $this->kategori->findAll()
        ];
        return view('menu', $data);
    }

    public function simpan()
    {
        $harga = str_replace(",", "", $this->request->getVar('harga'));
        $data = [
            'id_menu'       => $this->request->getVar('id_menu'),
            'nama_menu'     => $this->request->getVar('nama_menu'),
            'nama_kategori' => $this->request->getVar('nama_kategori'),
            'harga'         => $harga,
            'gambar'        => $this->request->getVar('gambar')
        ];
        $this->menu->insert($data);
        return redirect()->to('menu');
    } 

    public function edit($namaMenu)
    {
        $syarat = [
            'nama_menu' => $namaMenu
        ];
        $data = [
            'detailMenu' => $this->menu->where($syarat)->findAll() // Menggunakan first() untuk mendapatkan satu baris data
        ];
        return view('menu', $data);
    }

    public function update()
    {
        $data = [
            'nama_menu'         => $this->request->getVar('nama_menu'),
            'nama_kategori'        => $this->request->getVar('nama_kategori'),
            'harga' => $this->request->getVar('harga')
        ];
        $this->menu->update($this->request->getVar('nama_menu'), $data);
        return redirect()->to('menu');  
    }

    public function hapus($namaMenu)
    {
        $syarat = [
            'nama_menu' => $namaMenu
        ];
        $this->menu->where($syarat)->delete();
        return redirect()->to('menu');
    }
}
