<?php 
require 'MDB2.php';
$db = MDB2::connect('mysql://e15007:1234@localhost/restaurant');
if (MDB2::isError($db)) { die("connection error: " . $db->getMessage()); }
//データべースエラーに関してはメッセージを抜け出す
$db->setErrorHandling(PEAR_ERROR_DIE);
// Change the fetch mode to objects オブジェクトに変更
$db->setFetchMode(MDB2_FETCHMODE_OBJECT);

print "With query() and fetchRow(): \n";
// get each row with query() and fetchRow();
$q = $db->query("SELECT dish_name, price FROM dishes");
while($row = $q->fetchRow()) {
    print "The price of $row->dish_name is $row->price <br>\n";
}


print "With queryAll(): \n";
// get all the rows with getAll();
$dishes = $db->queryAll('SELECT dish_name, price FROM dishes');
foreach ($dishes as $dish) {
    print "The price of $dish->dish_name is $dish->price <br>\n";
}

print "With queryRow(): \n";
$cheap = $db->queryRow('SELECT dish_name, price FROM dishes
    ORDER BY price LIMIT 1');
print "The cheapest dish is $cheap->dish_name with price $cheap->price".'<br>';