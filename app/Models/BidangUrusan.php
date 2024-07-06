<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangUrusan extends Model
{
    use HasFactory;

    protected $table = 'bidang_urusan';
    protected $primaryKey = 'kode_bidang_urusan';
    public $incrementing = false; // Assuming 'kode_urusan' is not auto-incrementing
    protected $keyType = 'string';

    public function urusan()
    {
        return $this->belongsTo(Urusan::class, 'kode_urusan');
    }

    public function program()
    {
        return $this->hasMany(Program::class, 'kode_bidang_urusan');
    }
}
