<?php
@include 'config.php';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = "SELECT * FROM tongtji WHERE id=$id";
    $result = mysqli_query($con, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        $nim = $data['nim'];
        $fullname = $data['fullname'];
        $fakultas = $data['fakultas'];
        $statusukt = $data['statusukt'];
        $foto = $data['foto'];
    } else {
        // Penanganan kesalahan jika data tidak ditemukan
        echo "Data tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style/style.css">
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
            <form method="POST" action="proses_edit.php">
                <!-- Input tersembunyi untuk ID -->
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" placeholder="Full Name" name="fullname" class="box" value="<?php echo $fullname; ?>">
                <input type="text" placeholder="Student ID Number" name="nim" class="box" value="<?php echo $nim; ?>">
                <input type="text" placeholder="Faculty" name="fakultas" class="box" value="<?php echo $fakultas; ?>">
                <input type="text" placeholder="Image URL" name="foto" class="box" value="<?php echo $foto; ?>">
                <select name="statusukt" class="box select">
                    <option selected disabled>Tuition Fee Status</option>
                    <option value="sudah" <?php if ($statusukt == 'sudah') echo 'selected'; ?>>Paid</option>
                    <option value="belum" <?php if ($statusukt == 'belum') echo 'selected'; ?>>Not Paid</option>
                </select>
                
                <input type="submit" class="btn" name="tambah" value="Edit">
            </form>
        </div>
    </div>
</body>
</html>
