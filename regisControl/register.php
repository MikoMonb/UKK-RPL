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
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="max-w-md w-full bg-white p-8 rounded shadow-md">
            <h1 class="text-3xl font-semibold mb-6 text-center">Register</h1>
            <form action="register.php" method="post" name="register" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="username" class="block mb-2">Username:</label>
                    <input type="text" name="username" id="username" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-2">Email:</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2">Password:</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <input type="hidden" name="id_user" value="<?php echo($userController->tambahUser()); ?>" readonly>
                <p class="mb-4">Sudah punya akun? <a href="../login.php" class="text-blue-500">Login</a></p>
                <button type="submit" name="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Tambah Akun</button>
                <?php if (isset($message)) : ?>
                    <div class="mt-4 bg-red-200 text-red-700 p-2 rounded"><?php echo($message); ?></div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>
