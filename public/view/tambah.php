<?php 
    include_once("../../config/koneksi.php");
    include_once("../controller/tambahbuku.php");

    $bukuController = new BukuController($kon);

    if (isset($_POST['submit'])) {
        $kode_buku = $bukuController->tambahBuku();

        $data = [
            'kode_buku' => $kode_buku,
            'judul' => $_POST['judul'],
            'pengarang' => $_POST['pengarang'],
        ];

        $message = $bukuController->tambahDataBuku($data);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Data Buku</h1>
    <a href="../dashboard.php">| - Home |</a>
    <form action="tambah.php" method="post" name="tambah" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>Kode Buku</td>
                <td><input type="text" name="kode_buku" value="<?php echo($bukuController->tambahBuku()); ?>" readonly></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" required></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td><input type="text" name="pengarang" required></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Tambah Buku">
        <?php if (isset($message)) : ?>
            <div>
                <?php echo($message); ?>
            </div>
        <?php endif; ?>
    </form>
</body>
</html>