<?php
require 'connection.php';

if (isset($_GET['id'])) {
    $idPersona = $_GET['id'];
    $qdel = "DELETE FROM person WHERE idPersona = $idPersona";
    $qudel = mysqli_query($connection, $qdel);
    if($qudel) {
       header("location:../index.php?alert=6");
    }
}
