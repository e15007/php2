<?php 
$logged_in = true;
print "This is always printed.<br>";
if ($logged_in) {
    print "Welcome aboard, trusted user.<br>";
    print 'This is only printed if $logged_in is true.<br>';
}
print "This is also always printed.";
