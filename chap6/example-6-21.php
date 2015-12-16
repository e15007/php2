<?php 

$_POST['comments'] = 'I <b>love</b> sweet <div class="fancy">rice</div> & tee,';

print $_POST['comments'];
print "\n<br>\n";
// Remove HTML from comments
$comments = htmlentities($_POST['comments']);
// Now it's OK to print $comments
print $comments;