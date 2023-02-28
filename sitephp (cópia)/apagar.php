<?php
session_start();
$x = $_SESSION['email'];

include_once("conection.php");
if($_SESSION['admin'] != ""){
    $apagar = "DELETE FROM admins WHERE email='$x'";
    $apag = mysqli_query($conn, $apagar);
    $apagar2 = "DELETE FROM usuarios WHERE email='$x'";
    $apag2 = mysqli_query($conn, $apagar2);
    if($apag2){
        session_destroy();
        header("Location: index.php");
        exit(); 
    }
}
else{
    $apagar = "DELETE FROM usuarios WHERE email='$x'";
    $apag = mysqli_query($conn, $apagar);
    if($apag){
        session_destroy();
        header("Location: index.php");
        exit(); 
    }
}

?>