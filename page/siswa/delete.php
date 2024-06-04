<?php 

include "../../config/database.php";

$angga = 'DELETE FROM siswa where id =' .$_GET['id'];

$db->query($angga);

header('location: index.php');

?>