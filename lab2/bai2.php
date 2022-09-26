<?php
require 'monthidau.php';
 class ConNguoi{
    var $ten;
    var $tuoi;
    var $gioitinh;
    var $date;
    var $weight;
    var $height ;
}
class VanDongVien extends ConNguoi{
    var $huychuong;
    var $monthidau;
    function __construct($ten , $tuoi,$gioitinh,$date,$weight,$height,$huychuong,$monthidau){
        //theo ý hiểu là sẽ gán tên và tuổi người dùng nhập vào về thằng con người
        $this->ten = $ten;
        $this->tuoi = $tuoi;
        $this->gioitinh = $gioitinh;
        $this->date = $date;
        $this->weight = $weight;
        $this->height = $height;
        $this->huychuong = $huychuong;
        $this->monthidau = $monthidau;

    }
    function layThongTin(){
        //khi có tên tuổi người nhập ở trên thì sẽ lấy ra ở thằng này. vì tk contruct luôn chạy đầu tiên
        return "tên :$this->ten ,
        <br>
        tuổi: $this->tuoi,
        <br>
        giới tính: $this->gioitinh,
        <br>
        ngày sinh: $this->date,
        <br>
        cân nặng: $this->weight,
        <br>
        chiều cao:$this->height,
        <br>
        số huy chương: $this->huychuong,
        <br>
        môn thi đấu:$this->monthidau";
        echo"</br>";
    }
    function thiDau($monthi,$huychuong){
        if ($this->height < $monthi->dkheight || $this->weight < $monthi->dkweight) {
            $hi=$this->huychuong -=$huychuong;
            
        }else{
            echo"</br>";
            echo "bạn đã gian lận nên sẽ bị trừ 1 huy chương" ;
            echo"</br>";
            echo"số huy chương còn lại là = " . $this->huychuong = $this->huychuong -1;
        }

}

}
$monthi = new MonThiDau('môn điền kinh','170',60);
$vdv = new VanDongVien('Đinh Hữu Thành',20,'nam','05/03/2022',65, 190,05,'điền kinh');
echo($vdv->layThongTin());
echo($vdv->thiDau($monthi,15));
?>