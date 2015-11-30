<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf8'>
<link rel="stylesheet" href="css/basic.css" type="text/css" />
<title>Страница поиска данных</title>
</head>
<body>
	<div id="wrapper">
		<div id="header">
		<br />
		<strong>Страница поиска данных. </strong>
		</div>


<table cellSpacing="0" cellPadding="0" width="619" border="0">
<tr>
   <td>
      <table height="21" cellSpacing="0" cellPadding="0" width="1000" bgcolor="#bed8e1" border="0"> 
      <tr align=center>
         <td valign="bottom" width="400" class="title">Таблица игроков Премьер-Лиги России по футболу. Форма поиска данных</td>

      </tr>

      </table>


       <table cellSpacing="2" cellPadding="2" width="1000" border="0">
         <tr>
            <td class="heading"><form action="find.php" method="post">
                  <p> Имя игрока: <input type="text" name="search_name" />
                         Команда: <input type="text" name="search_team" />
                     Гражданство: <input type="text" name="search_country" /></p>  
                  <p><input type="submit" name="submit" value="Поиск"></p>
               </form></td>

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
  <!--       <td width="110" align="center" width="110" class="item">
            <input type="button" value="Новый игрок" class="search" onclick="doAdd(this)">
         </td> -->
         <td width="110" class="heading">&nbsp;</td>
         <td width="90" class="heading">&nbsp;</td>
      </tr>

<?php
// Соединение, выбор базы данных
require_once 'conf/connect.php';

// Выполнение SQL запроса
$query = 'SELECT id, player_name, club, country, contract, goals, passes FROM players order by create_time desc limit 10';
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());


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

 //  foreach ($line as $col_value) {
          echo "<td width='185' class='item'>$player_name</td>\n";
          echo "<td width='133' class='item'>$club</td>\n";
          echo "<td width='178' class='item'>$country</td>\n";
          echo "<td width='135' class='item'>$contract</td>\n";
          echo "<td width='82'  class='item'>$goals</td>\n";
          echo "<td width='85'  class='item'>$passes</td>\n";
 //  }

     echo "<td class='item'><form action='edit.php' method='get' >";
     echo "<input type='hidden' name='id' value='$id'>";
     echo "<input type='submit' class='edit' value='редактировать'>";
     echo "</form></td>";


//Так работает!!!!!!!!! class здесь это вид кнопки из css Первый инпут - условие что передаем, второй название кнопки и передача
     echo "<td class='item'><form action='delete.php' method='get' >";
     echo "<input type='hidden' name='id' value='$id'>";
     echo "<input type='submit' class='delete' value='удалить'>";
     echo "</form></td>";



echo "\t</tr>\n";
}
echo "</table>\n";

          // Очистка результата
          pg_free_result($result);

          // Закрытие соединения
          pg_close($dbconn);
?>


 </table>
   </td>
</tr>
</table>
<?php require_once 'footer.html' ; ?>

</body>

</html>

