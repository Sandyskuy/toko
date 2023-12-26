<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{

    protected $table = "transaksi";
    protected $primaryKey = 'id';
    protected $allowedFields = ['idBarang', 'nama', 'netto', 'harga', 'jumlah',  'tanggal', 'user'];
}
