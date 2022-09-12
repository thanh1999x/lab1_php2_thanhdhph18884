<?php
require "./ketnoi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tour</title>
</head>

<body>
   <div>
    <table border="1" style="width: 1500px;">
        <tr>
            <th>Mã tour</th> 
            <th>Tên tour</th>
            <th>Ảnh</th>
            <th>Giới thiệu</th>
            <th>Mô tả</th>
            <th>Ngày Nhập</th>
            <th>Giá</th>
            <th>mã <giỏ/th>
            
            <th>
                <a href="add.php">Thêm</a>
            </th>

        </tr>
        
        <?php
         $sql = "SELECT * FROM tours";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $hang = $stmt->fetchAll(PDO::FETCH_ASSOC);
         foreach ($hang as $sp) : ?>
            
            <tr>
            
                <td><?=$sp['id_tours'] ?></td>
                <td><?= $sp['name'] ?></td>
                <td>
                    <img src="../image/<?=$sp['image']?>" width="123" alt="">
                </td>
                <td><?= $sp['intro'] ?></td>
                <td><?= $sp['description'] ?></td>
                <td><?= $sp['number_date'] ?></td>
                <td><?= $sp['price'] ?></td>
                <td><?= $sp['categorycat_id'] ?></td>    
                <td>
                    <a href="edit.php?id_tours=<?=$sp['id_tours'] ?>">Sửa</a>            
              </td>
              <th>
              <a onclick="return confirm('Bạn có chắc chắn xóa không?')" href="delete.php?id_tours=<?=$sp['id_tours'] ?>">Xóa</a>
              </th>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>