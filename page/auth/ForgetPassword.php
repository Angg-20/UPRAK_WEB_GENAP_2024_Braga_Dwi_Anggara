<?php

include "../../config/database.php";

$error = "";

if (isset($_POST['login'])) {
    $PasswordLama = $_POST['PasswordLama'];
    $passwordBaru = $_POST['passwordBaru'];
    $VPassword = $_POST['VPassword'];   

    $query = "SELECT * FROM admin WHERE password = '$PasswordLama'";

    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        if ($passwordBaru == $VPassword) {
            $query = "UPDATE admin SET password = '$passwordBaru' WHERE password = '$PasswordLama'";

            $result = mysqli_query($db, $query);

            if ($result) {
                header("Location: exit.php");
                exit();
            } else {
                $error = "Error: " . $query . "<br>" . mysqli_error($db);
            }
        } else {
            $error = "Password Baru dan Validasi Password tidak cocok";
        }
    } else {
        $error = "Password Lama tidak cocok";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    
<div class="login mt-5 mb-5">
    <h2>Login</h2>
    <form action="" method="post" name="update">
        <input type="text" name="PasswordLama" placeholder="PasswordLama" autocomplete="off">
        <input type="text" name="passwordBaru" placeholder="PasswordBaru" autocomplete="off">
        <input type="text" name="VPassword" placeholder="VPassword" autocomplete="off">
        <a href="../../index.php" class="ms-auto " style="font-size: 14px;">Back to Login</a>
        <button type="submit" name="login">Login</button>
        <?php if (!empty($error)) : ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
    </form>
</div>

</body>
</html>

