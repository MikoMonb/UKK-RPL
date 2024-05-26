<?php
    session_start();
    include_once("config/koneksi.php");

    if ($kon->connect_error) {
        die("Connection error: " . $kon->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($kon, $_POST['username']);
        $password = mysqli_real_escape_string($kon, $_POST['password']);
        
        $sql = "SELECT id_user, username, password FROM user WHERE username = '$username' AND password = '$password'";
        $result = $kon->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            $_SESSION['user_id'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];

            header("Location: public/dashboard.php");
        } else {
            echo "Failed.";
        }
    }

    $kon->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <form action="login.php" method="post">
        <label for="">Username : </label>
        <input type="text" name="username" id="username"><br><br>
        <label for="">Password : </label>
        <input type="password" name="password" id="password"><br>
        <p>Tidak punya akun? <a href="regisControl/register.php">Register</a></p>
        <input type="submit" name="submit" id="submit" value="Login">
    </form>
</body>
</html>