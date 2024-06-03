<?php
include 'D:\xampp\htdocs\DOAN_QLDA-main\backend\YeuCauClass.php';

$yeucauClass = new YeuCauClass();

if (isset($_GET['MaYC'])) {
    $mayc = $_GET['MaYC'];
    $yeucauClass->deleteRequest($mayc);
    header('Location: SendRequest.php');
    exit();
}
?>
