<?php

include "../../config/database.php";

$sql = "SELECT * FROM spp";
$hasil = $db->query($sql);

?>

<?php include "../../layout/header.php"; ?>

<?php include "../../layout/sidebar.php"; ?>

<main id="main" class="main">
    <div class="row">
        <div class="col-10">
            <div class="pagetitle">
                <h1>spp</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">spp</li>
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

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">tahun</th>
                        <th scope="col">nominal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($hasil as $h) {
                    ?>
                        <tr class="text-center">
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $h['tahun']; ?></td>
                            <td><?= $h['nominal']; ?></td>
                            <td class="text-center">
                                <a href="update.php?id=<?= $h['id']; ?>" class="btn btn-primary" style="width: 100px;">Edit</a>
                                <a href="delete.php?id=<?= $h['id']; ?>" class="btn btn-danger" style="width: 100px;">Hapus</a>
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