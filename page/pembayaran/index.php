<?php

include "../../config/database.php";

$bulan = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
$bulan_dibayar = [];

if (isset($_POST['cari'])) {
    $nis_input = $_POST['nis'];
    $tahun_input = $_POST['tahun'];

    $sql = "SELECT siswa.nis, siswa.nama_lengkap, pembayaran.bulan_tagihan FROM siswa
     LEFT JOIN pembayaran ON siswa.nis = pembayaran.nis 
            WHERE siswa.nis = ? AND pembayaran.tahun_tagihan = ?";

    $stmt = $db->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($db->error));
    }

    $execute = $stmt->bind_param("ii", $nis_input, $tahun_input);
    if ($execute === false) {
        die('Bind param failed: ' . htmlspecialchars($stmt->error));
    }

    $execute = $stmt->execute();
    if ($execute === false) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }

    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $nis = $row['nis'];
        if (!isset($bulan_dibayar[$nis])) {
            $bulan_dibayar[$nis] = [
                'nama' => $row['nama_lengkap'],
                'bulan_dibayar' => []
            ];
        }
        if (!empty($row['bulan_tagihan'])) {
            $bulan_dibayar[$nis]['bulan_dibayar'][] = $row['bulan_tagihan'];
        }
    }
    $stmt->close();
}
?>

<?php include "../../layout/header.php"; ?>

<?php include "../../layout/sidebar.php"; ?>

<main id="main" class="main">
    <div class="row">
        <div class="col-5">
            <div class="pagetitle">
                <h1>Pembayaran</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Pembayaran</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section mt-3">
        <div class="container">
            <form action="" method="post">
                <div class="table mt-4">
                    <table class="table">
                        <tbody id="book-rows">
                            <tr class="book-row align-middle">
                                <td><input type="number" name="nis" class="form-control nis" placeholder="Masukan NIS" autocomplete="off" required></td>
                                <td><input type="number" name="tahun" class="form-control tahun" placeholder="Masukan Tahun" autocomplete="off" required></td>
                                <td><button type="submit" name="cari" value="isi">Kirim</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </section>

    <?php if (!empty($bulan_dibayar)) { ?>
        <?php foreach ($bulan_dibayar as $nis => $data) { ?>
            <h6>NIS: <?= $nis ?> - Nama: <?= $data['nama'] ?></h6>
            <table class="table">
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bulan as $b) { ?>
                        <tr>
                            <td><?= $b; ?></td>
                            <td><?= in_array($b, $data['bulan_dibayar']) ? 'Sudah Dibayar' : 'Belum Dibayar'; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    <?php } else if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
        <p>Data tidak ditemukan untuk NIS dan Tahun yang dimasukkan.</p>
    <?php } ?>
</main>
<?php include "../../layout/footer.php"; ?>