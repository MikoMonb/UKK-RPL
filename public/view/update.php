<?php 
    include_once("../../config/koneksi.php");
    include_once("../controller/updatebuku.php");

    $bukuController = new BukuController($kon);

    if (isset($_POST['update'])) {
        $kode_buku = $_POST['kode_buku'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];

        $message = $bukuController->updateBuku($kode_buku, $judul, $pengarang);
        echo $message;

        header("Location: ../dashboard.php");
    }

    $kode_buku = null;
    $judul = null;
    $pengarang = null;

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $result = $bukuController->getDataBuku($id);

        if ($result) {
            $id = $result['kode_buku'];
            $judul = $result['judul'];
            $pengarang = $result['pengarang'];
        } else {
            echo "ID Tidak ditemukan.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>
</head>
<body>
    <h1>Update Data Buku</h1>
    <a href="../dashboard.php">| - Home |</a>
    <form action="update.php" name="update" method="post" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>Kode Buku</td>
                <td><input type="text" name="kode_buku" value="<?php echo $id; ?>"></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" value="<?php echo $judul; ?>"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td><input type="text" name="pengarang" value="<?php echo $pengarang; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="kode_buku" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>