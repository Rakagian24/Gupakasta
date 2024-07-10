<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKegiatan extends Model
{
    use HasFactory;

    protected $table = 'sub_kegiatan';
    protected $primaryKey = 'kode_sub_kegiatan';
    public $incrementing = false;
    protected $keyType = 'string';

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kode_kegiatan', 'kode_kegiatan');
    }

    public function anggaranSubKegiatan()
    {
        return $this->hasMany(AnggaranSubKegiatan::class, 'kode_sub_kegiatan', 'id');
    }

    public function nota_pencairan_dana()
    {
        return $this->hasMany(NotaPencairanDana::class, 'kode_sub_kegiatan', 'id');
    }
}
