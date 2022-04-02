<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS PWL 2022</title>
    
    <link rel="icon" type="image/png" href="./Logo ITERA.png" sizes="32x32">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="w-full min-h-screen bg-white">
        <div class="w-full flex text-sm font-medium justify-center py-6">
            <form class="w-1/2 flex justify-between" action="" method="post">
                <label class="py-1" for="semester">Semester</label>
                <select class="w-3/4 px-1 border border-gray-500" name="semester" id="semester">
                    <option value="">2018/2019 Ganjil</option>
                    <option value="">2018/2019 Genap</option>
                    <option value="">2019/2020 Ganjil</option>
                    <option value="">2019/2020 Genap</option>
                    <option value="">2020/2021 Ganjil</option>
                    <option value="">2020/2021 Genap</option>
                </select>
                <button class="w-fit bg-blue-400 flex rounded-md font-medium text-white p-1 pr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                    Tampilkan
                </button>
            </form>
        </div>
        <div class="w-2/3 m-auto  drop-shadow-lg shadow-slate-200">
            <div class="w-full font-medium m-auto flex justify-between p-4 bg-blue-50">
                <div class="flex">
                    <p class="block">Tampilkan </p>
                    <select class="mx-3 px-1" name="" id="">
                        <option value="">10</option>
                        <option value="">25</option>
                        <option value="">50</option>
                    </select>
                    <p class="block">data</p>
                </div>
                <div class="flex justify-end">
                    <label for="search">Cari</label>
                    <input class="ml-3" type="text" name="" id="search">
                </div>
            </div>
            <div class="w-full p-4 border-y-2 border-blue-600 bg-blue-50         min-h-[140px]">
                <table class="border-collapse w-full border-b-2 border-gray-500">
                    <tr class="bg-blue-200 text-gray-500 border-b-2 border-gray-500">
                        <th class="py-1 ">No</th>
                        <th class="py-1 ">Kode Kelas</th>
                        <th class="py-1 ">Nama Kelas</th>
                        <th class="py-1 ">Kode Matakuliah</th>
                        <th class="py-1 ">Nama Matakuliah</th>
                        <th class="py-1 ">SKS</th>
                        <th class="py-1 ">Aksi</th>
                    </tr>
                    {{-- {{ $kelas->count() }} --}}
                    @foreach ($kelas as $kls)
                        <tr class="text-gray-600 border-b border-blue-300">
                            <td class="{{ $loop->index % 2 == 0 ? 'bg-blue-100' : '' }} py-1 text-center">{{ $loop->index+1 }}</td>
                            <td class="{{ $loop->index % 2 == 0 ? 'bg-blue-100' : '' }} py-1 text-center">{{ $kls->kode }}</td>
                            <td class="{{ $loop->index % 2 == 0 ? 'bg-blue-100' : '' }} py-1 text-center">{{ $kls->nama }}</td>
                            <td class="{{ $loop->index % 2 == 0 ? 'bg-blue-100' : '' }} py-1 text-center">{{ $kls->matakuliah->kode }}</td>
                            <td class="{{ $loop->index % 2 == 0 ? 'bg-blue-100' : '' }} py-1 ">{{ $kls->matakuliah->nama }}</td>
                            <td class="{{ $loop->index % 2 == 0 ? 'bg-blue-100' : '' }} py-1 text-center">{{ $kls->matakuliah->sks }}</td>
                            <td class="{{ $loop->index % 2 == 0 ? 'bg-blue-100' : '' }} py-1 text-center">
                                <a class="flex py-1 px-2 pr-3 w-fit m-auto rounded bg-blue-500 text-gray-100 text-xs font-light hover:bg-blue-600 hover:text-white" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                    Lihat
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="w-full font-medium m-auto flex justify-between p-4 bg-blue-50">
                <div class="flex">
                    Menampilkan {{ $kelas->count() }} dari {{ $kelas->count() }} data 
                </div>
                <div class="flex justify-end">
                    <a class="py-1 px-3 border" href="#">Previous</a>
                    <a class="py-1 px-3 border" href="#">1</a>
                    <a class="py-1 px-3 border" href="#" class="active">2</a>
                    <a class="py-1 px-3 border" href="#">3</a>
                    <a class="py-1 px-3 border" href="#">4</a>
                    <a class="py-1 px-3 border" href="#">5</a>
                    <a class="py-1 px-3 border" href="#">6</a>
                    <a class="py-1 px-3 border" href="#">Next</a>
                </div>
            </div>
        </div>
        
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
