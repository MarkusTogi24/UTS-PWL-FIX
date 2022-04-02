<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{

    public function definition()
    {
        $huruf = ['A','B','C','D'];

        return [
            'kode' => $this->faker->randomNumber(5, true),
            'nama' => $huruf[rand(0,3)],
            'mata_kuliah_id' => MataKuliah::factory(),
            'dosen_id' => Dosen::factory()
        ];
    }
}
