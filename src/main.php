<?php
$servername = "localhost";
$dbname = "id20040674_terserahwes";
$username = "id20040674_miniproyek";
$password = "N{&X@MVcY]vx7S4w";

$api_key_value = "tPmAT5Ab3j7F9";
$api_key= $id = $nama = $no_kartu = $tanggal = $jam_masuk = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $id = test_input($_POST["id"]);
        $nama = test_input($_POST["nama"]);
        $no_kartu = test_input($_POST["no_kartu"]);
        $tanggal = test_input($_POST["tanggal"]);
        $jam_masuk = test_input($_POST["jam_masuk"]);
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO mahasiswa (id, nama, no_kartu, tanggal, jam_masuk)
        VALUES ('" . $id . "', '" . $nama . "', '" . $no_kartu . "', '" . $tanggal . "', '" . $jam_masuk . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}