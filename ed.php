<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf8'>
<link rel="stylesheet" href="css/basic.css" type="text/css" />
<title>Страница редактирования данных</title>
</head>
<body>
        <div id="wrapper">
                <div id="header">
                <br />
                <strong>Страница редактирования данных. </strong>
                </div>

<?php
$id=$_POST['id'];
$edit_pl=$_POST['edit_player'];
$edit_cl=$_POST['edit_club'];
$edit_cou=$_POST['edit_country'];
$edit_cont=$_POST['edit_contract'];
$edit_g=$_POST['edit_goals'];
$edit_pa=$_POST['edit_passes'];
$edit_comm=$_POST['edit_comment'];

//Экранируем спецсимволы в строке, как описано тут http://php.net/manual/ru/function.pg-escape-string.php
                $edit_player=pg_escape_string($edit_pl);
                $edit_club=pg_escape_string($edit_cl);
                $edit_country=pg_escape_string($edit_cou);
                $edit_contract=pg_escape_string($edit_cont);
                $edit_goals=pg_escape_string($edit_g);
                $edit_passes=pg_escape_string($edit_pa);
                $edit_comment=pg_escape_string($edit_comm);

if (empty($edit_player) OR empty($edit_contract)) {
echo "Заполните хотя бы строку имя игрока и дату контракта!!! " ; }
else
require_once 'conf/connect.php' ;
$query = "UPDATE players set player_name='$edit_player', club='$edit_club', country='$edit_country', contract='$edit_contract', goals='$edit_goals', passes='$edit_passes', comment='$edit_comment' where id ='$id'";
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
pg_free_result($result);
pg_close($dbconn);
echo "<font color=green>ИЗМЕНЕНИЯ ПРИНЯТЫ.</font><font color=black> Если ниже нет сообщения об ошибке то они успешно внесены в базу. Для возврата в меню нажмите: <p><a href='index.php'>ГЛАВНАЯ СТРАНИЦА</a></p></font>";
require_once 'footer.html' ;
?>
