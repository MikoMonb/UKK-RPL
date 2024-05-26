<?php
    include_once("../config/koneksi.php");

    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Daftar Buku</title>
</head>
<body>
    <form action="dashboard.php" method="get">
        <label for="cari">Cari: </label>
        <input type="text" id="cari" name="cari">
        <input type="submit" value="Cari">
    </form>
    <?php 
        $cari = "";
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
        }
    ?>
    <table border="1">
        <h1>Daftar Buku</h1>
        <a href="view/tambah.php">| + Tambah Data |</a><br>
            <?php
                if ($cari != "") {
                    $ambildata = mysqli_query($kon, "SELECT * FROM buku WHERE kode_buku LIKE '%" . $cari . "%' OR judul LIKE '%" . $cari . "%' OR pengarang LIKE '%" . $cari . "%'");
                } else {
                    $ambildata = mysqli_query($kon, "SELECT * FROM buku ORDER BY kode_buku ASC");
                }
                $num = mysqli_num_rows($ambildata);
            ?>
        <tr>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Aksi</th>
        </tr>
        <?php 
            while($userAmbilData = mysqli_fetch_array($ambildata)) {
                echo "<tr>";
                    echo "<td>" . $userAmbilData['kode_buku'] . "</td>";
                    echo "<td>" . $userAmbilData['judul'] . "</td>";
                    echo "<td>" . $userAmbilData['pengarang'] . "</td>";
                    echo "<td>
                        |<a href='view/update.php?id=" . $userAmbilData['kode_buku'] . "'> Update </a>|
                        |<a href='view/view.php?id=" . $userAmbilData['kode_buku'] . "'> View </a>|
                        |<a href='controller/hapusbuku.php?id=". $userAmbilData['kode_buku'] ."'> Hapus </a>|
                        </td>";
                echo "</tr>";
            }
        ?>
    </table>
    <a href="../logout.php">| - Logout |</a>
</body>
</html>
