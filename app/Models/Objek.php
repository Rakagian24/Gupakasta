<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objek extends Model
{
    use HasFactory;

    protected $table = 'objek';
    protected $primaryKey = 'id';

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'kode_jenis');
    }

    public function rincianObjek()
    {
        return $this->hasMany(RincianObjek::class, 'id');
    }
}
