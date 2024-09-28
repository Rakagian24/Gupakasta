<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pajak';

    public $timestamps = false;

    public function bukuRincianObjek()
    {
        return $this->belongsTo(BukuRincianObjek::class, 'kode_bro', 'id');
    }
}
