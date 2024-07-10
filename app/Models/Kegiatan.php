<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    protected $primaryKey = 'kode_kegiatan';
    public $incrementing = false;
    protected $keyType = 'string';

    public function program()
    {
        return $this->belongsTo(Program::class, 'kode_program');
    }

    public function subKegiatan()
    {
        return $this->hasMany(SubKegiatan::class, 'kode_kegiatan');
    }

    public function anggaranSubKegiatan()
    {
        return $this->hasMany(AnggaranSubKegiatan::class, 'kode_kegiatan', 'kode_kegiatan');
    }
}
