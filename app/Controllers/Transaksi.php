<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Transaksi extends BaseController
{

	public function __construct()
	{
		helper('form');
	}

	public function index()
	{
		$data_superadmin = [
			'title' => 'Transaksi',
			'transaksi' => $this->transaksiModel
				->join('tb_outlet', 'tb_outlet.id = tb_transaksi.id_outlet')
				->join('tb_member', 'tb_member.id = tb_transaksi.id_member')
				->join('tb_user', 'tb_user.id = tb_transaksi.id_user')
				->findAll(),
		];
		$data = [
			'title' => 'Transaksi',
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
					return view('superadmin/transaksi/list', $data_superadmin);
		} elseif ($role == 'admin') {
					return view('admin/transaksi/list', $data);
		} elseif ($role == 'kasir') {
					return view('kasir/transaksi/list', $data);
		}
	}

	public function detail($id){
		 $data = [
        'title' => 'Detail Transaksi',
        'transaksi' => $this->transaksiModel->joinTransaksiLaporan($id)[0],
				'paket' => $this->produkModel
				->where('id_outlet', session()->get('id_outlet'))
				->findAll(),
				'member' => $this->memberModel->findAll(),
    	];
			$role = session()->get('role');
			// check berdasarkan rolenya dan ditampilkan
			if ($role == 'superadmin') {
					return view('superadmin/transaksi/detail', $data);
			} elseif ($role == 'admin') {
					return view('admin/transaksi/detail', $data);
			} elseif ($role == 'kasir') {
					return view('kasir/transaksi/detail', $data);
			}
	}

	public function simpan($id)
	{
		$this->transaksiModel->save([
			'id_transaksi' => $id,
			'kode_invoice' => $this->request->getVar('kode_invoice'),
			'id_member' => $this->request->getVar('id_member'),
			'batas_waktu' => $this->request->getVar('batas_waktu'),
			'tgl_bayar' => $this->request->getVar('tgl_bayar'),
			'biaya_tambahan' => $this->request->getVar('biaya_tambahan'),
			'diskon' => $this->request->getVar('diskon'),
			'pajak' => $this->request->getVar('pajak'),
			'total_biaya' => $this->request->getVar('total_biaya'),
			'status' => $this->request->getVar('status'),
			'dibayar' => $this->request->getVar('dibayar'),
			'id_outlet' => session()->get('id_outlet'),
			'id_user' => session()->get('id'),
		]);
		session()->setFlashdata('message', 'data transaksi berhasil diubah!');
		return redirect()->to('/transaksi');
	}

	public function add_view(){
		$data = [
			'title' => 'Tambah Transaksi',
			'paket' => $this->produkModel
				->where('id_outlet', session()->get('id_outlet'))
				->findAll(),
			'paket1' => $this->produkModel
				->first(),
			'member' => $this->memberModel->findAll(),
		];

		$role = session()->get('role');
		if($role == 'superadmin'){
			return view('superadmin/transaksi/add', $data);
		}else if($role == 'admin'){
			return view('admin/transaksi/add', $data);
		}else if($role == 'kasir'){
			return view('kasir/transaksi/add', $data);
		}
	}

	public function add()
	{
		$dataTransaksi = [
			'kode_invoice' => $this->request->getVar('kode_invoice'),
			'id_member' => $this->request->getVar('id_member'),
			'batas_waktu' => $this->request->getVar('batas_waktu'),
			'biaya_tambahan' => $this->request->getVar('biaya_tambahan'),
			'diskon' => $this->request->getVar('diskon'),
			'pajak' => $this->request->getVar('pajak'),
			'total_biaya' => $this->request->getVar('total_biaya'),
			'status' => $this->request->getVar('status'),
			'dibayar' => $this->request->getVar('dibayar'),
			'id_outlet' => session()->get('id_outlet'),
			'id_user' => session()->get('id'),
		];
		$this->transaksiModel->insert($dataTransaksi);

		$id_transaksi = $this->transaksiModel->insertID();
		// dd($id_transaksi);
		for ($i = 0; $i < count($this->request->getVar('id_paket')); $i++) {
			$dataDetail = [
				'id_transaksi' => $id_transaksi,
				'id_paket' => $this->request->getVar('id_paket[' . $i . ']'),
				'qty' => $this->request->getVar('qty[' . $i . ']'),
				'total_harga' => $this->request->getVar('total_harga[' . $i . ']'),
			];
			$this->detailModel->insert($dataDetail);
		}
		session()->setFlashdata('message', 'Pesanan berhasil ditambahkan!');
		return redirect()->to('/transaksi');
	}

	/**
	 * function untuk menghapus transaksi berdasarkan id yang di pilih
	 * @param Type $var Description
	 * @return type
	 * @throws conditon
	 **/
	public function delete($id)
  {
    $this->detailModel->where($id, 'id')->delete();
    $this->transaksiModel->where('id_transaksi', $id)->delete();
    session()->setFlashdata('delete', 'data transaksi berhasil dihapus!');
    return redirect()->to('/transaksi');
  }
}
