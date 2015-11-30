<?php
// Подключение выводим в отдельную директорию чтобы логин-пароль был только в одном месте, а не во всех файлах

// Соединение, выбор базы данных
$dbconn = pg_connect("host=192.168.102.7 dbname=test1 user=primer password=Qweasd78")
    or die('Could not connect: ' . pg_last_error());
?>
