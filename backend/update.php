<?php
require 'connection.php';

$nombres = $_POST['txtNombres'];
$apellidos = $_POST['txtApellidos'];
$dni = $_POST['txtDNI'];
$direccion = $_POST['txtDireccion'];
$celular = $_POST['txtCelular'];
$correo = $_POST['txtCorreo'];
$genero = $_POST['cbGenero'];

$qupdate= "UPDATE person SET Nombres = '$nombres', Apellidos = '$apellidos', DNI = '$dni', Direccion = '$direccion',
Celular = '$celular', CorreoElectronico = '$correo', Genero = $genero WHERE DNI = '$dni'";
$quupdate = mysqli_query($connection, $qupdate);

if($quupdate) {
    header("location:../index.php?alert=3");
}