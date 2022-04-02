<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'mata_kuliah_id',
        'kode',
        'nama',
        'dosen_id'
    ];

    public function mataKuliah(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function mahasiswas(): BelongsToMany
    {
        return $this->belongsToMany(Mahasiswa::class, 'kelas_mahasiswa', 'kelas_id', 'mahasiswa_id');
    }

    public function dosen(): HasOne
    {
        return $this->hasOne(Dosen::class);
    }
}
