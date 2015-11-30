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
                        <td valign="bottom" width="400" class="title">Таблица игроков Премьер-Лиги России по футболу. Результат поиска данных</td>

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

                    //Получаем переменные
                    $search_na=$_POST['search_name'];
                    $search_t=$_POST['search_team'];
                    $search_c=$_POST['search_country'];

    //Экранируем от запроса % и экранируем спецсимволы как описано тут http://php.net/manual/ru/function.pg-escape-string.php
    if ($search_na=='%' OR $search_na=='%%' OR $search_na=='%%%' OR $search_na=='%%%%' ) {$search_na==' ';}  else $search_name=pg_escape_string($search_na);
    if ($search_t=='%' OR $search_t=='%%' OR $search_t=='%%%' OR $search_t=='%%%%') {$search_t==' ';} else $search_team=pg_escape_string($search_t);
    if ($search_c=='%' OR $search_c=='%%' OR $search_c=='%%%' OR $search_c=='%%%%') {$search_c==' ';} else $search_country=pg_escape_string($search_c);

                    //Экранируем спецсимволы в строке, как описано тут http://php.net/manual/ru/function.pg-escape-string.php
//		    $search_name=pg_escape_string($search_na);
//	            $search_team=pg_escape_string($search_t);
//		    $search_country=pg_escape_string($search_c);

		   //Проверка заполнения
                    if (empty($search_name) AND empty($search_team) AND empty($search_country)) {
                    print "<font color=red>Заполните хотя бы одно поле условий поиска! </font>" ; }
		    else

                    require_once 'conf/connect.php' ;

                   // Выполнение SQL запроса
		    $query = "SELECT * FROM players WHERE player_name like '%$search_name%' AND club like '%$search_team%' AND country like '%$search_country%'" ;
//Это работает!     $query = "SELECT * FROM players where player_name='Ари'";
//Это работает!     $query = "SELECT * FROM players where player_name like '%Глушаков%'";
//Это работает!	    $query = "SELECT * FROM players where player_name='$search_name'";
//               	    echo "Query: "; echo $query;
		    $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());


                    // Вывод результатов в HTML
                    echo "<table>\n";
                    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                        $player_id = $line["id"];
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
     echo "<input type='hidden' name='id' value='$player_id'>";
     echo "<input type='submit' class='edit' value='редактировать'>";
     echo "</form></td>";

     echo "<td class='item'><form action='delete.php' method='get' >";
     echo "<input type='hidden' name='id' value='$player_id'>";
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


