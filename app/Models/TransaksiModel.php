<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
	protected $table                = 'tb_transaksi';
	protected $primaryKey           = 'id_transaksi';
	protected $allowedFields        = [
		'kode_invoice',
		'tgl',
		'batas_waktu',
    'tgl_bayar',
		'biaya_tambahan',
		'diskon',
		'pajak',
		'total_biaya',
		'status',
		'dibayar',
		'id_outlet',
		'id_member',
		'id_user',
	];

	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'tgl';
	protected $updatedField         = '';
	protected $deletedField         = '';

  public function joinTransaksiLaporan($id = null)
  {
    if($id){
     return $this
              ->join('tb_outlet', 'tb_outlet.id = tb_transaksi.id_outlet')
              ->join('tb_member', 'tb_member.id = tb_transaksi.id_member')
              ->join('tb_user', 'tb_user.id = tb_transaksi.id_user')
              ->where('tb_transaksi.id_transaksi', (int)$id)
              ->get()->getResultArray();
    }
		
    return $this
        ->join('tb_outlet', 'tb_outlet.id = tb_transaksi.id_outlet')
        ->join('tb_member', 'tb_member.id = tb_transaksi.id_member')
        ->join('tb_user', 'tb_user.id = tb_transaksi.id_user')
        ->orderBy('id_transaksi', 'asc')
        ->get()->getResultArray();
  }
	public function joinTransaksiLaporanDataOulet(){
		$outlet = session()->get('id_outlet');
		return $this
        ->join('tb_outlet', 'tb_outlet.id = tb_transaksi.id_outlet')
        ->join('tb_member', 'tb_member.id = tb_transaksi.id_member')
        ->join('tb_user', 'tb_user.id = tb_transaksi.id_user')
				->where('tb_outlet.id', $outlet)
        ->orderBy('id_transaksi', 'asc')
        ->get()->getResultArray();
	}
}