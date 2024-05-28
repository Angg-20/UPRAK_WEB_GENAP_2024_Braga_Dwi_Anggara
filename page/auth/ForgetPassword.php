<?php

include "../../config/database.php";

$error = "";

if (isset($_POST['login'])) {
    $Username = $_POST['Username'];
    $PasswordLama = $_POST['PasswordLama'];
    $passwordBaru = $_POST['passwordBaru'];
    $VPassword = $_POST['VPassword'];

    if (empty($Username)) {
        $error = "Username harus di isi";
    } elseif (empty($PasswordLama)) {
        $error = "PasswordLama harus di isi";
    } elseif (empty($passwordBaru)) {
        $error = "PasswordBaru harus di isi";
    } elseif (empty($VPassword)) {
        $error = "VPassword harus di isi";
    } elseif ($passwordBaru != $VPassword) {
        $error = "PasswordBaru dan VPassword tidak sama";
    } else {
        $query = "SELECT * FROM user WHERE Username = '$Username' AND PasswordLama = '$PasswordLama'";
        $result = mysqli_query($db, $query);
    }
    if (mysqli_num_rows($result) > 0) {
    } else {
        $error = "Username or PasswordLama is incorrect";
    }

    if ($error == "") {
        header("location: login.php");
    }
}

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
        <form action="" method="post" name="update">
            <input type="text" name="Username" placeholder="Username" autocomplete="off">
            <input type="text" name="PasswordLama" placeholder="PasswordLama" autocomplete="off">
            <input type="text" name="passwordBaru" placeholder="PasswordBaru" autocomplete="off">
            <input type="text" name="VPassword" placeholder="VPassword" autocomplete="off">
            <a href="login.php" class="ms-auto " style="font-size: 14px;">Back to Login</a>
            <button type="submit" name="login">Login</button>
            <?php if (!empty($error)) : ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    </div>

</body>

</html>