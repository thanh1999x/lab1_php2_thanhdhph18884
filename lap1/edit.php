<?php
require_once './ketnoi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ma=$_POST['id_tours'];
    $name = $_POST['ten'];
    $anh = $_FILES['anh']['name'];
    if($_FILES['anh']['size'] >2000000){
        $anh=$_FILES['anh']['name'];
        move_uploaded_file($_FILES['anh']['tmp_name'],'../image/'.$anh );
    }
    $intro = $_POST['intro'];
    $description=$_POST['mo_ta'];
    $date = $_POST['date'];
    $price = $_POST['gia'];
    $madm = $_POST['category_id'];
    $sql = "UPDATE tours set name='$name',image='$anh',intro='$intro',description='$description',number_date='$date',price='$price',categorycat_id='$madm' where id_tours=$ma";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("Location: show.php?message=Thêm dữ liệu thành công");
    die;
  
}
// dữ liệu bảng category
$sql = "SELECT * FROM category";
$stmt = $conn->prepare($sql);
$stmt->execute();
$danhmuc = $stmt->fetchAll(PDO::FETCH_ASSOC);

// số trên thanh url
$matours = $_GET['id_tours'];
$sql = "SELECT * FROM tours WHERE id_tours=$matours";
$stmt = $conn->prepare($sql);
$stmt->execute();
//Lấy 1 dòng dữ liệu
$sp = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sửa tour</title>
</head>

<body>
    <div class="title">
        <h1>sửa tours</h1>
    </div>
    <div class="form">
        <form action="edit.php?id_tours=<?=$sp['id_tours'] ?>" method="post" enctype="multipart/form-data">
            <div class="product_id">
                <input type="hidden" name="id_tours" value="<?=$sp['id_tours'] ?>">
            </div>
            <div class="product_name">
                <label for="">Tên tour</label>
                <input type="text" name="ten" placeholder="Tên" value="<?=$sp['name'] ?>">
            </div>
            <div class="images">
                <label for="">chọn ảnh </label>
                <input type="file" name="anh" >
                <br>
                <img src="../image/<?=$sp['image'] ?>" width="120" alt="">
                <input type="hidden" name="anh" value="<?=$sp['image'] ?>">
            </div>
            <div class="intro">
                <label for="">Giới thiệu</label>
                <input type="text" name="intro" value="<?=$sp['intro'] ?>">
            </div>
            <div class="description">
                <label for="">Mô tả</label>
                <input type="number" name="mo_ta" value="<?=$sp['description'] ?>">
            </div>
          
            <div class="price">
                <label for="">Ngày nhập</label>
                <input type="date" name="date" value="<?=$sp['number_date'] ?>">
            </div>
            <div class="price">
                <label for="">price</label>
                <input type="text" name="gia" min=0 step="1" value="<?=$sp['price'] ?>">
            </div>
            <div class="category">
                <label for="">Mã loại</label>
                <select name="category_id" id="">
                    <?php foreach ($danhmuc as $dm) : ?>
                        <?php if ($dm['id'] ==$sp['id']) : ?>
                            <option selected value="<?=$dm['id'] ?>">
                                <?= $dm['name'] ?>
                            </option>
                        <?php else : ?>
                            <option value="<?=$dm['id'] ?>">
                                <?= $dm['name'] ?>
                            </option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
           
            <br>
            <div class="btn">
                <button type="submit">Lưu lại</button>
            </div>
        </form>
    </div>
</body>

</html>