<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuRincianObjek extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'buku_rincian_objek';

    public $timestamps = false;

    public function anggaranRekening()
    {
        return $this->belongsTo(AnggaranRekening::class, 'anggaran_rekening_id', 'id');
    }
}
