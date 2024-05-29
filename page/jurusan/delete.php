<?php 

include "../../config/database.php";

$angga = 'DELETE FROM jurusan where id =' .$_GET['id'];

$db->query($angga);

header('location: index.php');

?>