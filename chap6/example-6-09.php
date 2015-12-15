<meta charset = 'utf-8'>
<?php 
$sweets = array('Sesame Seed Puff','Coconut Milk Gelatin Square','Brown Sugar Cake','Sweet Rice and Meat');

// Logic to do the right thing based on 
// the hidden _submit_check parameter
if (array_key_exists('_submit_check',$_POST)) {
    // If validate_form() returns errors, pass them to show_form()
    if ($form_errors = validate_form()) {
        //エラーメッセージがあれば,エラーメッセージ付きの
        //フォーム表示
        show_form($form_errors);
    } else {
        process_form();
    }
} else {
    //サブミットされてない場合
    //フォームを表示
    show_form();
}



// Do something when the form is submitted
function process_form() {
    print "Hello, ". $_POST['my_name'];
    print '<br>';
    print "あなたの年齢は,{$_POST['my_age']}歳ですね";
    print '<br>';
    print "あなたの身長は,{$_POST['my_height']}ｃｍですね";
    print '<br>';
print "日付は,{$_POST['yr']}年{$_POST['mo']}月{$_POST['dy']}日ですね";
print '<br>';
print "メールアドレスは,{$_POST['my_mail']}ですね";
}


// Display the form
function show_form($errors = '') {
    // If some errors were passed in, print them out
    if ($errors) {
        print 'Please correct these errors: <ul><li>';
        print implode('</li><li>', $errors);
        print '</li></ul>';
    }

    print<<<_HTML_
<form method="POST" action="{$_SERVER['SCRIPT_NAME']}">
<table>
<tr><td>Your name:</td> <td> <input type="text" name="my_name"></td></tr>
<tr><td>年齢:</td><td><input type="text" name="my_age" size="2"></td></tr>
    <tr><td>身長:</td><td><input type="text" name="my_height" size="5"></td></tr>
    <tr><td>日付:</td><td><input type="text" name="yr" size="4">年<input type="mo" name="mo" size="2">月<input type="text" name="dy"  size= "2">日</td></tr>
    <tr><td>メール</td><td><input type="text" name="my_mail"></td></tr>
    <tr><td>Your Order: <select name="order">
_HTML_;

foreach ($GLOBALS['sweets'] as $choice) {
    print "<option>$choice</option>\n";
}
print<<<_HTML_
    </select></tr></td>
<br>

    <tr><td><input type="submit"  value="Say Hello" ></td></tr>
    <tr><td><input type="hidden" name="_submit_check" value="1" ></td></tr>
    </table>

</form>
_HTML_;
}

// Check the form data
function validate_form() {
    // Start with an empty array of error messages
    $errors = array();
    //$name_len = mb_strlen(trim($_POST['my_name']));
    $_POST['my_name']= trim($_POST['my_name']);

    //名前が空の場合はエラーとする
//if($name_len == 0){
    if(mb_strlen($_POST['my_name']) == 0){
    $errors[] ='名前を必ず入力してください';
}
    // Add an error message if the name is too short
    // 名前が3文字よりも少ない場合はエラーとする
    
    //名前が3文字よりも少ない場合はエラーとする
    elseif(mb_strlen($_POST['my_name'])<3){
        $errors[] = 'Your name must be at least 3 letters long.';
}
//年齢は整数で入力する
if($_POST['my_age'] !=strval(intval($_POST['my_age']))){
    $errors[] = '年齢を正しく入力して下さい';
}elseif(($_POST['my_age']<18) || ($_POST['my_age']>65)){
    $errors[] = "Your age must be at least 18 and no more than 65.";
}

//身長は浮動小数点で入力する
if($_POST['my_height'] != strval(floatval($_POST['my_height']))){
    $errors[] = '身長を正しく入力して下さい';
}

 //日付の範囲のチェック
 //6ヶ月前のエポックタイムスタンプを取得
$range_start = strtotime('6 months ago');
//現在のエポック

$range_end = time();
//入力された日付のエポックタイムスタンプを求める
$submitted_date = strtotime($_POST['yr'] . '-' .
    $_POST['mo'] . '-' .
$_POST['dy'] );

if(($range_start>$submitted_date) || ($range_end < $submitted_date)){
    $errors[] = '6ヶ月前以降かつ現在日時の範囲で日付を指定して下さい';
}

//メールアドレスのチェック
if(!preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i',$_POST['my_mail'])){
    $errors[] = '正しいメールアドレスを入力してください';

}

    // Return the (possibly empty) array of error messages
    return $errors;
}