<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf8'>
<link rel="stylesheet" href="css/basic.css" type="text/css" />
<title>Страница ввода данных</title>
</head>
<body>
        <div id="wrapper">
                <div id="header">
                <br />
                <strong>Страница ввода данных. </strong>
                </div>

<?php
//Экранируем спецсимволы в строке, как описано тут http://php.net/manual/ru/function.pg-escape-string.php
                $ins_player=pg_escape_string($_POST['ins_player']);
                $ins_country=pg_escape_string($_POST['ins_country']);
		$ins_comment=pg_escape_string($_POST['ins_comment']);

//Получаем переменные
		$ins_contract=$_POST['ins_contract'];
		$ins_goals=$_POST['ins_goals'];
		$ins_passes=$_POST['ins_passes'];
		$ins_team=$_POST['ins_team'];

//Удаляем пробоелы из начала и конца строки
		$ins_player=trim($ins_player);
		$ins_country=trim($ins_country);
		$ins_comment=trim($ins_comment);


//Проверка полей голы и перелачи
if (($ins_goals > 40) OR ($ins_passes > 40)) { echo "<font color=red>Слишком много голов или передач!!! </font>" ; }
 else

//Проверяем дату - она не должна быть меньше декабря 2015
if ($ins_contract < '2015-12-01')  { echo "<font color=red>Неверная дата контракта </font>" ; echo $ins_contract; }
 else


//Проверяем на заполняемость
if (empty($ins_player) OR empty($ins_contract)) {
echo "<font color=red>Заполните хотя бы строку 'Имя игрока' и  дату контракта!!! </font>" ; }
else
require_once 'conf/connect.php' ;
$query = "INSERT into players (player_name, club, country, contract, comment, goals, passes) VALUES ('$ins_player', '$ins_team', '$ins_country', '$ins_contract', '$ins_comment', '$ins_goals', '$ins_passes')";
$result = pg_query($query) or die('<font color=red>Ошибка запроса: </font>' . pg_last_error());
pg_free_result($result);
pg_close($dbconn);
echo "<font color=green>СВЕДЕНИЯ ПОЛУЧЕНЫ.</font><font color=black> Если ниже нет сообщения об ошибке то они успешно внесены в базу. Для возврата в меню нажмите: <p><a href='index.php'>ГЛАВНАЯ СТРАНИЦА</a></p></font>";
require_once 'footer.html' ;
?>

</body>
</html>

