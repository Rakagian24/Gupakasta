<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaPencairanDana extends Model
{
    use HasFactory;

    protected $table = 'nota_pencairan_dana';

    protected $fillable = [
        'pptk',
        'kode_sub_kegiatan',
        'tahun',
        'nomer',
    ];

    public $timestamps = false;

    public function sub_kegiatan()
    {
        return $this->belongsTo(SubKegiatan::class, 'kode_sub_kegiatan', 'id');
    }

    public function rincianNota()
    {
        return $this->hasMany(RincianNota::class, 'npd_id', 'id');
    }
}
