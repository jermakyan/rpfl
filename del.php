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
                <strong>Результат удаления данных. </strong>
                </div>

<table cellSpacing="0" cellPadding="0" width="619" border="0">
<tr>
   <td>
      <table height="21" cellSpacing="0" cellPadding="0" width="1000" bgcolor="#bed8e1" border="0">
      <tr align=center>
         <td valign="bottom" width="400" class="title">Таблица игроков Премьер-Лиги России по футболу. Форма удаления данных</td>

      </tr>

     </table>


<?php
$id=$_GET["id"];
$answer=$_GET["answer"];

if ($answer=='no')
 {
   header ('Location: select.php');  // перенаправление на нужную страницу
   exit(); 
}
else {

require_once 'conf/connect.php' ;
$query = "DELETE from players where id='$id'";
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

echo "<font color=green>Запись успешно удалена </font><font color=black>если нет сообщения об ошибке. Для возврата в меню нажмите: <p><a href='index.php'>ГЛАВНАЯ СТРАНИЦА</a></p></font>";
}
echo "</table>\n";
require_once 'footer.html' ;
?>

</body>

</html>



