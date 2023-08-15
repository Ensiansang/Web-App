<?php
try {
    $errors = array();
    $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
    if (empty($first_name)) {
        $errors[] = 'You forgot to enter your first name.';
    }

    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
    if (empty($last_name)) {
        $errors[] = 'You forgot to enter your last name.';
    }
//    $birthday = filter_var($_POST['birthday'], FILTER_SANITIZE_STRING);
//    if (empty($birthday)) {
//        $errors[] = 'You forgot to enter birthday.';
//    }
    $gender = trim($_POST['gender'], FILTER_SANITIZE_STRING);
    if (empty($gender)) {
        $errors[] = 'You forgot to enter your gender.';
    }

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
        $errors[] = 'You forgot to enter your email address';
        $errors[] = ' or the e-mail format is incorrect.';
    }
    $phoneNumber = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    if (empty($phoneNumber)) {
        $errors[] = 'You forgot to enter your phone number.';
    }

    $usename = filter_var($_POST['uname'], FILTER_SANITIZE_STRING);
    if (empty($usename)) {
        $errors[] = 'You forgot to enter your user name.';
    }

    $password1 = filter_var($_POST['pwd'], FILTER_SANITIZE_STRING);
    $password2 = filter_var($_POST['re-pwd'], FILTER_SANITIZE_STRING);
    if (strlen($password1) < 8) {
        $errors[] = "Password must be at least 8 characters in length";
    }
    if (!empty($password1)) {
        if ($password1 !== $password2) {
            $errors[] = 'Your two password did not match.';
        }
    } else {
        $errors[] = 'You forgot to enter your password.';
    }
    $role = filter_var($_POST['role'], FILTER_SANITIZE_NUMBER_INT);
    if (empty($role)) {
        $errors[] = "You forgot to select your role";
    }

    if (empty($errors)) {

        $passaword_hashed = password_hash($password1, PASSWORD_DEFAULT);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        require('connect.php'); // Connect to the db.
        // Make the query:
        $query = "INSERT INTO accounts (accountId, firstName, lastName, gender, phoneNumber, registrationDate) ";
        $query .="VALUES(' ',?, ?, ?, ?, NOW())";
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);

        mysqli_stmt_bind_param($q, 'ssss', $first_name, $last_name, $gender, $phoneNumber);
        // execute query
        mysqli_stmt_execute($q);
        $last_id = $dbcon->insert_id;
        // echo "New record ID " . $last_id;

        if (mysqli_stmt_affected_rows($q) == 1) {	// One record inserted

            $query = "INSERT INTO users (uid, accountId,userLogin, userPassword, userRoleID, email) ";
            $query .="VALUES(' ',?,?,?,?,?)";
            $q = mysqli_stmt_init($dbcon);
            mysqli_stmt_prepare($q, $query);
            mysqli_stmt_bind_param($q, 'issis', $last_id,$usename, $passaword_hashed, $role, $email);
            mysqli_stmt_execute($q);
            if (mysqli_stmt_affected_rows($q) == 1) {
                echo "Successfully added the user account";
                header ("location: thank.php");
                exit();
            } else {
                $errorstring = "User account creation failed...";
            }
    } else {
            $errorstring = "<p class='text-center col-sm-8' style='color:red'>";
            $errorstring .= "System Error<br />You could not be registered due ";
            $errorstring .= "to a system error. We apologize for any inconvenience.</p>";
            echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
            mysqli_close($dbcon);
            exit();
        }
    } else {
        $errorstring = "Error! <br /> The following error(s) occurred:<br>";
        foreach ($errors as $msg) {
            $errorstring .= " - $msg<br>\n";
        }
        $errorstring .= "Please try again.<br>";
        echo "<p style='color:red'>$errorstring</p>";
    }
} catch(Exception $e) // We finally handle any problems here
{
    print "An Exception occurred. Message: " . $e->getMessage();
    //print "The system is busy please try later";
}
catch(Error $e)
{
    print "An Error occurred. Message: " . $e->getMessage();
    //print "The system is busy please try again later.";
}