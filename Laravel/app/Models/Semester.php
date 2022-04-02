<?php

namespace App\Models;

use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'nama'
    ];

    public function matakuliahs(): HasMany
    {
        return $this->hasMany(MataKuliah::class);
    }
}
