<?php
require_once './ketnoi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['ten'];
    $anh = $_FILES['anh']['name'];
    if($_FILES['anh']['size'] >2000000){
        $anh=$_FILES['anh']['name'];
        move_uploaded_file($_FILES['anh']['tmp_name'],'../image/'.$anh );
    }
    $intro = $_POST['intro'];
    $description= $_POST['mota'];
    $date = $_POST['date'];
    $price = $_POST['gia'];
    $madm = $_POST['madm'];
    $sql = "INSERT INTO tours(name,image,intro,description,number_date,price,categorycat_id) VALUES('$name','$anh','$intro','$description','$date','$price','$madm')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("Location: show.php?message=Thêm dữ liệu thành công");
    die;
  
}
$sql = "SELECT * FROM category";
$stmt = $conn->prepare($sql);
$stmt->execute();
$danhmuc = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../filecssadmin/filethem.css">
    <title>Thêm tours</title>
    <style>
    
    </style>
</head>

<body>
        <h1>Thêm tour du lịch</h1>

    <div class="form">
        <form action="add.php" method="POST" enctype="multipart/form-data">
            <label for="">Tên</label>
            <input type="text" name="ten">
            <br>
            <br>
            <label for="">Ảnh</label>
            <input type="file" name="anh">
            <br>
            <br>
            <label for="">intro</label>
            <input type="text" name="intro">
            <br>
            <br>
            <label for="">Depcition</label>
            <input type="text" name="mota">
            <br>
            <br>
            <label for="">ngày </label>
            <input type="text" name="date">
            <br>
            <br>
            <label for="">Giá</label>
            <input type="text" name="gia">
            <br>
            <br>
            <div>
                <label for="">danh sách </label>
                <select name="madm" id="">
                    <?php foreach ($danhmuc as $dm) : ?>
                        <option value="<?=$dm['id'] ?>">
                            <?=$dm['name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
         
            
            <br>
            <div class="btn">
                <button type="submit">Lưu lại</button>
            
        </form>
    </div>
    </div>
</body>

</html>