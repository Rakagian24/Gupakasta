<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianObjek extends Model
{
    use HasFactory;

    protected $table = 'rincian_objek';
    protected $primaryKey = 'id';

    public function objek()
    {
        return $this->belongsTo(Objek::class, 'kode_objek');
    }

    public function subRincianObjek()
    {
        return $this->hasMany(SubRincianObjek::class, 'id');
    }
}
