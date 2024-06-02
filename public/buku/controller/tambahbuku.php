<?php 
    include_once("../../../config/koneksi.php");

    class BukuController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }

        public function tambahBuku() {
            $setAuto = mysqli_query($this->kon, "SELECT MAX(kode_buku) AS max_id FROM buku");
            $result = mysqli_fetch_assoc($setAuto);
            $max_id = $result['max_id'];

            if (is_numeric($max_id)) {
                $nounik = $max_id + 1;
            } else {
                $nounik = 1;
            } return $nounik;
        }

        public function tambahDataBuku($data) {
            $kode_buku = $data['kode_buku'];
            $judul = $data['judul'];
            $pengarang = $data['pengarang'];

            $insertData = mysqli_query($this->kon, "INSERT INTO buku(kode_buku, judul, pengarang) VALUES('$kode_buku', '$judul', '$pengarang')");
            
            if ($insertData) {
                return "Data berhasil disimpan.";
            } else {
                return "Data gagal disimpan.";
            }
        }
    }
?>