<?php
include 'C:\xamppp\htdocs\DOAN_QLDA\backend\YeuCauClass.php';

$yeucauClass = new YeuCauClass();

if (isset($_GET['MaYC'])) {
    $mayc = $_GET['MaYC'];
    $yeucauClass->deleteRequest($mayc);
    header('Location: SendRequest.php');
    exit();
}
?>
