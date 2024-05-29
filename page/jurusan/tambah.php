<?php

include "../../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_jurusan = $_POST['kode_jurusan'];
    $deskripsi = $_POST['deskripsi'];

    $stmt = $db->prepare("INSERT INTO jurusan (kode_jurusan, deskripsi) VALUES (?, ?)");

    $stmt->bind_param("ss", $kode_jurusan, $deskripsi);

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
        <h1>Jurusan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item ">jurusan</li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="container">

            <div class="card p-5">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="kode_jurusan" class="form-label">kode jurusan</label>
                        <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi " name="deskripsi" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </section>

</main>

<?php include "../../layout/footer.php"; ?>