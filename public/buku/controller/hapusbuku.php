<?php 
    include_once("../../../config/koneksi.php");

    class BukuController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }

        public function deleteBuku($id) {
            $deletedata = mysqli_query($this->kon, "DELETE FROM buku WHERE kode_buku = '$id'");

            if ($deletedata) {
                return "Data berhasil dihapus.";
            } else {
                return "Data gagal dihapus.";
            }
        }
    }

    $bukuController = new BukuController($kon);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $message = $bukuController->deleteBuku($id);
        echo $message;
        header("Location: ../dashboard.php");
    }
?>