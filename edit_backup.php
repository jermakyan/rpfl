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

        <table cellSpacing="0" cellPadding="0" width="619" border="0">
        <tr>
            <td>
                <table height="21" cellSpacing="0" cellPadding="0" width="1000" bgcolor="#bed8e1" border="0">
                    <tr align=center>
                        <td valign="bottom" width="400" class="title">Таблица игроков Премьер-Лиги России по футболу. Форма редактирования данных</td>

                    </tr>

                </table></table>

<?php
$id=$_GET["id"];

require_once 'conf/connect.php' ;

$query = "SELECT * from  players where id='$id'";
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());


// Вывод результатов в HTML

echo "<table cellSpacing='0' cellPadding='2' width='1000' border='0' >\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
   $id = $line["id"];
   $player_name = $line["player_name"];
   $club = $line["club"];
   $country = $line["country"];
   $contract = $line["contract"];
   $goals = $line["goals"];
   $passes = $line ["passes"];

//echo "\t<tr align='left'>\n";

echo "<tr><form action='ed.php' method='POST'>";
echo "<td align=right class='heading'>Имя игрока: * </td><td align=left class='heading'><input type='text' value='$player_name' name='edit_player' /></td></tr>";
echo "<td align=right class='heading'>Команда: </td><td align=left class='heading'><input type='text' value='$club' name='edit_club' /></td></tr>";
echo "<td align=right class='heading'>Гражданство: </td><td align=left class='heading'><input type='text' value='$country' name='edit_country' /></td></tr>";
echo "<td align=right class='heading'>Срок контракта *: </td><td align=left class='heading'><input type='text' value='$contract' name='edit_contract' /></td></tr>";
echo "<td align=right class='heading'>Голы: </td><td align=left class='heading'><input type='text' value='$goals' name='edit_goals' /></td></tr>";
echo "<td align=right class='heading'>Передачи: </td><td align=left class='heading'><input type='text' value='$passes' name='edit_passes' /></td></tr>";
echo "<td align=right class='heading'>Комментарии:  </td><td align=left class='heading'><input type='text' value='$comment' name='edit_comment' /></td></tr>";
//echo "<td align=right class='heading'>id:  </td><td align=left class='heading'><input type='hidden' value='$id' name='id' /></td></tr>";
echo "<input type='hidden' value='$id' name='id' />";
echo "<tr><td class='heading'></td><td align=left class='heading'><input type='submit' name='submit' value='Записать'></form> </td></tr>";



//          echo "<td width='185' class='item'>$player_name</td>\n";
//          echo "<td width='133' class='item'>$club</td>\n";
//          echo "<td width='178' class='item'>$country</td>\n";
//          echo "<td width='135' class='item'>$contract</td>\n";
//          echo "<td width='82'  class='item'>$goals</td>\n";
//          echo "<td width='85'  class='item'>$passes</td>\n";

//echo "\t</tr>\n";
}
echo "</table>\n";

pg_free_result($result);
pg_close($dbconn);

echo "</table></td></tr></table>";

?>


    <div id="footer">
        <br />
        this is NODE1
    </div>

</body>

</html>

