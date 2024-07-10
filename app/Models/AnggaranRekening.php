<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggaranRekening extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'anggaranrekenings';

    public function anggaranSubKegiatan()
    {
        return $this->belongsTo(AnggaranSubKegiatan::class);
    }

    public function subRincianObjek()
    {
        return $this->belongsTo(SubRincianObjek::class, 'kode_sub_rincian_objek', 'id');
    }
}
