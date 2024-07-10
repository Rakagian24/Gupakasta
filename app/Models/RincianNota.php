<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianNota extends Model
{
    use HasFactory;
    protected $table = 'rincian_npd';

    protected $fillable = [
        'npd_id',
        'anggaran',
        'akumulasi_sebelumnya',
        'pencairan',
        'sisa_anggaran',
    ];

    public $timestamps = false;

    public function notaPencairanDana()
    {
        return $this->belongsTo(NotaPencairanDana::class, 'npd_id', 'id');
    }
}
