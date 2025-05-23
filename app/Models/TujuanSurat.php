<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanSurat extends Model
{
    use HasFactory;

    protected $table = 'tujuan_surat';

    protected $fillable = [
        'nama_penerima',
        'instansi',
        'alamat',
        'kontak',
    ];
}
