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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="src/output.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="max-w-md w-full bg-white p-8 rounded shadow-md">
            <h1 class="text-3xl font-semibold mb-6 text-center">Halaman Login</h1>
            <form action="login.php" method="post">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username:</label>
                    <input type="text" name="username" id="username" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password:</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
                </div>
                <p class="mb-4">Tidak punya akun? <a href="regisControl/register.php" class="text-blue-500">Register</a></p>
                <button type="submit" name="submit" id="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
