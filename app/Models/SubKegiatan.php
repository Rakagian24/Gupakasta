<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKegiatan extends Model
{
    use HasFactory;

    protected $table = 'sub_kegiatan';
    protected $primaryKey = 'kode_sub_kegiatan';
    public $incrementing = false; // Assuming 'kode_urusan' is not auto-incrementing
    protected $keyType = 'string';

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kode_kegiatan');
    }

    public function nota()
    {
        return $this->hasMany(Nota::class, 'kode_program');
    }
}
