<?php 


$username = 'james';
$domain = '@example.com';

// Concatenate $domain to the end of $username the regular way
$username = $username . $domain;
print $username;
// Concatenate with the combined operator
print '<br>';
$username .= $domain;
print $username;
