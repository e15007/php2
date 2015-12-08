<?php 
$letters[0] = 'A';
$letters[1] = 'B';
$letters[3] = 'D';
$letters[2] = 'C';

foreach ($letters as $letter) {
    print $letter;
    print '<br>';
    
}

for ($i=0,$num = count($letters);$i < $num;$i++){
    print $letters[$i];
    print '<br>';
}