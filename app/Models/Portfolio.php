<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Portfolio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'portfolios';

    protected $fillable = [
        'kode',
        'nama_kreator',
        'deskripsi',
        'gambar',
        'is_aktif',
    ];

    protected $casts = [
        'is_aktif' => 'boolean',
    ];

    protected $appends = ['gambar_url'];

    protected static function booted(): void
    {
        static::creating(function (Portfolio $portfolio) {
            if (empty($portfolio->kode)) {
                $last = static::withTrashed()->orderByDesc('id')->value('kode');
                $next = $last ? (int) substr($last, 3) + 1 : 1;
                $portfolio->kode = 'PF-' . str_pad($next, 3, '0', STR_PAD_LEFT);
            }
        });
    }

    public function getGambarUrlAttribute(): ?string
    {
        return $this->gambar
            ? Storage::url($this->gambar)
            : null;
    }

    public function scopeAktif($query)
    {
        return $query->where('is_aktif', true);
    }
}