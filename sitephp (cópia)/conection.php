<?php  
// $conn = new PDO('mysql:host=localhost;dbname=siteAn', 'root', '');

$conn = mysqli_connect("localhost", "root","", "siteAn");
if (!$conn) {
    die("Falha na conexão com o banco: " . mysqli_connect_error());
   }
?>