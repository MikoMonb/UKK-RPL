<?php 
    include_once("../../../config/koneksi.php");

    class BukuController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }

        public function getDataBuku($id) {
            $result = mysqli_query($this->kon, "SELECT * FROM buku WHERE kode_buku = '$id'");
            return mysqli_fetch_array($result);
        }
    }

    $bukuController = new BukuController($kon);
    $id = $_GET['id'];
    $bukuData = $bukuController->getDataBuku($id);

    if ($bukuData) {
        $id = $bukuData['kode_buku'];
        $judul = $bukuData['judul'];
        $pengarang = $bukuData['pengarang'];
    }
?>