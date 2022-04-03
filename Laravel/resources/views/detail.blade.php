<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UTS PWL 2020 - Detail Kelas</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="w-full py-4">
        <div class="bg-blue-50 w-2/3 m-auto min-h-screen drop-shadow-lg shadow-slate-200 p-2">
            <h1 class="block text-lg font-semibold text-center p-3 bg-blue-200">{{ $kelas->matakuliah->nama }} - R{{ $kelas->nama }}</h1>
            <div class="w-full flex border-b">
                <div class="w-1/5 p-1 flex justify-between">
                    <h1 class="block w-fit">Kode/Nama Kelas</h1>
                    <h1 class="block w-fit">:</h1>
                </div>
                <h1 class="block p-1 ml-2">{{ $kelas->kode }}/{{ $kelas->nama }}</h1>
            </div>
            <div class="w-full flex border-b">
                <div class="w-1/5 p-1 flex justify-between">
                    <h1 class="block w-fit">Kode Mata Kuliah</h1>
                    <h1 class="block w-fit">:</h1>
                </div>
                <h1 class="block p-1 ml-2">{{ $kelas->matakuliah->kode }}</h1>
            </div>
            <div class="w-full flex border-b">
                <div class="w-1/5 p-1 flex justify-between">
                    <h1 class="block w-fit">Dosen</h1>
                    <h1 class="block w-fit">:</h1>
                </div>
                <h1 class="block p-1 ml-2">{{ $kelas->dosen->nip }} - {{ $kelas->dosen->nama }}</h1>
            </div>
            <div class="w-full flex border-b">
                <div class="w-1/5 p-1 flex justify-between">
                    <h1 class="block w-fit">Bobot SKS</h1>
                    <h1 class="block w-fit">:</h1>
                </div>
                <h1 class="block p-1 ml-2">{{ $kelas->matakuliah->sks }}</h1>
            </div>

            <div class="w-full p-4 border-y-2 border-blue-600 bg-blue-50 mt-4">
                <table class="border-collapse w-full border-b-2 border-gray-500" id="datatable">
                    <tr class="bg-blue-200 text-gray-500 border-b-2 border-gray-500">
                        <th class="py-1 ">No</th>
                        <th class="py-1 ">NIM Mahasiswa</th>
                        <th class="py-1 ">Nama Mahasiswa</th>
                    </tr>
                    {{-- {{ $kelas->count() }} --}}
                    @foreach ($kelas->mahasiswas as $mhs)
                        <tr class="text-gray-600 border-b border-blue-300">
                            <td class="{{ $loop->index % 2 == 0 ? 'bg-blue-100' : '' }} py-1 text-center">{{ $loop->index+1 }}</td>
                            <td class="{{ $loop->index % 2 == 0 ? 'bg-blue-100' : '' }} py-1 text-center">{{ $mhs->nim }}</td>
                            <td class="{{ $loop->index % 2 == 0 ? 'bg-blue-100' : '' }} py-1">{{ $mhs->nama }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        
        
    </div>
</body>
</html>