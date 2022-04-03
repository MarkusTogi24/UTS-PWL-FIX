<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class KelasController extends Controller
{
    public function index ()
    {
        $semesters = Semester::query()->get();

        $matakuliah = MataKuliah::query()
            ->where('semester_id', 1)
            ->where('isProdi', 1)
            ->get()
            ->pluck('id')
            ->toArray();

        $kelas_count = Kelas::query()
            ->with('matakuliah')
            ->whereIn('mata_kuliah_id', $matakuliah)
            ->count();

        $kelas = Kelas::query()
            ->with('matakuliah')
            ->whereIn('mata_kuliah_id', $matakuliah)
            ->paginate(10,['*'],'page',1);

        return view('index', compact('kelas', 'kelas_count', 'semesters'));
    }

    public function detail($id){
        $kelas = Kelas::query()
            ->with(['matakuliah', 'mahasiswas', 'dosen'])
            ->find($id);

        return view('detail', compact('kelas'));
    }
    
    public function get_matakuliah($selected_semester = 1, $selected_limit = 10, $selected_page = 1, $isProdi = 1)
    {   
        $matakuliah = MataKuliah::query()
            ->where('semester_id', $selected_semester)
            ->where('isProdi', $isProdi)
            ->get()
            ->pluck('id')
            ->toArray();

        $results = Kelas::query()
            ->with('matakuliah')
            ->whereIn('mata_kuliah_id', $matakuliah)
            ->paginate($selected_limit,['*'],'page',$selected_page);
            
        return Response::json($results);
    }

    public function cari_matakuliah($keyword, $selected_semester = 1, $isProdi = 1){

        $matakuliah = MataKuliah::query()
            ->where('semester_id', $selected_semester)
            ->where('isProdi', $isProdi)
            ->where('nama', 'LIKE', '%'.$keyword.'%')
            ->get()
            ->pluck('id')
            ->toArray();

        $results = Kelas::query()
            ->with('matakuliah')
            ->whereIn('mata_kuliah_id', $matakuliah)
            ->get();

        return Response::json($results);
    }
}
