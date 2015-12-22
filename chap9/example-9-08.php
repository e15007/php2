<?php 
// 2016年11月1日のエポックタイムスタンプを取得
$november = mktime(0,0,0,11,1,2016);
// 2016年11月の最初の月曜日のエポックタイムスタンプを取得
$monday = strtotime('Monday', $november);
// 2016年11月の最初の月曜日の次の日(火曜日) => スーパーチューズデイ
$election_day = strtotime('+1 day', $monday);
//次回の大統領選挙の日を表示
print strftime('Election day is %A, %B %d, %Y', $election_day);
//2016年1月1日エポックスタンプを取得
$january = mktime(0,0,0,1,1,2016);
//2016年1月の第二月曜日のエポックタイムスタンプを取得
$mo = strtotime('Second Monday of',$january);
//2016年の成人の日
print '<br>';
print date('n月d日',$mo) .'です';
$july = mktime(0,0,0,7,1,2016);
umi = strtotime('Second Monday of', $july);