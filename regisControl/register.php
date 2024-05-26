<?php 
    include_once("../config/koneksi.php");
    include_once("tambahakun.php");

    $userController = new UserController($kon);

    if (isset($_POST['submit'])) {
        $id_user = $userController->tambahUser();

        $data = [
            'id_user' => $id_user,
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
        ];

        $message = $userController->tambahDataUser($data);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun</title>
</head>
<body>
    <h1>Register</h1>
    <a href="../login.php">| Login |</a>
    <form action="register.php" method="post" name="register" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" required></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_user" value="<?php echo($userController->tambahUser()); ?>" readonly></td>
                <td><input type="submit" name="submit" value="Tambah Akun"></td>
            </tr>
        </table>
        <?php if (isset($message)) : ?>
            <div>
                <?php echo($message); ?>
            </div>
        <?php endif; ?>
    </form>
</body>
</html>