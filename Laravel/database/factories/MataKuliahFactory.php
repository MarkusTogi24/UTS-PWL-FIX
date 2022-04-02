<?php

namespace Database\Factories;

use App\Models\Semester;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataKuliah>
 */
class MataKuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode' => ucwords(Str::random(5)),
            'nama' => $this->faker->name(),
            'semester_id' => rand(1,2),
            'isProdi' => rand(0,1),
            'sks' => rand(2,4)

        ];
    }
}
