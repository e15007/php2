<?php 
require 'MDB2.php';
$db = MDB2::connect('mysql://e15007:1234@localhost/restaurant');
if (MDB2::isError($db)) { die("connection error: " . $db->getMessage()); }
$db->setErrorHandling(PEAR_ERROR_DIE);

//でーたベースの値を表示
$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetchRow()) {
    print "$row[0], $row[1] <br>\n";
}