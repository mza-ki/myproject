<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
	protected $table                = 'tb_detail_transaksi';
	protected $primaryKey           = 'id';
	protected $allowedFields        = [
		'id_transaksi',
		'id_paket',
		'qty',
    'keterangan',
    'total_harga'
	];
}
