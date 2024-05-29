<?php

include "../../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];

    $stmt = $db->prepare("INSERT INTO spp (tahun, nominal) VALUES (?, ?)");

    $stmt->bind_param("ss", $tahun, $nominal);

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
                        <label for="tahun" class="form-label">kode jurusan</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">nominal</label>
                        <input type="text" class="form-control" id="nominal " name="nominal" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </section>

</main>

<?php include "../../layout/footer.php"; ?>