<?php 

require 'MDB2.php';
require 'example-10-12.php';
// Connect to the database
$db = MDB2::connect('mysql://e15007:1234@localhost/restaurant');
if (MDB2::isError($db)) { die("connection error: " . $db->getMessage()); }

$db->setErrorHandling(PEAR_ERROR_DIE);
// Open the CSV file for writing
$fh = fopen('dishes.csv','wb');

$dishes = $db->query('SELECT dish_name, price, is_spicy FROM dishes');
while ($row = $dishes->fetchRow()) {
    // Turn the array from fetchRow() into a CSV-formatted string
    $line = make_csv_line($row);
    // Write the string to the file. No need to add a newline on
    // the end since make_csv_line() does that already
    fwrite($fh, $line);
}
fclose($fh);

echo 'ok';

?>