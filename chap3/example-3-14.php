<?php 
$first_name = 'kimiyuki';
$last_name = 'yamauchi';
if (! strcasecmp($first_name,$last_name)) { 
//strcasecmpは等しいとき0が帰る
    print '$first_name and $last_name are equal.';
}
