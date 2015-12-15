<?php 
// Logic to do the right thing based on 
// the hidden _submit_check parameter
//サブミットされたかどうか
if (array_key_exists('_submit_check',$_POST)) {
    //サブミットされた場合,入力値チェック
    if($form_errors = validate_form())
//エラーメッセージがあれば,エラーメッセージ付きの
        //フォーム表示
 {
        process_form();
    } else {
        show_form();
    }
} else {
    //サブミットされてない場合
    //フォームを表示
    show_form();
}

// Do something when the form is submitted
function process_form() {
    print "Hello, ". $_POST['my_name'];
}

// Display the form
function show_form() {
    print<<<_HTML_
<form method="POST" action="{$_SERVER['SCRIPT_NAME']}">
Your name: <input type="text" name="my_name">
<br/>
<input type="submit" value="Say Hello">
<input type="hidden" name="_submit_check" value="1">
</form>
_HTML_;
}

// Check the form data
function validate_form() {
    // Is my_name at least 3 characters long?
    //名前が3文字より少なかったらエラーとする
    if (mb_strlen($_POST['my_name']) < 3) {
        return false;
    } else {
        return true;
    }
}