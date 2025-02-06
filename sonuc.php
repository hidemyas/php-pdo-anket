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

$answer_one_count   =   $record['oysayisibir'];
$answer_two_count   =   $record['oysayisiiki'];
$answer_trhee_count   =   $record['oysayisiuc'];
$answer_total_count   =   $record['toplamoysayisi'];

$answer_one_width   =   number_format(($answer_one_count/$answer_total_count)*100,2,',','');
$answer_two_width   =   number_format(($answer_two_count/$answer_total_count)*100,2,',','');
$answer_trhee_width   =   number_format(($answer_trhee_count/$answer_total_count)*100,2,',','');

if ($record_count > 0):
    ?>
    <form action="anket.php" method="post">
        <table width="300" align="center" border="0" cellpadding="0" cellspacing="0">
            <tr height="30">
                <td colspan="2"><?php echo $record['soru']; ?> </td>
            </tr>
            <tr height="30">
                <td width="50"><?php echo '%'.$answer_one_width;?> </td>
                <td width="250"><?php echo $record['cevapbir']; ?></td>
            </tr>
            <tr height="30">
                <td width="50"><?php echo '%'.$answer_two_width;?> </td>
                <td width="250"><?php echo $record['cevapiki']; ?></td>
            </tr>
            <tr height="30">
                <td width="50"><?php echo '%'.$answer_trhee_width;?> </td>
                <td width="250"><?php echo $record['cevapuc']; ?></td>
            </tr>
            <tr height="30">
                <td colspan="2" align="right"><a style="text-decoration: none" href="index.php">Anasayfaya Dön</a></td>
            </tr>
        </table>
    </form>
<?php else:
    header('Location: index.php');
    exit();
endif; ?>
</body>
</html>
<?php $db_connect = null; ?>
