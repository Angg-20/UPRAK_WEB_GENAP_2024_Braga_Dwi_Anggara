<?php 

include "../../config/database.php";

$angga = 'DELETE FROM siswa where nis =' .$_GET['nis'];

$db->query($angga);

header('location: index.php');

?>