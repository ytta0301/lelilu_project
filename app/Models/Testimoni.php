<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimonis';
    protected $primaryKey = 'id_testimoni';

    protected $fillable = ['user_id', 'pemesanan_id', 'isi_testimoni', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}