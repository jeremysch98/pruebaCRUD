<?php
require 'connection.php';

$nombres = $_POST['txtNombres'];
$apellidos = $_POST['txtApellidos'];
$dni = $_POST['txtDNI'];
$direccion = $_POST['txtDireccion'];
$celular = $_POST['txtCelular'];
$correo = $_POST['txtCorreo'];
$genero = intval($_POST['cbGenero']);

$qdni = "SELECT COUNT(*) as CDNI FROM person WHERE DNI = '$dni'";
$qudni = mysqli_query($connection, $qdni);
$adni = mysqli_fetch_array($qudni);

if (strlen($dni) == 8) {
    if ($adni['CDNI'] == 0) {
        if (strlen($celular) == 9) {
            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $q = "INSERT INTO person(Nombres, Apellidos, DNI, Direccion, Celular, CorreoElectronico, Genero) VALUES('$nombres', '$apellidos', '$dni', '$direccion', '$celular', '$correo', $genero)";
                $query = mysqli_query($connection, $q);
                header("location: ../index.php?alert=1");
            }
        } else {
            header("location:../index.php?alert=5");
        }
    } else {
        header("location:../index.php?alert=2");
    }
} else {
    header("location:../index.php?alert=4");
}
