<?php
$host = 'localhost';
$dbname = 'exam_thanhdhph18884';
$username = 'root'; 
$password = '';
try {
    $conn = new  PDO("mysql:host =$host;dbname=$dbname;charset=utf8",$username,$password);
    echo"kết nối ok";
} catch (PDOException $e) {
    echo"kết nối thất bại <br>".$e->getMessage();
}
?>