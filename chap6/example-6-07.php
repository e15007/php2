<?php 
// Logic to do the right thing based on 
// the hidden _submit_check parameter
//$_POSTに[_submit_check]があればサブミットされたと判定する
if (array_key_exists('_submit_check',$_POST)) {
    process_form();
} else {
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