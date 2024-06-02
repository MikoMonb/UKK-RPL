<?php 
    include_once("../../../config/koneksi.php");
    include_once("../controller/viewdata.php");

    $bukuController = new BukuController($kon);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data Buku</title>
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
        <h2 class="text-2xl font-bold">View Data Buku - <?php echo $id; ?></h2>
        <br>
        <form action="view.php" name="view" method="get">
            
            <table class="table-auto">
                <tr>
                    <td class="font-bold">Kode Buku</td>
                    <td class="px-4">:</td>
                    <td><?php echo $id; ?></td>
                </tr>
                <tr>
                    <td class="font-bold">Judul</td>
                    <td class="px-4">:</td>
                    <td><?php echo $judul; ?></td>
                </tr>
                <tr>
                    <td class="font-bold">Pengarang</td>
                    <td class="px-4">:</td>
                    <td><?php echo $pengarang; ?></td>
                </tr>
            </table>
        </form>
        <div class="mt-4">
            <a href="../dashboard.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Home</a>
        </div>
    </div>
</body>
</html>
