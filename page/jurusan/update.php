<?php

include "../../config/database.php";

$sql = "SELECT * FROM jurusan WHERE id =" . $_GET['id'];
$hasil = $db->query($sql);

$ang = ($hasil->fetch_assoc());

if(isset($_POST['kode_jurusan'])){
    $ang = "UPDATE jurusan SET 
      kode_jurusan = '" . $_POST['kode_jurusan'] . "',
      deskripsi = '" . $_POST['deskripsi'] . "'
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
                        <label for="kode_jurusan" class="form-label">kode jurusan</label>
                        <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" value="<?= $ang['kode_jurusan']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi " name="deskripsi" value="<?= $ang['deskripsi']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </section>

</main>

<?php include "../../layout/footer.php"; ?>