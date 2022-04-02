<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SemesterSeeder extends Seeder
{
    public function run()
    {
        Semester::create([
            'nama' => '2018/2019 Ganjil'
        ]);
        Semester::create([
            'nama' => '2018/2019 Genap'
        ]);
        Semester::create([
            'nama' => '2019/2020 Ganjil'
        ]);
        Semester::create([
            'nama' => '2019/2020 Genap'
        ]);
        Semester::create([
            'nama' => '2020/2021 Ganjil'
        ]);
        Semester::create([
            'nama' => '2020/2021 Genap'
        ]);
        Semester::create([
            'nama' => '2021/2022 Ganjil'
        ]);
        Semester::create([
            'nama' => '2021/2022 Genap'
        ]);
    }
}
