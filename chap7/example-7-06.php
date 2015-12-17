<?php 

require 'MDB2.php';
$db = MDB2::connect('mysql://e15007:1234@localhost/restaurant');
if (MDB2::isError($db)) { die("connection error: " . $db->getMessage()); }
$db->setErrorHandling(PEAR_ERROR_DIE);

$q = $db->query("CREATE TABLE dishes (
	dish_id INT primary key auto_increment,
	dish_name VARCHAR(255),
	price DECIMAL(4,2),
	is_spicy INT
)");
print 'OK!';

