<?php

namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model
{
  protected $table                = 'tb_user';
  protected $primaryKey           = 'id';
  protected $allowedFields        = ['nama_pengguna', 'username', 'password', 'id_outlet', 'role'];

  public function joinOutlet($id = null)
  {
    if($id){
     return $this
              ->select('tb_user.*, tb_outlet.*')   
              ->join('tb_outlet', 'tb_outlet.id = tb_user.id_outlet')
              ->where('tb_user.id', (int)$id)
              ->get()->getResultArray();
    }
    return $this
        ->select('tb_user.*, tb_outlet.*')
        ->join('tb_outlet', 'tb_outlet.id = tb_user.id_outlet')
        ->orderBy('role', 'asc')
        ->get()->getResultArray();
  }

  public function joinOutletRole($role)
  {
    $id_outlet = session()->get('id_outlet');
    if($role != 'superadmin'){
     return $this
        ->select('tb_user.*, tb_outlet.nama_outlet')
        ->join('tb_outlet', 'tb_outlet.id = tb_user.id_outlet')
        ->like('id_outlet', $id_outlet)
        ->notLike('role', 'superadmin')
        ->orderBy('role', 'asc')
        ->get()->getResultArray();
    }
    return $this
        ->select('tb_user.*, tb_outlet.nama_outlet')   
        ->join('tb_outlet', 'tb_outlet.id = tb_user.id_outlet')
        ->orderBy('role', 'asc')
        ->get()->getResultArray();
  }
}
