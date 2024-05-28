<?php
include 'C:\xamppp\htdocs\DOAN_QLDA\backend\YeuCauClass.php';

$yeucauClass = new YeuCauClass();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $manv = $_POST['manv'];
    $loaiyc = $_POST['loaiyc'];
    $noidung = $_POST['noidung'];

    $yeucauClass->addRequest($manv, $loaiyc, $noidung);
    header('Location: SendRequest.php');
    exit();
}
?>
