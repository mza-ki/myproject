<?php

namespace App\Controllers;

class Produk extends BaseController
{
  public function __construct()
	{
		helper('form');
	}
	public function index(){
		$data_superadmin = [
      'title' => 'Produk',
			$id = session()->get('id_outlet'),
			'produk' => $this->produkModel->paketData(),
      'outlet' => $this->outletModel->findAll(),
		];
		$data_admin = [
      'title' => 'Produk',
			$id = session()->get('id_outlet'),
			'produk' => $this->produkModel->paketDataPerOutlet($id),
      'outlet' => $this->outletModel->findAll(),
		];
		$role = session()->get('role');
		// check berdasarkan rolenya dan ditampilkan
    if ($role == 'superadmin') {
					return view('superadmin/produk/list', $data_superadmin);
				} elseif ($role == 'admin') {
					return view('admin/produk/list', $data_admin);
		}
	}

	public function add_view(){
		$data_superadmin = [ 
			'title' => 'Tambah Produk',
			'outlet' => $this->outletModel->findAll(),
		];
		$data_admin = [
      'title' => 'Tambah Produk',
			$id = session()->get('id_outlet'),
			'outlet' => $this->outletModel->getOutlet($id),
    ];
		$role = session()->get('role');
		// check berdasarkan rolenya dan ditampilkan
    if ($role == 'superadmin') {
					return view('superadmin/produk/add', $data_superadmin);
				} elseif ($role == 'admin') {
					return view('admin/produk/add', $data_admin);
		}
	}

	public function add(){
    $this->produkModel->save([
			'id_outlet' => $this->request->getVar('id_outlet'),
			'jenis' => $this->request->getVar('jenis'),
			'nama_paket' => $this->request->getVar('nama_produk'),
			'harga' => $this->request->getVar('harga'),
		]);
    session()->setFlashdata('message', 'Produk berhasil ditambahkan!');
		return redirect()->to('/produk');
	}

	public function edit_view($id){
		$data_superadmin = [ 
			'title' => 'Ubah Produk',
			'produk' => $this->produkModel->paketData($id)[0],
			'outlet' => $this->outletModel->findAll(),
		];
		$data_admin = [
      'title' => 'Ubah Produk',
			'produk' => $this->produkModel->paketData($id)[0],
			$id = session()->get('id_outlet'),
			'outlet' => $this->outletModel->getOutlet($id),
    ];
		$role = session()->get('role');
		// check berdasarkan rolenya dan ditampilkan
    if ($role == 'superadmin') {
					return view('superadmin/produk/edit', $data_superadmin);
				} elseif ($role == 'admin') {
					return view('admin/produk/edit', $data_admin);
		}
	}

	public function edit($id){
    $this->produkModel->save([
			'id' => $id,
			'id_outlet' => $this->request->getVar('id_outlet'),
			'jenis' => $this->request->getVar('jenis'),
			'nama_paket' => $this->request->getVar('nama_paket'),
			'harga' => $this->request->getVar('harga'),
		]);
    session()->setFlashdata('message', 'Paket berhasil diubah!');
		return redirect()->to('/produk');	
  }

	public function delete($id)
	{
		$this->produkModel->where('id', $id)->delete();
		session()->setFlashdata('delete', 'Paket berhasil dihapus!');
		return redirect()->to('/produk');
	}
	public function getPrice($id)
	{
		return json_encode($this->produkModel->where('id', $id)->first());
	}
}