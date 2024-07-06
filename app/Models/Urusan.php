<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urusan extends Model
{
    use HasFactory;

    protected $table = 'urusan';
    protected $primaryKey = 'kode_urusan';
    public $incrementing = false; // Assuming 'kode_urusan' is not auto-incrementing
    // protected $keyType = 'string';

    public function bidangUrusan()
    {
        return $this->hasMany(BidangUrusan::class, 'kode_urusan');
    }
}
