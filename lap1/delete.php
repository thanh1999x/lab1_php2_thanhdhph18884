<?php
require_once './ketnoi.php';

if (isset($_GET['id_tours'])) {
    $ma = $_GET['id_tours'];
    $sql = "DELETE FROM tours WHERE id_tours=$ma";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('Location: show.php?message=Xóa dữ liệu thành công');
    die;
}
