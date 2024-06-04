<?php

include "../../config/database.php";

$sql = "SELECT * FROM siswa";
$hasil = $db->query($sql);

?>

<?php include "../../layout/header.php"; ?>

<?php include "../../layout/sidebar.php"; ?>

<main id="main" class="main">
    <div class="row">
        <div class="col-10">
            <div class="pagetitle">
                <h1>siswa</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">siswa</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-2">
            <a href="tambah.php" class="btn btn-primary">Tambah</a>
        </div>
    </div>

    <section class="section mt-3">

        <div class="container">

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col">NIS</th>
                        <th scope="col">nama lengkap</th>
                        <th scope="col">alamat</th>
                        <th scope="col">kelas</th>
                        <th scope="col">spp</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($hasil as $h) {
                    ?>
                        <tr>
                            <td scope="row"><?= $h['nis']; ?></td>
                            <td><?= $h['nama_lengkap']; ?></td>
                            <td><?= $h['alamat']; ?></td>
                            <td><?= $h['kelas_id']; ?></td>
                            <td><?= $h['spp_id']; ?></td>
                            <td class="text-center">
                                <a href="update.php?id=<?= $h['nis']; ?>" class="btn btn-primary" style="width: 100px;">Edit</a>
                                <a href="delete.php?id=<?= $h['nis']; ?>" class="btn btn-danger" style="width: 100px;">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }; ?>
                </tbody>
            </table>
        </div>

    </section>

</main>

<?php include "../../layout/footer.php"; ?>