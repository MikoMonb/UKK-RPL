<?php 
    include_once("../../../config/koneksi.php");
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
        <h1 class="text-2xl font-bold mb-4">Update Data Buku</h1>
        <form action="update.php" name="update" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="kode_buku">Kode Buku</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kode_buku" type="text" name="kode_buku" value="<?php echo $id; ?>">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">Judul</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="judul" type="text" name="judul" value="<?php echo $judul; ?>">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pengarang">Pengarang</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="pengarang" type="text" name="pengarang" value="<?php echo $pengarang; ?>">
            </div>
            <div class="flex items-center justify-between">
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="update" value="Update">
                <a href="../dashboard.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Home</a>
            </div>
        </form>
    </div>
</body>
</html>
