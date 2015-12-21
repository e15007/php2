<?php 
function validate_form() {
    $errors = array();

    // Sample users with encrypted passwords
    $users = array('alice'   => '$1$45678901$l1YlMGYRdOTDN1k38wkY0.',
                   'bob'     => '$1$45678901$1uhePJAne1H8ZNXdrPsBv.',
                   'charlie' => '$1$45678901$S/LgtGvF3iwXqacLKvdog1');
 
     // Make sure user name is valid
    if (! array_key_exists($_POST['username'], $users)) {
        $errors[] = 'Please enter a valid username and password.';
    }
                                   
    // See if password is correct
    $saved_password = $users[ $_POST['username'] ];
    if ($saved_password != crypt($_POST['password'], $saved_password)) {
        $errors[] = 'Please enter a valid username and password.';
    }

    return $errors;
}