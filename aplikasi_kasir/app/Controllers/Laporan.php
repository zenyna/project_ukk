<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MenuModel;
use App\Models\LaporanModel;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->laporan = new LaporanModel();
        $this->menu = new MenuModel();
        helper('form');
    }

    public function LaporanHarian()
    {
        return view('laporan/laporan_harian');
    }

    public function ViewTabelLaporan()
    {
        $tgl = $this->request->getPost('tgl');
        $data = [
            'dataharian' => $this->laporan->DataHarian($tgl),
            'tgl' => $tgl,
        ];
        $response = [
            'data' => view('laporan/tabel_laporan_harian',$data)
        ];

        echo json_encode($response);
        //echo dd($this->laporan->DataHarian($tgl));
    }


    public function PrintLaporanHarian($tgl)
    {
        $data = [
            'dataharian' => $this->laporan->DataHarian($tgl),
            'tgl' => $tgl,
        ];
        return view('laporan/v_template_print_laporan',$data);
    }


    //contoh
    public function index()
    {
        $data['booking'] = $this->penjualan_model->getAllBooking();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/penjualan/index');
        $this->load->view('admin/layout/footer');
    }

      public function filterLaporanPenjualan()
    {
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $data['title'] = 'Laporan Penjualan';
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['booking'] = $this->penjualan_model->getBookingByDate($startDate, $endDate);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/penjualan/index');
        $this->load->view('admin/layout/footer');
        // echo json_encode($data);
    }
}
