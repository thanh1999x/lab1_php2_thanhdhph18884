<?php
class TinhToan{
    var $a;
    var $b ;
    var $tong;
    var $hieu;
    var $tich;
    var $thuong;
    function phepcong(){
       return $tong = $this->a + $this->b;
    }
    function pheptru(){
       return  $hieu = $this->a - $this->b;
     }
     function phepnhan(){
       return  $tich = $this->a * $this->b;
     }
     function phepchia(){
       return  $thuong = $this->a / $this->b;
     }
}
$baitap = new TinhToan;
$baitap->a = "5";
$baitap->b = "8";
echo("Bài 1");
echo"</br>";
echo ("kết quả phép cộng $baitap->a + $baitap->b =  ".$baitap->phepcong());
echo"</br>";
echo ( "kết quả phép trừ $baitap->a - $baitap->b =  " . $baitap->pheptru());
echo"</br>";
echo ("kết quả phép nhân $baitap->a * $baitap->b =  ".  $baitap->phepnhan());
echo"</br>";
echo ("kết quả phép chia $baitap->a / $baitap->b =  " . $baitap->phepchia());




?>