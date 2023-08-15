<?php
require ('connect.php');
$errors = array();
$email = trim($_POST['email']);
if (empty($email)) {
    $errors[] = 'You forgot to enter your email address.';
}
$password = trim($_POST['password']);
if (empty($password)) {
    $errors[] = 'You forgot to enter your old password.';
}
$new_password = trim($_POST['password1']);
$verify_password = trim($_POST['password2']);
if (strlen($new_password) < 8) {
    $errors[] = "Password must be at least 8 characters in length";
}
if (!empty($new_password)) {
    if (($new_password != $verify_password) ||
        ( $password == $new_password ))
    {
        $errors[] = 'Your new password did not match the confirmed password and/or ';
        $errors[] = 'Your old password is the same as your new password.';
    }
} else {
    $errors[] = 'You did not enter a new password.';
}
if (empty($errors)) {
    try {
        $query = "SELECT uid, userPassword FROM users WHERE ( email=? )";
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        mysqli_stmt_bind_param($q, 's', $email);
        mysqli_stmt_execute($q);

        $result = mysqli_stmt_get_result($q);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ((mysqli_num_rows($result) == 1)
            && (password_verify($password, $row['userPassword'])))
        {
            $hashed_passcode = password_hash($new_password, PASSWORD_DEFAULT);
            $query = "UPDATE users SET userPassword=? WHERE email=?";
            $q = mysqli_stmt_init($dbcon);
            mysqli_stmt_prepare($q, $query);
            mysqli_stmt_bind_param($q, 'ss', $hashed_passcode, $email);
            mysqli_stmt_execute($q);
            if (mysqli_stmt_affected_rows($q) == 1) {
                header ("location: forget-password-thank.php");
                exit();
            } else {
                $errorstring = "System Error! <br /> You could not change password due ";
                $errorstring .= "to a system error. We apologize for any inconvenience.</p>";
                echo "<p style='color:red'>$errorstring</p>";
                exit();
            }
        } else {
            $errorstring = 'Error! <br /> ';
            $errorstring .= 'The email address and/or password do not match those on file.';
            $errorstring .= " Please try again.";
            echo "<p style='color:red'>$errorstring</p>";
        } }
    catch(Exception $e)
    {
        print "An Exception occurred. Message: " . $e->getMessage();
       // print "The system is busy please try later";
    }
    catch(Error $e)
    {
        print "An Error occurred. Message: " . $e->getMessage();
       // print "The system is busy please try again later.";
    }
} else {

    $errorstring = "Error! The following error(s) occurred:<br>";
    foreach ($errors as $msg) {
        $errorstring .= " - $msg<br>\n";
    }
    $errorstring .= "Please try again.<br>";
    echo "<p style='color:red'>$errorstring</p>";
}








