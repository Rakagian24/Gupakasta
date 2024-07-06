<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuObjek extends Model
{
    use HasFactory;
    protected $table = 'buku_objek';

    protected $fillable = [
        'SKPD',
        'kode_sub_rincian_objek',
        'jumlah',
        'tahun',
    ];

    public $timestamps = false;

    public function subRincianObjek()
    {
        return $this->belongsTo(SubRincianObjek::class, 'kode_sub_rincian_objek');
    }
}
