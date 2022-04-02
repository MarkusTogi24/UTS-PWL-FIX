<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama'
    ];

    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class);
    }
}
