<?php 
    include_once("../../config/koneksi.php");

    class BukuController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }

        public function updateBuku($kode_buku, $judul, $pengarang) {
            $result = mysqli_query($this->kon, "UPDATE buku SET judul = '$judul', pengarang = '$pengarang' WHERE kode_buku = '$kode_buku'");
            
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        public function getDataBuku($id) {
            $sql = "SELECT * FROM buku WHERE kode_buku = '$id'";
            $ambildata = $this->kon->query($sql);

            if ($result = mysqli_fetch_array($ambildata)) {
                return $result;
            } else {
                return null;
            }
        }
    }
?>