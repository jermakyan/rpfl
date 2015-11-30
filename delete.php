<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf8'>
<link rel="stylesheet" href="css/basic.css" type="text/css" />
<title>Страница удаления данных</title>
</head>
<body>

 <div id="wrapper">
                <div id="header">
                <br />
                <strong>Cтраница удаления данных. </strong>
                </div>

<table cellSpacing="0" cellPadding="0" width="619" border="0">
<tr>
   <td>
      <table height="21" cellSpacing="0" cellPadding="0" width="1000" bgcolor="#bed8e1" border="0">
      <tr align=center>
         <td valign="bottom" width="400" class="title">Таблица игроков Премьер-Лиги России по футболу. Форма удаления данных</td>

      </tr>

      </table>

 <table cellSpacing="2" cellPadding="2" width="1000" border="0">
      <tr>
         <td width="220" class="heading">Имя игрока</td>
         <td width="150" class="heading">Команда</td>
         <td width="200" class="heading">Гражданство</td>
         <td width="150" class="heading">Срок контракта</td>
         <td width="90" class="heading">Голы</td>
         <td width="90" class="heading">Передачи</td>
         <td width="110" class="heading">&nbsp;</td>
         <td width="90" class="heading">&nbsp;</td>
      </tr>


<?php
$id=$_GET["id"];

require_once 'conf/connect.php' ;

$query = "SELECT * from  players where id='$id'";
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
//echo "query: "; echo $query;

// Вывод результатов в HTML

echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
   $id = $line["id"];
   $player_name = $line["player_name"];
   $club = $line["club"];
   $country = $line["country"];
   $contract = $line["contract"];
   $goals = $line["goals"];
   $passes = $line ["passes"];

echo "\t<tr align='left'>\n";

          echo "<td width='185' class='item'>$player_name</td>\n";
          echo "<td width='133' class='item'>$club</td>\n";
          echo "<td width='178' class='item'>$country</td>\n";
          echo "<td width='135' class='item'>$contract</td>\n";
          echo "<td width='82'  class='item'>$goals</td>\n";
          echo "<td width='85'  class='item'>$passes</td>\n";

echo "\t</tr>\n";
}
echo "</table>\n";

pg_free_result($result);
pg_close($dbconn);

echo "</table></td></tr></table>";
echo "<br />Эта запись будет УДАЛЕНА. Подтверждаете?"; 

echo "<form action='del.php' method='GET'>";
echo "<input type=radio name=answer value=yes checked>Да";
echo "<input type=radio name=answer value=no>Нет";
echo "<input type='hidden' name='id' value='$id'>";
echo "<input type=submit value=Отправить>";
echo "</form>";
require_once 'footer.html' ;
?>

</body>

</html>
