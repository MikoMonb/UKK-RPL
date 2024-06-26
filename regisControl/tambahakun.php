<?php 
    include_once("../config/koneksi.php");

    class UserController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }

        public function tambahUser() {
            $setAuto = mysqli_query($this->kon, "SELECT MAX(id_user) AS max_id FROM user");
            $result = mysqli_fetch_assoc($setAuto);
            $max_id = $result['max_id'];

            if (is_numeric($max_id)) {
                $nounik = $max_id + 1;
            } else {
                $nounik = 1;
            } return $nounik;
        }

        public function tambahDataUser($data) {
            $id_user = $data['id_user'];
            $username = $data['username'];
            $password = $data['password'];
            $email = $data['email'];

            $insertData = mysqli_query($this->kon, "INSERT INTO user(id_user, username, password, email) VALUES('$id_user', '$username', '$password', '$email')");
            
            if ($insertData) {
                
                header("Location: ../login.php");
            } else {
                return "Data gagal disimpan.";
            }
        }
    }
?>