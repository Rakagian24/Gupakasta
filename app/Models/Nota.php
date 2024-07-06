<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $table = 'npd';

    protected $fillable = [
        'PPTK',
        'kode_program',
        'kode_kegiatan',
        'kode_sub_kegiatan',
        'Tahun',
        'Nomer',
    ];

    public $timestamps = false;

    public function program()
    {
        return $this->belongsTo(Program::class, 'kode_program');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kode_kegiatan');
    }

    public function sub_kegiatan()
    {
        return $this->belongsTo(SubKegiatan::class, 'kode_sub_kegiatan');
    }
}
