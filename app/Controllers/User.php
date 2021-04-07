<?php

namespace App\Controllers;

class User extends BaseController
{
  public function __construct()
  {
    helper('form');
  }

	public function index(){
    $data_superadmin = [
      'title' => 'Penggguna',
      $role = session()->get('role'),
      'user' => $this->userModel->joinOutletRole($role),
      'outlet' => $this->outletModel->findAll(),
    ];
		$data_admin = [
      'title' => 'Penggguna',
      $role = session()->get('role'),
      'user' => $this->userModel->joinOutletRole($role),
      $id = session()->get('id_outlet'),
      'outlet' => $this->outletModel->getOutlet($id),
    ];
    $role = session()->get('role');
		// check berdasarkan rolenya dan ditampilkan
    if ($role == 'superadmin') {
					return view('superadmin/user/list', $data_superadmin);
				} elseif ($role == 'admin') {
					return view('admin/user/list', $data_admin);
		}
	}
  
	public function add_view(){
		$data_superadmin = [
      'title' => 'Tambah Penggguna',
      'outlet' => $this->outletModel->findAll(),
    ];
    $data_admin = [
      'title' => 'Tambah Penggguna',
      $id = session()->get('id_outlet'),
      'outlet' => $this->outletModel->getOutlet($id),
    ];
    $role = session()->get('role');
		// check berdasarkan rolenya dan ditampilkan
    if ($role == 'superadmin') {
					return view('superadmin/user/add', $data_superadmin);
				} elseif ($role == 'admin') {
          return view('admin/user/add', $data_admin);
		}
	}

  public function add()
  {
    $this->userModel->save([
      'nama_pengguna' => $this->request->getVar('nama_pengguna'),
      'username' => $this->request->getVar('username'),
      'password' => $this->request->getVar('password'),
      'id_outlet' => $this->request->getVar('id_outlet'),
      'role' => $this->request->getVar('role'),
    ]);
    session()->setFlashdata('message', 'User berhasil ditambahkan!');
    return redirect()->to('/user');
  }

	public function edit_view($id){
    $data_superadmin = [ 
			'title' => 'Ubah Pengguna',
      'user' => $this->userModel->joinOutlet($id)[0],
      'outlet' => $this->outletModel->findAll(),
		];
		$data_admin = [
      'title' => 'Ubah Produk',
      'user' => $this->userModel->joinOutlet($id)[0],
			$id = session()->get('id_outlet'),
			'outlet' => $this->outletModel->getOutlet($id),
    ];
    $role = session()->get('role');
		// check berdasarkan rolenya dan ditampilkan
    if ($role == 'superadmin') {
					return view('superadmin/user/edit', $data_superadmin);
				} elseif ($role == 'admin') {
					return view('admin/user/edit', $data_admin);
		}
	}

  public function edit($id)
  {
    $this->userModel->save([
      'id' => $id,
      'nama_pengguna' => $this->request->getVar('nama_pengguna'),
      'username' => $this->request->getVar('username'),
      'password' => $this->request->getVar('password'),
      'id_outlet' => $this->request->getVar('id_outlet'),
      'role' => $this->request->getVar('role'),
    ]);
    session()->setFlashdata('message', 'data user berhasil diubah!');
    return redirect()->to('/user');
  }

  public function delete($id)
  {
    $this->userModel->where('id', $id)->delete();
    session()->setFlashdata('delete', 'data user berhasil dihapus!');
    return redirect()->to('/user');
  }
}