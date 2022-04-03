<?php

    function query($query){
        $servername     = "localhost";
        $username       = "root";
        $password       = "";
        $dbname         = "uts_pwl_native";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die($conn->connect_error);
        }

        $result = $conn->query($query);

        return $result;
    }

    // function index(){
    //     $matakuliah = 
    // }

    // SELECT * FROM semesters
    // Untuk select option semester

    // SELECT COUNT(*) AS AGGREGATE FROM kelas WHERE mata_kuliah_id IN (3, 4, 6, 8, 10, 14, 17, 18, 19)
    // Untuk jumlah data yang ditampilkan

    // SELECT * FROM mata_kuliahs WHERE semester_id = 1 AND isProdi = 1
    // Untuk select option semester

    // SELECT * FROM kelas WHERE mata_kuliah_id IN (3, 4, 6, 8, 10, 14, 17, 18, 19) limit 10 offset 0
    // SELECT * FROM mata_kuliahs WHERE mata_kuliahs.id IN (3, 4, 6, 8, 10)


    $query = "SELECT id FROM mata_kuliahs WHERE semester_id = 1 AND isProdi = 1";

    $result             = query($query);
    $id_matkul          = mysqli_fetch_array($result);

    $id_matkul_length   = $result -> lengths;

    foreach ($result -> lengths as $i => $val) {
        printf("Field %2d has length: %2d\n", $i + 1, $val);
    }
    // echo($id_matkul_length);
    // echo('<br>');
    // for ($i=0; $i < $id_matkul_length; $i++) { 
    //     echo($id_matkul[$i]);
    //     echo('<br>');
    // }

    // var_dump( mysqli_fetch_object($result));


?>