<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$conn=new mysqli("localhost","root","","agrokultura");
if($conn->connect_error){
    die("Lidhja deshtoi!");
}

$emri=$_POST['emri'];
$cmimi=$_POST['cmimi'];
$sasia=$_POST['sasia'];
$kategoria=$_POST['kategoria'];
$Foto=$_POST['Foto'];

$sql = "INSERT INTO products 
 (Emri, Cmimi, Sasia, Kategoria, Foto)
VALUES 
('$emri', '$cmimi', '$sasia', '$kategoria', '$path')";

if ($conn->query($sql)) {
    echo "Produkti u shtua me sukses";
} else {
    echo "Gabim: " . $conn->error;
}
?>