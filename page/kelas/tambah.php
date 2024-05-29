<?php

include "../../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_kelas = $_POST['kode_kelas'];
    $tingkat = $_POST['tingkat'];

    $stmt = $db->prepare("INSERT INTO kelas (kode_kelas, tingkat) VALUES (?, ?)");

    $stmt->bind_param("ss", $kode_kelas, $tingkat);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$db->close();
?>

<?php include "../../layout/header.php"; ?>

<?php include "../../layout/sidebar.php"; ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item ">kelas</li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="container">

            <div class="card p-5">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="kode_kelas" class="form-label">kode kelas</label>
                        <input type="text" class="form-control" id="kode_kelas" name="kode_kelas" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tingkat" class="form-label">tingkat</label>
                        <input type="text" class="form-control" id="tingkat " name="tingkat" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </section>

</main>

<?php include "../../layout/footer.php"; ?>