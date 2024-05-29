<?php

include "../../config/database.php";

$sql = "SELECT * FROM kelas WHERE id =" . $_GET['id'];
$hasil = $db->query($sql);

$ang = ($hasil->fetch_assoc());

if(isset($_POST['kode_kelas'])){
    $ang = "UPDATE kelas SET 
      kode_kelas = '" . $_POST['kode_kelas'] . "',
      tingkat = '" . $_POST['tingkat'] . "'
      WHERE id =" . $_GET['id'];
      $db->query($ang);

      header('location:index.php');
}

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
                <li class="breadcrumb-item active">Update</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="container">

            <div class="card p-5">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="kode_kelas" class="form-label">kode kelas</label>
                        <input type="text" class="form-control" id="kode_kelas" name="kode_kelas" value="<?= $ang['kode_kelas']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tingkat" class="form-label">tingkat</label>
                        <input type="number" class="form-control" id="tingkat " name="tingkat" value="<?= $ang['tingkat']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </section>

</main>

<?php include "../../layout/footer.php"; ?>