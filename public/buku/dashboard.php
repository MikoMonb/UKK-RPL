<?php 
    include_once("../../config/koneksi.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-xl font-bold pl-8">WebBuku</a>
            <div class="flex space-x-4 pr-4">
                <a href="dashboard.php" class="hover:bg-gray-700 px-3 py-2 rounded">Library</a>
                <a href="../dashboard.php" class="hover:bg-gray-700 px-3 py-2 rounded">Article</a>
                <a href="../../logout.php" class="hover:bg-red-700 px-3 py-2 rounded">Logout</a>
            </div>
        </div>
    </div>

    <div class="container mx-auto my-8">
        <form action="dashboard.php" method="get" class="mb-4">
            <label for="cari" class="block">Cari:</label>
            <div class="flex">
                <input type="text" id="cari" name="cari" class="w-full px-4 py-2 border rounded-l focus:outline-none focus:border-blue-500">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Cari</button>
            </div>
        </form>
        <?php 
            $cari = "";
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
            }
        ?>
        <h1 class="text-2xl font-bold mb-4">Daftar Buku</h1>
        <div class="mb-4">
            <a href="view/tambah.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">+ Tambah Data</a>
        </div>
        
        <?php
            if ($cari != "") {
                $ambildata = mysqli_query($kon, "SELECT * FROM buku WHERE kode_buku LIKE '%" . $cari . "%' OR judul LIKE '%" . $cari . "%' OR pengarang LIKE '%" . $cari . "%'");
            } else {
                $ambildata = mysqli_query($kon, "SELECT * FROM buku ORDER BY kode_buku ASC");
            }
            $num = mysqli_num_rows($ambildata);
        ?>

        <table class="w-full border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-200 text-gray-800 border border-gray-400">Kode Buku</th>
                    <th class="px-4 py-2 bg-gray-200 text-gray-800 border border-gray-400">Judul Buku</th>
                    <th class="px-4 py-2 bg-gray-200 text-gray-800 border border-gray-400">Pengarang</th>
                    <th class="px-4 py-2 bg-gray-200 text-gray-800 border border-gray-400">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($userAmbilData = mysqli_fetch_array($ambildata)) {
                        echo "<tr>";
                            echo "<td class='px-4 py-2 border border-gray-400'>" . $userAmbilData['kode_buku'] . "</td>";
                            echo "<td class='px-4 py-2 border border-gray-400'>" . $userAmbilData['judul'] . "</td>";
                            echo "<td class='px-4 py-2 border border-gray-400'>" . $userAmbilData['pengarang'] . "</td>";
                            echo "<td class='px-4 py-2 border border-gray-400'>
                                | <a href='view/update.php?id=" . $userAmbilData['kode_buku'] . "' class='text-blue-500 hover:underline'>Update</a> |
                                <a href='view/view.php?id=" . $userAmbilData['kode_buku'] . "' class='text-blue-500 hover:underline'>View</a> |
                                <a href='controller/hapusbuku.php?id=". $userAmbilData['kode_buku'] ."' class='text-red-500 hover:underline'>Hapus</a> |
                                </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <footer class="bg-gray-800 text-white py-4 text-center">
        <p>&copy; 2024 Commander Monb. Github: <a href="https://github.com/MikoMonb" target="_blank">@MikoMonb</a></p>
    </footer>
</body>
</html>
