<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SemesterSeeder::class);
        $this->call(MahasiswaSeeder::class);

        Dosen::factory()->count(10)->create();

        Semester::all()
            ->each(function ($semester) {
                MataKuliah::factory()
                    ->for($semester)
                    ->count(rand(1, 20))
                    ->create()
                    ->each(function ($matakuliah){
                        Kelas::factory()
                        ->count(rand(1, 4))
                        ->for($matakuliah)->create()
                        ->each(function ($kelas) {
                                $mahasiswa = Mahasiswa::query()
                                ->limit(20)
                                ->inRandomOrder()
                                ->get();
                                $dosen = Dosen::query()
                                ->inRandomOrder()
                                ->first();
                                $kelas->update(['dosen_id' => $dosen->id]);
                                $kelas->mahasiswas()->sync($mahasiswa->pluck('id'));
                            });
                    });
            });
    }
}
