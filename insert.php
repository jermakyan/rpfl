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
        <table cellSpacing="0" cellPadding="0" width="619" border="0">
        <tr>
            <td>
                <table height="21" cellSpacing="0" cellPadding="0" width="1000" bgcolor="#bed8e1" border="0">
                    <tr>
                        <td valign="bottom" width="400" class="title">Таблица игроков Премьер-Лиги России по футболу. Форма ввода данных</td>
                    </tr>

        </table>

			<table  cellSpacing="0" cellPadding="2" width="1000" border="0">
	  <tr aling=right><form action="ins.php" method="post">
              <td align=right class="heading">Имя игрока: * </td> <td align=left class="heading"><input type="text" maxlength="50" name="ins_player" /></td></tr>
	  <tr><td align=right class="heading">Команда: * </td> <td align=left class="heading"> 
	 <select size="1"  name="ins_team">
	 <option selected value="ЦСКА">ЦСКА</option>

	 <option value="Зенит">Зенит</option>
	 <option value="Ростов">Ростов</option>
	 <option value="Локомотив">Локомотив</option> 
	 <option value="Динамо">Динамо</option>
	 <option value="Анжи">Анжи</option>
	 <option value="Крылья Советов">Крылья Советов</option>
	 <option value="Мордовия">Мордовия</option>
	 <option value="Краснодар">Краснодар</option>
	 <option value="Кубань">Кубань</option>
	 <option value="Терек">Терек</option>
	 <option value="Урал">Урал</option>
	 <option value="Амкар">Амкар</option>
	 <option value="Уфа">Уфа</option>
	 <option value="Рубин">Рубин</option>
	 <option value="Спартак">Спартак</option>
         </select>
          </td></tr>
	  <tr><td align=right class="heading">Гражданство: </td> <td align=left class="heading"><input type="text" maxlength="30" name="ins_country" /></td></tr>
          <tr><td align=right class="heading">Срок контракта: *</td> <td align=left class="heading"><input type="date" name="ins_contract" /></td></tr>
          <tr><td align=right class="heading">Голы: </td> <td align=left class="heading"><input type="number" name="ins_goals" /></td></tr>
          <tr><td align=right class="heading">Передачи: </td> <td align=left class="heading"><input type="number" name="ins_passes" /></td></tr>
          <tr><td align=right class="heading">Комментарии: </td> <td align=left class="heading"><input type="text" maxlength="255" name="ins_comments" /> </td></tr>
          <tr><td class="heading"></td><td align=left class="heading"><input type="submit" name="submit" value="Записать"></form> </td></tr>  

		        </table>

            </td>
        </tr>
    </table>

 <?php require_once 'footer.html' ; ?>
</div>

</body>

</html>

