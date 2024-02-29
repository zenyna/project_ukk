<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MenuModel;
use App\Models\Ordermodel;
use App\Models\DetailOrderModel;


class Order extends BaseController
{
    public function __construct()
    {
        helper(['number', 'form']);
        $this->menu       = new MenuModel();
        $this->Ordermodel = new Ordermodel();
        $this->DetailOrder = new DetailOrderModel();
    }
    public function index()
    {
        
        $cart = \Config\Services::cart();
        $data = [
            'menu' => $this ->menu->findAll(),
            'cart' => $cart->contents(),
            'grand_total' => $cart->total(),
            'no_faktur'     => $this->Ordermodel->NoFaktur(),
        ];
        return view('order', $data);
    }

    public function CekMenu()
    {
        $nama_menu = $this->request->getVar('nama_menu');
        $menu = $this->Ordermodel->CekMenu($nama_menu);
        if ($menu == null) {
            $data=[
                'id_menu' => '',
                'nama_menu' =>'',
                'nama_kategori' => '',
                'harga' => '',
            ];
        } else {
            $data=[
                'id_menu' => $menu['id_menu'],
                'nama_menu' => $menu['nama_menu'],
                'nama_kategori' => $menu['nama_kategori'],
                'harga' => $menu['harga'],
            ];
        }
        echo json_encode($data);
    }

    public function add()
    {
        $no_faktur = $this->Ordermodel->NoFaktur(); 
           $cart = \Config\Services::cart();
           $cart->insert(array(
             'id'      => $this->request->getPost('id_menu'),
             'qty'     => $this->request->getPost('qty'),
             'price'   => $this->request->getPost('harga'),
             'name'    => $this->request->getPost('nama_menu'),
             'options' => array(
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                )
    ));
        return redirect()->to('order');
    }

    public function ViewCart()
    {
        $cart = \Config\Services::cart();
        $data = $cart->contents();

        echo dd($data);
    }

    public function ResetCart()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to('order');
    }
    public function RemoveItemCart($rowid)
    {
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->to('order');
    }

    public function bayar()
    {
        $cart = \Config\Services::cart();
        $menu = $cart->contents();
        $no_faktur = $this->Ordermodel->NoFaktur(); 
        $bayar = str_replace(",","",$this->request->getPost('bayar'));
        $kembali = str_replace(",","",$this->request->getPost('kembali'));
        //simpan detail_order
        foreach ($menu as $key => $value) {
            $data = [
                'no_faktur' => $no_faktur,
                'nama_menu' => $value['name'],
                'harga' => $value['price'],
                'qty' => $value['qty'],
                'total' => $value['subtotal'],
            ];
            $this->DetailOrder->insert($data);
        }
        // simpan order
        $data = [
            'no_faktur' => $no_faktur,
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i:s'),
            'grand_total' => $cart->total(),
            'bayar' => $bayar,
            'kembali' => $kembali,
            'username' => session()->get('username'),
        ];
        $this->Ordermodel->insert($data);
        $cart->destroy();
        session()->setFlashdata('pesan','Transaksi Berhasil Disimpan !!');
        return redirect()->to('order');
    }
}
