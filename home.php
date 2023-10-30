<?php
@include 'config.php';

if(isset($_POST['tambah'])){
    $fullname = $_POST["fullname"];
    $nim = $_POST["nim"];
    $fakultas = $_POST["fakultas"];
    $statusukt = $_POST["statusukt"];

    // Validasi URL gambar
    $foto = $_POST["foto"];
    if (filter_var($foto, FILTER_VALIDATE_URL) === false) {
        echo "URL gambar tidak valid.";
        exit;
    }

    // Selanjutnya, Anda dapat menggunakan fungsi getimagesize() untuk memeriksa apakah URL gambar mengarah ke gambar yang valid.
    $size = @getimagesize($foto);
    if (!$size || !in_array($size[2], [IMAGETYPE_JPEG, IMAGETYPE_PNG])) {
        echo "URL yang dimasukkan bukanlah URL gambar yang valid.";
        exit;
    }

    mysqli_query($con, "INSERT INTO tongtji (fullname, nim, fakultas, statusukt, foto) VALUES('$fullname', '$nim', '$fakultas', '$statusukt', '$foto')") or die("Error Occurred.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- CSS -->
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    <style>
        body {
            background-image: url("<?php echo $background; ?>");
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <div class="container">
        <img src="assets/peekblackcat-removebg-preview.png" alt="" width="180px" height="auto">
        <div class="formdata">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="text" placeholder="Full Name" name="fullname" class="box">
                <input type="text" placeholder="Student ID Number" name="nim" class="box">
                <input type="text" placeholder="Faculty" name="fakultas" class="box">
                <input type="text" placeholder="Image URL" name="foto" class="box">
                <select name="statusukt" class="box select">
                    <option selected disabled>Tuition Fee Status</option>
                    <option value="sudah">Paid</option>
                    <option value="belum">Not Paid</option>
                </select>
                <input type="submit" class="btn" name="tambah" value="Submit">
                <a href="table.php" class="shortcut"><br>Click here to go to database</a>
            </form>
            
        </div>
        
    </div>

</body>
</html>