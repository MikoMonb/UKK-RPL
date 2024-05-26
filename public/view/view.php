<?php 
    include_once("../../config/koneksi.php");
    include_once("../controller/viewdata.php");

    $bukuController = new BukuController($kon);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data Buku</title>
</head>
<body>
    <h2>View Data Buku - <?php echo $id; ?></h2>
    <a href="../dashboard.php">| - Home |</a>
    <br><br>
    <form action="view.php" name="view" method="get">
        <table border="0">
            <tr>
                <td><b>Kode Buku</b></td>
                <td><b> : </b></td>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <td><b>Judul</b></td>
                <td><b> : </b></td>
                <td><?php echo $judul; ?></td>
            </tr>
            <tr>
                <td><b>Pengarang</b></td>
                <td><b> : </b></td>
                <td><?php echo $pengarang; ?></td>
            </tr>
        </table>
    </form>
</body>
</html>