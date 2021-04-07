<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController
{

	public function __construct()
	{
		helper('form');
	}

	public function index()
	{
		$data_superadmin = [
			'title' => 'Laporan',
			$id_outlet_transaksi = session()->get('id_outlet'),
			'transaksi' => $this->transaksiModel
				->join('tb_outlet', 'tb_outlet.id = tb_transaksi.id_outlet')
				->join('tb_member', 'tb_member.id = tb_transaksi.id_member')
				->join('tb_user', 'tb_user.id = tb_transaksi.id_user')
				->findAll(),
		];
		$data = [
			'title' => 'Laporan',
			$id_outlet_transaksi = session()->get('id_outlet'),
			'transaksi' => $this->transaksiModel
				->join('tb_outlet', 'tb_outlet.id = tb_transaksi.id_outlet')
				->join('tb_member', 'tb_member.id = tb_transaksi.id_member')
				->join('tb_user', 'tb_user.id = tb_transaksi.id_user')
				->where(['tb_transaksi.id_outlet' => $id_outlet_transaksi])
				->findAll(),
		];
    $role = session()->get('role');
		// check berdasarkan rolenya dan ditampilkan
    if ($role == 'superadmin') {
					return view('superadmin/laporan/list', $data_superadmin);
				} elseif ($role == 'admin') {
					return view('admin/laporan/list', $data);
				} elseif ($role == 'kasir') {
					return view('kasir/laporan/list', $data);
				} elseif ($role == 'owner') {
					return view('owner/laporan/list', $data);
		}
  }

  public function cetak($id){
    $data = [
        'title' => 'Cetak Laporan',
        'transaksi' => $this->transaksiModel->joinTransaksiLaporan($id),
    ];
    $role = session()->get('role');
    if ($role == 'superadmin') {
          return view('superadmin/laporan/cetak', $data);
				} elseif ($role == 'admin') {
          return view('admin/laporan/cetak', $data);
				} elseif ($role == 'kasir') {
          return view('kasir/laporan/cetak', $data);
				} elseif ($role == 'owner') {
          return view('owner/laporan/cetak', $data);
		}
  }
  public function cetak_all(){
    $data_superadmin = [
        'title' => 'Cetak Laporan',
        'transaksi' => $this->transaksiModel->joinTransaksiLaporan(),
    ];
    $data = [
        'title' => 'Cetak Laporan',
        'transaksi' => $this->transaksiModel->joinTransaksiLaporanDataOulet()
    ];
    $role = session()->get('role');
    if ($role == 'superadmin') {
          return view('superadmin/laporan/cetak', $data_superadmin);
				} elseif ($role == 'admin') {
          return view('admin/laporan/cetak', $data);
				} elseif ($role == 'kasir') {
          return view('kasir/laporan/cetak', $data);
				} elseif ($role == 'owner') {
          return view('owner/laporan/cetak', $data);
		}
  }
}
