<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    public function DataHarian($tgl)
    {
        return $this->db->table('detail_order')
        ->join('menu', 'menu.nama_menu=detail_order.nama_menu')
        ->join('order', 'order.no_faktur=detail_order.no_faktur')
        ->where('order.tanggal', $tgl)
        ->select('detail_order.nama_menu')
        ->select('detail_order.harga')
        ->groupBy('detail_order.nama_menu')
        ->selectSum('detail_order.qty')
        ->selectSum('detail_order.harga')
        ->get()->getResultArray();
    }
}
