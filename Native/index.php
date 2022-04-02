<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS PWL 2022</title>
    
    <link rel="icon" type="image/png" href="./Logo ITERA.png" sizes="32x32">
    <link rel="stylesheet" href="style.css"/>
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
        <div class="w-2/3 m-auto">
            <div class="w-full font-medium m-auto flex justify-between p-2   bg-blue-200">
                <div class="flex">
                    <p class="block">Tampilkan </p>
                    <select class="mx-2 px-1" name="" id="">
                        <option value="">10</option>
                        <option value="">25</option>
                        <option value="">50</option>
                    </select>
                    <p class="block">data</p>
                </div>
                <div class="flex justify-end">
                    <label for="search">Cari</label>
                    <input class="ml-2" type="text" name="" id="search">
                </div>
            </div>
            <?php 
                
            ?>
            <div class="w-full m-auto min-h-[140px]     bg-blue-700">
                <table>
                    <tr>
                        <th>Kode Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Kode Matakuliah</th>
                        <th>Nama Matakuliah</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                    <?php 
                        $datas = [
                            [
                                "kode_kelas" => "1234",
                                "nama_kelas" => "A",
                                "kode_matkul" => "A1234",
                                "nama_matkul" => "Kopi Hitam",
                                "sks" => 3
                            ],
                            [
                                "kode_kelas" => "5678",
                                "nama_kelas" => "B",
                                "kode_matkul" => "B5678",
                                "nama_matkul" => "Teh Manis",
                                "sks" => 2
                            ],
                            [
                                "kode_kelas" => "9876",
                                "nama_kelas" => "C",
                                "kode_matkul" => "C9876",
                                "nama_matkul" => "Susu Dingin",
                                "sks" => 4
                            ],
                            [
                                "kode_kelas" => "1882",
                                "nama_kelas" => "D",
                                "kode_matkul" => "D1882",
                                "nama_matkul" => "Ayam Kecap",
                                "sks" => 3
                            ],
                            [
                                "kode_kelas" => "9653",
                                "nama_kelas" => "E",
                                "kode_matkul" => "E9653",
                                "nama_matkul" => "Martabak Manis",
                                "sks" => 3
                            ],
                            [
                                "kode_kelas" => "1442",
                                "nama_kelas" => "F",
                                "kode_matkul" => "F1442",
                                "nama_matkul" => "Jagung Bakar",
                                "sks" => 3
                            ],
                        ];
                        for ($i=0; $i <sizeof($datas); $i++) { 
                            // echo("
                            //     <td>". $datas[$i]["kode_kelas"] ."</td>
                            //     <td>". $datas[$i]["nama_kelas"] ."</td>
                            //     <td>". $datas[$i]["kode_matakuliah"] ."</td>
                            //     <td>". $datas[$i]["nama_matakuliah"] ."</td>
                            //     <td>". $datas[$i]["sks"] ."</td>
                            //     <td>Aksi</td>
                            // "); 
                            echo($i);
                        }
                    ?>
                    </tr>
                </table>
            </div>
        </div>
        
    </div>
</body>
</html>
