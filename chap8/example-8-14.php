<?php
require '../chap6/formhelpers.php';

// This is identical to the input_text() function in formhelpers.php but
// prints a password box (in which asterisks obscure what's entered)
// instead of a plain text field
require 'MDB2.php';
$db = MDB2::connect('mysql://e15007:1234@localhost/restaurant');
if (MDB2::isError($db)) { die("connection error: " . $db->getMessage()); }
$db->setErrorHandling(PEAR_ERROR_DIE);

function input_password($field_name, $values) {
    print '<input type="password" name="' . $field_name .'" value="';
    print htmlentities($values[$field_name]) . '">';
}

session_start();

if (array_key_exists('_submit_check',$_POST)) {
    if ($form_errors = validate_form()) {
        show_form($form_errors);
    } else {
        process_form();
    } 
} else {
    show_form();
}

function show_form($errors = '') {
    print '<form method="POST" action="'.$_SERVER['PHP_SELF'].'">';

    if ($errors) {
        print '<ul><li>';
        print implode('</li><li>',$errors);
        print '</li></ul>';
    } 
    print 'Username: ';
    if(!array_key_exists('username',$_POST)){
        $_POST['username'] = '';
    }
    input_text('username', $_POST);
    print '<br/>';

    print 'Password: ';
    if(!array_key_exists('password',$_POST)){
        $_POST['password'] = '';
    }
    input_password('password', $_POST);
    print '<br/>';

    input_submit('submit','Log In');

    print '<input type="hidden" name="_submit_check" value="1"/>';
    print '</form>';
}

function validate_form() {
    $errors = array();
    global $db;
$sth = $db->prepare('select password from users where username = ?');
$result = $sth->execute(array($_POST['username']));
$encrypted_password = $result->fetchOne();
var_dump($encrypted_password );
var_dump(crypt($_POST['password'],$encrypted_password));
if($encrypted_password != crypt($_POST['password'],$encrypted_password)){
    $errors[] = 'Please enter a valid username and password.';
}


    // Some sample usernames and passwords
    // $users = array('alice'   => 'dog123',
    //                'bob'     => 'my^pwd',
    //                'charlie' => '**fun**');
    
    // Make sure user name is valid
    // if (! array_key_exists($_POST['username'], $users)) {
    //     $errors[] = 'Please enter a valid username and password.';
    // }
                                   
    // See if password is correct
    // $saved_password = $users[ $_POST['username'] ];
    // if ($saved_password != $_POST['password']) {
    //     $errors[] = 'Please enter a valid username and password.';
    // }
    // $saved_password = $users[ $_POST['username'] ];
    // if ($saved_password != crypt($_POST['password'], $saved_password)) {
    //     $errors[] = 'Please enter a valid username and password.';
    // }

    return $errors;
}
 

function process_form() {
    // Add the username to the session
    $_SESSION['username'] = $_POST['username'];

    print "Welcome, $_SESSION[username]";
}
?>