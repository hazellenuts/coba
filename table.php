<?php
@include 'config.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM tongtji WHERE id = $id");
    header('location:table.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="style/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        $select = mysqli_query($con, "SELECT * FROM tongtji");
    ?>
    <style>
    body {
        background-image: url("<?php echo $backgroundtable; ?>");
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        margin-top: 100px;
    }
    </style>
    <a href="home.php" class="btn-tambah">Tambah Data</a>
    <img class="kucing" src="assets/peekblackcat-removebg-preview.png" alt="" width="180px" height="auto">
    <div class="container">
        <table class="tabledisplay">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student ID Number</th>
                    <th>Full Name</th>
                    <th>Faculty</th>
                    <th>Tuition Fee Status</th>
                    <th>Profile</th>
                    <th colspan="2">action</th>
                </tr>
            </thead>
            <?php while($row = mysqli_fetch_assoc($select)){?>

            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['nim']?></td>
                <td class="fullname"><?php echo $row['fullname']?></td>
                <td><?php echo $row['fakultas']?></td>
                <td><?php echo $row['statusukt']?></td>
                <td><img src="<?php echo $row['foto']; ?>" height="120"></td>
                <td>
                <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="table.php?delete=<?php echo $row['id']; ?>" class="btn">
                    <i class="fa fa-trash"></i>
                </a>
            </tr>
        <?php } ?>
        </table>
    </div>
    <span>by Gabrielle Rosdiva Ramadhani Herucakra</span>
</body>
</html>
