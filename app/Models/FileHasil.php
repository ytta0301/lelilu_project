<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileHasil extends Model
{
    protected $table = 'file_hasils';
    protected $primaryKey = 'id_file';
    public $timestamps = false;

    protected $fillable = [
        'pemesanan_id',
        'gambar_hasil',
        'tampil_portofolio',
        'tanggal_upload',
    ];
}