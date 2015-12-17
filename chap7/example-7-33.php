<?php 

require 'MDB2.php';
$db = MDB2::connect('mysql://e15007:1234@localhost/restaurant');
if (MDB2::isError($db)) { die("connection error: " . $db->getMessage()); }
//データべースエラーに関してはメッセージを抜け出す
$db->setErrorHandling(PEAR_ERROR_DIE);
$rows = $db->queryAll('SELECT dish_name, price FROM dishes');
foreach ($rows as $row) {
    print "$row[0], $row[1] <br>\n";
}