<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubRincianObjek extends Model
{
    use HasFactory;

    protected $table = 'sub_rincian_objek';
    protected $primaryKey = 'id';

    public function rincianObjek()
    {
        return $this->belongsTo(RincianObjek::class, 'kode_rincian_objek');
    }

    public function anggaranRekening()
    {
        return $this->hasMany(AnggaranRekening::class, 'kode_sub_rincian_objek', 'id');
    }
}
