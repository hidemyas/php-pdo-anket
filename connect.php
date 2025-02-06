<?php

try {
    $db_connect = new PDO('mysql:dbname=egtim;host=localhost;charset=UTF8', 'root', '');
} catch (PDOException $exception) {
    echo "MYSQL Bağlantı Hatası <br/>";
    echo "Hata Açıklaması : " . $exception->getMessage();
    die();

}


function Filterele($Deger)
{
    $step_one = trim($Deger);
    $step_two = strip_tags($step_one);
    $step_trhee = htmlspecialchars($step_two, ENT_QUOTES);
    return $step_trhee;
}


$IPAdresi = $_SERVER['REMOTE_ADDR'];
$ZamanDamgasi = time();
$OyKullanmaSiniri = 86400;
$ZamaniGeriAl = $ZamanDamgasi - $OyKullanmaSiniri;