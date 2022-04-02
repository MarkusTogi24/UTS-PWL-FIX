<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS PWL 2022</title>
    
    {{-- <link rel="icon" type="image/png" href="./Logo ITERA.png" sizes="32x32"> --}}

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="w-full min-h-screen bg-white">

        <!-- PILIH SEMESTER -->
        <div class="w-2/3 m-auto flex text-sm font-medium justify-center py-6">
            <label class="py-1 mr-3" for="semester_select">Semester</label>
            <select class="w-5/6 px-1 border border-gray-500" name="semester_select" id="semester_select" onchange="get_Data()">
                @foreach ($semesters as $semester)
                    <option value="{{ $semester->id }}">{{ $semester->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="w-2/3 m-auto drop-shadow-lg shadow-slate-200">
            <!-- PILIH JENIS MATA KULIAH -->
            <div class="w-full font-medium m-auto flex justify-start pt-4 pb-2 px-4 bg-blue-50">
                <div class="mr-4">
                    <input onchange="get_Data()" type="radio" id="prodi" name="isProdi" value="prodi" checked>
                    <label class="text-base" for="prodi">Mata Kuliah Prodi</label>
                </div>
                <div class="mr-4">
                    <input onchange="get_Data()" type="radio" id="bukanprodi" name="isProdi" value="bukanprodi">
                    <label class="text-base" for="bukanprodi">Mata Kuliah Luar Prodi</label>
                </div>
            </div>
            <div class="w-full font-medium m-auto flex justify-between p-4 bg-blue-50">
                <!-- PILIH LIMIT -->
                <div class="flex">
                    <p class="block">Tampilkan </p>
                    <select class="mx-3 px-1" name="limit_select" id="limit_select" onchange="get_Data()">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                    <p class="block">data</p>
                </div>
                <!-- CARI DATA -->
                <div class="flex justify-end">
                    <label for="search">Cari</label>
                    <input class="ml-3" type="text" name="" id="search">
                </div>
            </div>
            <div class="w-full p-4 border-y-2 border-blue-600 bg-blue-50         min-h-[140px]">
                <table class="border-collapse w-full border-b-2 border-gray-500" id="datatable">
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
                                <a class="flex py-1 px-2 pr-3 w-fit m-auto rounded bg-blue-500 text-gray-100 text-xs font-light hover:bg-blue-600 hover:text-white" href="{{ route('detail', [$kls->id]) }}">
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
                <div>
                    Menampilkan <span id="mulai_ditampilkan"> 1 </span> - <span id="akhir_ditampilkan"> 10 </span> dari <span id="jumlah_semua_data"> {{ $kelas_count }} </span> data 
                </div>
                <div class="flex justify-end" id="pagination" value="">
                    <a onclick="select_page(1)" class="py-1 px-3 border cursor-pointer hover:bg-blue-200 bg-blue-300 ">1</a>
                    <a onclick="select_page(2)" class="py-1 px-3 border cursor-pointer hover:bg-blue-200">2</a>
                    <a onclick="select_page(3)" class="py-1 px-3 border cursor-pointer hover:bg-blue-200">3</a>
                    <a onclick="select_page(4)" class="py-1 px-3 border cursor-pointer hover:bg-blue-200">4</a>
                    <a onclick="select_page(5)" class="py-1 px-3 border cursor-pointer hover:bg-blue-200">5</a>
                    <a onclick="select_page(6)" class="py-1 px-3 border cursor-pointer hover:bg-blue-200">6</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">

        function select_page(page){
            document.getElementById("pagination").value = page;
            get_Data();
        }

        async function get_Data(){
            // Proses pengambilan elemen penting

            // Select Option 'Semester' dan 'Limit'
            const semester              = document.getElementById("semester_select");
            const limit                 = document.getElementById("limit_select");
            
            // Informasi offset
            const show_start            = document.getElementById("mulai_ditampilkan");
            const show_end              = document.getElementById("akhir_ditampilkan");
            const all_data_count        = document.getElementById("jumlah_semua_data");

            // Tabel Utama
            const datatable             = document.getElementById("datatable");

            // Pagination
            const pagination            = document.getElementById("pagination");

            // IsProdi
            const isProdi               = document.getElementById("prodi");

            if(isProdi.checked==true){
                selected_type = 1;
            }else{
                selected_type = 0;
            }

            if(pagination.value == null){
                pagination.value = 1; 
            }

            // Proses pengambilan JSON menggunakan JS Fetch API
            let selected_semester       = semester.value;
            let selected_limit          = limit.value;
            let selected_page           = pagination.value;

            let URL                     = '/' + selected_semester + '/' + selected_limit + '/' + selected_page + '/' + selected_type;
            let ResResult               = await fetch(URL, { method : 'get' });
            let Result                  = await ResResult.json();

            let jumlah_total_halaman    = Result.links.length-2
            
            // Console Log
            console.log("ID semester dipilih    = "+selected_semester);
            console.log("Limit dipilih          = "+selected_limit);
            console.log("Halaman dipilih        = "+pagination.value)
            console.log("Jumlah total data      = "+Result.total);
            console.log("Jumlah total halaman   = "+jumlah_total_halaman);

            if(isProdi.checked==true){
                console.log("Data dipilih           = Mata Kuliah Prodi");
            }else{
                console.log("Data dipilih           = Mata Kuliah Luar Prodi");
            }
            console.log(Result);

            // Proses Manipulasi Dokumen
            show_start.innerText        = Result.from;
            show_end.innerText          = Result.to;
            all_data_count.innerText    = Result.total;

            datatable.innerHTML         = '';

            datatable.innerHTML        += "" 
                +"<tr class=\"bg-blue-200 text-gray-500 border-b-2 border-gray-500\">"
                    +"<th class=\"py-1 \">No</th>"
                    +"<th class=\"py-1 \">Kode Kelas</th>"
                    +"<th class=\"py-1 \">Nama Kelas</th>"
                    +"<th class=\"py-1 \">Kode Matakuliah</th>"
                    +"<th class=\"py-1 \">Nama Matakuliah</th>"
                    +"<th class=\"py-1 \">SKS</th>"
                    +"<th class=\"py-1 \">Aksi</th>"
                +"</tr>";

            for (let i=0; i<Result['data'].length; i++){
                if (i % 2 == 0){
                    datatable.innerHTML += ""
                        +"<tr class=\"text-gray-600 border-b border-blue-300\">"
                            +"<td class=\"bg-blue-100 py-1 text-center\">" + (i+Result.from) + "</td>"
                            +"<td class=\"bg-blue-100 py-1 text-center\">" + Result['data'][i]['kode'] + "</td>"
                            +"<td class=\"bg-blue-100 py-1 text-center\">" + Result['data'][i]['nama'] + "</td>"
                            +"<td class=\"bg-blue-100 py-1 text-center\">" + Result['data'][i]['matakuliah']['kode'] + "</td>"
                            +"<td class=\"bg-blue-100 py-1 \">" + Result['data'][i]['matakuliah']['nama'] + "</td>"
                            +"<td class=\"bg-blue-100 py-1 text-center\">" + Result['data'][i]['matakuliah']['sks'] + "</td>"
                            +"<td class=\"bg-blue-100 py-1 text-center\">"
                                +"<a class=\"flex py-1 px-2 pr-3 w-fit m-auto rounded bg-blue-500 text-gray-100 text-xs font-light hover:bg-blue-600 hover:text-white\" href=\"\">"
                                    +"<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-4 w-4 mr-2\" viewBox=\"0 0 20 20\" fill=\"currentColor\">"
                                        +"<path d=\"M10 12a2 2 0 100-4 2 2 0 000 4z\"/>"
                                        +"<path fill-rule=\"evenodd\" d=\"M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z\" clip-rule=\"evenodd\"/>"
                                    +"</svg>"
                                    +"Lihat"
                                +"</a>"
                            +"</td>"
                        +"</tr>";
                }else{
                    datatable.innerHTML += ""
                        +"<tr class=\"text-gray-600 border-b border-blue-300\">"
                            +"<td class=\"py-1 text-center\">" + (i+Result.from) + "</td>"
                            +"<td class=\"py-1 text-center\">" + Result['data'][i]['kode'] + "</td>"
                            +"<td class=\"py-1 text-center\">" + Result['data'][i]['nama'] + "</td>"
                            +"<td class=\"py-1 text-center\">" + Result['data'][i]['matakuliah']['kode'] + "</td>"
                            +"<td class=\"py-1 \">" + Result['data'][i]['matakuliah']['nama'] + "</td>"
                            +"<td class=\"py-1 text-center\">" + Result['data'][i]['matakuliah']['sks'] + "</td>"
                            +"<td class=\"py-1 text-center\">"
                                +"<a class=\"flex py-1 px-2 pr-3 w-fit m-auto rounded bg-blue-500 text-gray-100 text-xs font-light hover:bg-blue-600 hover:text-white\" href=\"\">"
                                    +"<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-4 w-4 mr-2\" viewBox=\"0 0 20 20\" fill=\"currentColor\">"
                                        +"<path d=\"M10 12a2 2 0 100-4 2 2 0 000 4z\"/>"
                                        +"<path fill-rule=\"evenodd\" d=\"M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z\" clip-rule=\"evenodd\"/>"
                                    +"</svg>"
                                    +"Lihat"
                                +"</a>"
                            +"</td>"
                        +"</tr>";
                }
            }

            pagination.innerHTML        = "";

            for(let i=1; i<=jumlah_total_halaman; i++){
                pagination.innerHTML       += ""
                    +"<a onclick=\"select_page("+i+")\" class=\"py-1 px-3 border cursor-pointer hover:bg-blue-200 \">"+i+"</a>";
            }

            pagination.value = 1;
        }

    </script>

</body>
</html>
