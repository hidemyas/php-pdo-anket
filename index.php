<?php require_once "connect.php"; ?>
<!doctype html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anket Uygulaması</title>
</head>
<body>
<?php
$query = $db_connect->prepare('SELECT * FROM anket LIMIT 1');
$query->execute();

$record_count = $query->rowCount();
$record = $query->fetch(PDO::FETCH_ASSOC);
if ($record_count > 0):
    ?>
    <form action="anket.php" method="post">
        <table width="300" align="center" border="0" cellpadding="0" cellspacing="0">
            <tr height="30">
                <td colspan="2"><?php echo $record['soru']; ?> </td>
            </tr>
            <tr height="30">
                <td width="25"><input type="radio" name="cevap" value="1" id=""></td>
                <td width="275"><?php echo $record['cevapbir']; ?></td>
            </tr>
            <tr height="30">
                <td width="25"><input type="radio" name="cevap" value="2" id=""></td>
                <td width="275"><?php echo $record['cevapiki']; ?></td>
            </tr>
            <tr height="30">
                <td width="25"><input type="radio" name="cevap" value="2" id=""></td>
                <td width="275"><?php echo $record['cevapuc']; ?></td>
            </tr>
            <tr height="30">
                <td colspan="2"><input type="submit" value="Gönder"></td>
            </tr>
            <tr height="30">
                <td colspan="2" align="right"><a style="text-decoration: none" href="sonuc.php">Anket Sonuçlarını Göster</a></td>
            </tr>
        </table>
    </form>
<?php else: ?>
    <p>Herhangi Kayıt Listelenemedi</p>
<?php endif; ?>
</body>
</html>
<?php $db_connect = null; ?>
