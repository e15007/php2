<?php 
print 'strftime says(): ';
//time() 現在のエポックタイムスタンプの経過時間
print strftime('%I:%M:%S', time() + 60*60);
print "\n";
print 'date() says: ';
print date('h:i:s', time() + 60*60);