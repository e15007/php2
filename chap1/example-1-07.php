<?php
require 'MDB2.php';
$db = MDB2::connect('mysql://e15007:1234@localhost/db1');
if(MDB2::isError($db)){die('connect error:' . $db->getMessage());}

print 'OK!';$q = $db->query('select empno,ename from employees order by empno');
while($row = $q->fetchRow()){
    print "$row[0],$row[1]<br>\n";
}




// require 'DB.php';
// // Connect to MySQL running on localhost with username "menu"
// // and password "good2eaT", and database "dinner"
// $db = DB::connect('mysql://menu:good2eaT@localhost/dinner');
// // Define what the allowable meals are
// $meals = array('breakfast','lunch','dinner');
// // Check if submitted form parameter "meal" is one of
// // "breakfast", "lunch", or "dinner"
// if (in_array($meals, $_POST['meal'])) {
//     // If so, get all of the dishes for the specified meal
//     $q = $dbh->query("SELECT dish,price FROM meals WHERE meal LIKE '" . 
//                      $_POST['meal'] ."'");
//     // If no dishes were found in the database, say so
//     if ($q->numrows == 0) {
//         print "No dishes available.";
//     } else {
//         // Otherwise, print out each dish and its price as a row
//         // in an HTML table
//         print '<table><tr><th>Dish</th><th>Price</th></tr>';
//         while ($row = $q->fetchRow()) {
//             print "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
//         }
//         print "</table>";
//     }
// } else {
//     // This message prints if the submitted parameter "meal" isn't
//     // "breakfast", "lunch", or "dinner"
//     print "Unknown meal.";
// }
// ?>