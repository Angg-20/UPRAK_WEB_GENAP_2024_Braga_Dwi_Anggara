<?php 

session_start();


include "../../config/database.php";

$error = '';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($db, $query);

    if ($result) {
        if (mysqli_num_rows($result) === 1) {
            $userData = mysqli_fetch_assoc($result);

            if ($password === $userData['password']) {
                $_SESSION['user'] = $userData['username'];
                $_SESSION['akses'] = $userData['akses'];

                header("Location: ../../index.php");
                exit();
            } else {
                $error = "Password salah. Silakan coba lagi.";
            }
        } else {
            $error = "Username tidak ditemukan.";
        }
    } else {
        $error = "Terjadi kesalahan. Silakan coba lagi.";
    }
}

mysqli_close($db);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

    <div class="login">
        <h2>Login</h2>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" autocomplete="off">
            <input type="password" name="password" placeholder="Password" autocomplete="off">
            <button type="submit" name="login">Login</button>
            <?php if (!empty($error)) : ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    </div>

</body>
</html>