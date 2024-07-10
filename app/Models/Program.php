<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'program';
    protected $primaryKey = 'kode_program';
    public $incrementing = false; // Assuming 'kode_urusan' is not auto-incrementing
    // protected $keyType = 'string';

    public function bidangUrusan()
    {
        return $this->belongsTo(BidangUrusan::class, 'kode_bidang_urusan');
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'kode_program');
    }
}
