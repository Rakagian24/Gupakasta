<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggaranSubKegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'anggaransubkegiatans';

    public function anggaranKegiatan()
    {
        return $this->belongsTo(AnggaranKegiatan::class);
    }

    public function anggaranRekening()
    {
        return $this->hasMany(AnggaranRekening::class);
    }

    public function subKegiatan()
    {
        return $this->belongsTo(SubKegiatan::class, 'kode_sub_kegiatan', 'id');
    }
}
