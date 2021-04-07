<?php

namespace App\Controllers;

class Member extends BaseController
{
  public function __construct()
	{
		helper('form');
	}

	public function index(){
		$data = [
      'title' => 'Member',
      'member' => $this->memberModel->findAll(),
		];
    $role = session()->get('role');
		// check berdasarkan rolenya dan ditampilkan
    if ($role == 'superadmin') {
					return view('superadmin/member/list', $data);
				} elseif ($role == 'admin') {
					return view('admin/member/list', $data);
				} elseif ($role == 'kasir') {
					return view('kasir/member/list', $data);
		}
	}

  public function add_view(){
		$data = [
      'title' => 'Tambah Member'
    ];
    $role = session()->get('role');
		// check berdasarkan rolenya dan ditampilkan
    if ($role == 'superadmin') {
					return view('superadmin/member/add', $data);
				} elseif ($role == 'admin') {
					return view('admin/member/add', $data);
				} elseif ($role == 'kasir') {
					return view('kasir/member/add', $data);
		}
	}

	public function add()
	{
		$this->memberModel->save([
			'nama' => $this->request->getVar('nama'),
			'alamat' => $this->request->getVar('alamat'),
			'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
			'tlp' => $this->request->getVar('tlp'),
		]);
		session()->setFlashdata('message', 'data member berhasil ditambahkan!');
		return redirect()->to('/member');
	}

  public function edit_view($id)
  {
    $data = [
      'title' => 'Ubah Member',
      'member' => $this->memberModel->getMember($id),
    ];
		$role = session()->get('role');
		// check berdasarkan rolenya dan ditampilkan
    if ($role == 'superadmin') {
					return view('superadmin/member/edit', $data);
				} elseif ($role == 'admin') {
					return view('admin/member/edit', $data);
				} elseif ($role == 'kasir') {
					return view('kasir/member/edit', $data);
		}
	}

	public function edit($id)
	{
		$this->memberModel->save([
			'id' => $id,
			'nama' => $this->request->getVar('nama'),
			'alamat' => $this->request->getVar('alamat'),
			'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
			'tlp' => $this->request->getVar('tlp'),
		]);
		session()->setFlashdata('message', 'data member berhasil diubah!');
		return redirect()->to('/member');
	}

	public function delete($id)
	{
		$this->memberModel->where('id', $id)->delete();
		session()->setFlashdata('delete', 'data member berhasil dihapus!');
		return redirect()->to('/member');
	}
}