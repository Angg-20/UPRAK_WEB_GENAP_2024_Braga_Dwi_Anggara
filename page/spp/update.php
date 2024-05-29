<?php

include "../../config/database.php";

$sql = "SELECT * FROM spp WHERE id =" . $_GET['id'];
$hasil = $db->query($sql);

$ang = ($hasil->fetch_assoc());

if(isset($_POST['tahun'])){
    $ang = "UPDATE spp SET 
      tahun = '" . $_POST['tahun'] . "',
      nominal = '" . $_POST['nominal'] . "'
      WHERE id =" . $_GET['id'];
      $db->query($ang);

      header('location:index.php');
}

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
                <li class="breadcrumb-item active">Update</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="container">

            <div class="card p-5">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="tahun" class="form-label">kode jurusan</label>
                        <input type="number" class="form-control" id="tahun" name="tahun" value="<?= $ang['tahun']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">nominal</label>
                        <input type="number" class="form-control" id="nominal " name="nominal" value="<?= $ang['nominal']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </section>

</main>

<?php include "../../layout/footer.php"; ?>