<?php

namespace App\Models;

use CodeIgniter\Model;

class OutletModel extends Model
{
  protected $table                = 'tb_outlet';
  protected $primaryKey           = 'id';
  protected $allowedFields        = ['nama_outlet', 'alamat_outlet', 'tlp_outlet'];

  public function getOutlet($id = false)
  {
    if ($id == false) {
      return $this->findAll();
    }
    return $this->where(['id' => $id])->first();
  }
}
