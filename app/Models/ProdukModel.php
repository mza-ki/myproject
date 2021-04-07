<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
  protected $table                = 'tb_paket';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['id_outlet', 'jenis', 'nama_paket', 'harga'];

	// public function paketData()
	// {
	// 	return $this
	// 		->join('tb_outlet', 'tb_outlet.id = tb_paket.id_outlet')
	// 		->get()->getResultArray();
	// }

	public function paketData($id = null)
  {
    if($id){
     return $this
              ->select('tb_paket.*, tb_outlet.nama_outlet')   
              ->join('tb_outlet', 'tb_outlet.id = tb_paket.id_outlet')
              ->where('tb_paket.id', (int)$id)
              ->get()->getResultArray();
    }
    return $this
        ->select('tb_paket.*, tb_outlet.nama_outlet')
        ->join('tb_outlet', 'tb_outlet.id = tb_paket.id_outlet')
        ->get()->getResultArray();
  }

	public function paketDataPerOutlet($id)
	{
		return $this
			->where(['id_outlet' => $id])->get()->getResultArray();
	}
}