<?php 
    include_once("../../../config/koneksi.php");
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <div class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-xl font-bold pl-8">WebBuku</a>
            <div class="flex space-x-4 pr-4">
                <a href="../dashboard.php" class="hover:bg-gray-700 px-3 py-2 rounded">Library</a>
                <a href="../../dashboard.php" class="hover:bg-gray-700 px-3 py-2 rounded">Article</a>
                <a href="../../../logout.php" class="hover:bg-red-700 px-3 py-2 rounded">Logout</a>
            </div>
        </div>
    </div>
    <!-- End Navbar -->

    <div class="container mx-auto my-8">
        <h1 class="text-2xl font-bold mb-4">Tambah Data Buku</h1>
        <form action="tambah.php" method="post" name="tambah" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="kode_buku">Kode Buku</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kode_buku" type="text" name="kode_buku" value="<?php echo($bukuController->tambahBuku()); ?>" readonly>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">Judul</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="judul" type="text" name="judul" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pengarang">Pengarang</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="pengarang" type="text" name="pengarang" required>
            </div>
            <div class="flex items-center justify-between">
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit" value="Tambah Buku">
                <a href="../dashboard.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Home</a>
                <?php if (isset($message)) : ?>
                    <div class="text-red-500"><?php echo($message); ?></div>
                <?php endif; ?>
            </div>
        </form>
    </div>
</body>
</html>
