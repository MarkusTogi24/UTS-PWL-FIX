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
            'nama' => '2018/2019 Semester Ganjil'
        ]);
        Semester::create([
            'nama' => '2018/2019 Semester Genap'
        ]);
        Semester::create([
            'nama' => '2019/2020 Semester Ganjil'
        ]);
        Semester::create([
            'nama' => '2019/2020 Semester Genap'
        ]);
        Semester::create([
            'nama' => '2020/2021 Semester Ganjil'
        ]);
        Semester::create([
            'nama' => '2020/2021 Semester Genap'
        ]);
        Semester::create([
            'nama' => '2021/2022 Semester Ganjil'
        ]);
        Semester::create([
            'nama' => '2021/2022 Semester Genap'
        ]);
    }
}
