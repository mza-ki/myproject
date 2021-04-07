<?php

namespace App\Controllers;

class Outlet extends BaseController
{
  public function __construct()
  {
    helper('form');
  }

	public function index(){
		$data = [
      'title' => 'Outlet',
      'outlet' => $this->outletModel->findAll(),
    ];
    return view('superadmin/outlet/list', $data);
	}
  public function add_view(){
    $data = [
      'title' => 'Tambah Outlet'
    ];
    return view('superadmin/outlet/add', $data);
  }

	public function add(){
    $this->outletModel->save([
      'nama_outlet' => $this->request->getVar('nama'),
      'alamat_outlet' => $this->request->getVar('alamat'),
      'tlp_outlet' => $this->request->getVar('tlp'),
    ]);
    session()->setFlashdata('message', 'Outlet berhasil ditambahkan!');
    return redirect()->to('/outlet');
	}

  /**
   * function untuk menampilkan halaman edit
   **/
  public function edit_view($id){
    $data = [
      'title' => 'Ubah Outlet',
      'outlet' => $this->outletModel->getOutlet($id),
    ];
    return view('superadmin/outlet/edit', $data);
  }

	public function edit($id){
    
     $this->outletModel->save([
      'id' => $id,
      'nama_outlet' => $this->request->getVar('nama'),
      'alamat_outlet' => $this->request->getVar('alamat'),
      'tlp_outlet' => $this->request->getVar('tlp'),
    ]);
    session()->setFlashdata('message', 'data outlet berhasil diubah!');
    return redirect()->to('/outlet');
	}

  public function delete($id)
  {
    $this->outletModel->where('id', $id)->delete();
    session()->setFlashdata('delete', 'data outlet berhasil dihapus!');
    return redirect()->to('/outlet');
  }
}