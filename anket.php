<?php 
 require_once "connect.php";

$answer =   Filterele($_POST['cevap']);

$control_query  =   $db_connect->prepare('SELECT * FROM oykullananlar WHERE ipadresi = ? AND tarih >= ?');

$control_query->execute([$IPAdresi,$ZamaniGeriAl]);
$control_count  =   $control_query->rowCount();

if ($control_count>0){
    echo "Hata<br/>";
    echo "Daha Önce Oy Kullanmışsınız<br/>";
    echo "Lütfen 24 saat sonra tekrar deneyiniz<br/>";
    echo "<a href='index.php'>Anasayfaya Dön</a>";
}else{
    if ($answer==1){
        $set_answer =   $db_connect->prepare('UPDATE anket SET oysayisibir=oysayisibir+1 , toplamoysayisi=toplamoysayisi+1');
        $set_answer->execute();
    }elseif ($answer==2){
        $set_answer =   $db_connect->prepare('UPDATE anket SET oysayisiiki=oysayisiiki+1 , toplamoysayisi=toplamoysayisi+1');
        $set_answer->execute();
    }elseif ($answer==3){
        $set_answer =   $db_connect->prepare('UPDATE anket SET oysayisiuc=oysayisiuc+1 , toplamoysayisi=toplamoysayisi+1');
        $set_answer->execute();
    }else{
        echo "Hata<br/>";
        echo "Cevap Kaydı Bulunamıyor<br/>";
        echo "<a href='index.php'>Anasayfaya Dön</a>";
    }

    $Ekle   =   $db_connect->prepare('INSERT INTO oykullananlar (ipadresi,tarih) values (?,?)');
    $Ekle->execute([$IPAdresi,$ZamanDamgasi]);
    $EkleCount  =   $Ekle->rowCount();

    if ($EkleCount>0){
        echo "Teşekkürler<br/>";
        echo "Vermiş Olduğunuz oy sisteme kayot edildi!<br/>";
        echo "<a href='index.php'>Anasayfaya Dön</a>";
    }else{
        echo "Hata<br/>";
        echo "İşlem Sırasında Beklenmeyen Hata Oluştu , Lütfen Daha Sonra Tekrar Deneyiniz<br/>";
        echo "<a href='index.php'>Anasayfaya Dön</a>";
    }

}


