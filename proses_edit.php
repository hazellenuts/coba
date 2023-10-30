<?php
@include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $fullname = $_POST['fullname'];
    $fakultas = $_POST['fakultas'];
    $statusukt = $_POST['statusukt'];
    $foto = $_POST['foto'];
    
    $query = "UPDATE tongtji SET nim='$nim', fullname='$fullname', fakultas='$fakultas', statusukt='$statusukt', foto='$foto' WHERE id=$id";

    if (mysqli_query($con, $query)) {
        header('Location: table.php');
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($con);
    }
}
?>
