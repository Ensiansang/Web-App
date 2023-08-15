<?php
//
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    try {
//        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
//        if (empty($email)) {
//            $error[] = 'or the username does not exist';
//        }
//
//        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
//        if (empty($password)) {
//            $error[] = 'You forgot to enter your password';
//        }
//
//        if (empty($error)) {
//                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//                require ('logconn.php');
//                $username = $_POST['username'];
//                $password = $_POST['password'];
//                $sql= "SELECT * FROM users WHERE userLogin = '$username' AND userPassword = '$password'";
//                $result = mysqli_query($dbcon,$sql);
//                $row = mysqli_fetch_array($result);
//                if(isset($row)){
//                    echo 'success';
//                    session_start();
//                    $_SESSION['user_level'] = (int)$row[4];
//                    $url = ($_SESSION['user_level'] === 1 ) ? 'memberpage.php' : 'adminpage.php';
//                    header('Location : ' .$url);
//                }else{
//                    echo 'failure';
//                }
//            require ('connect.php');
//            $sql = "SELECT email, userPassword FROM users WHERE email = '$email' AND userPassword = '$password' LIMIT 1";
//
//            $result = mysqli_query($dbcon, $sql);
//
//            if (mysqli_num_rows($result) === 1) {
//                $row = mysqli_fetch_assoc($result);
//                if ($row['email'] === $email && $row['userPassword'] === $password) {
//                    session_start();
//                    $_SESSION['email'] = $row['email'];
//                    $_SESSION['password'] = $row['userPassword'];
//                    $_SESSION['role'] = $row ['userRoleID'];
//
//                    if ($row['userRoleID'] === 1) {
//                        header('Location: admin.php');
//                    }
//                    if ($row['userRoleID'] === 2) {
//                        header('Location: member.php');
//                    }
//                }
//            } else {
//                $error[] = "username/password entered doesnt match our records";
//                $error[] .= "Perhaps you need to register";
//            }
//        }
//        if (!empty($error)) {
//            $errorstring = "<strong>Error!</strong> <br /> The following error(s) occurred:<br>";
//            foreach ($error as $msg) {
//                $errorstring .= " - $msg<br>\n";
//            }
//            $errorstring .= "Please try again.<br>";
//            echo "<p class='alert alert-danger' style='color:red'>$errorstring</p>";
//        }
//    }
//
//    catch (Exception $e)
//    {
//        print "An exception error occurred : " . $e->getMessage(); //For debugging
//        print "<br>This system is busy at the moment, please try later e!"; // After you published
//    }
//
//    catch (Error $e)
//    {
//        print "An exception error occurred : " . $e->getMessage(); //For debugging
//        print "This system is busy at the moment, please try later er!"; // After you published
//    }
//}
//?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {

        $email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
        if  ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $errors[] = 'You forgot to enter your email address';
            $errors[] = ' or the e-mail format is incorrect.';
        }
//        $usename = trim($_POST['usename'], FILTER_SANITIZE_STRING);
//        if (empty($usename)) {
//            $errors[] = 'You forgot to enter your user name.';
//        }

        $password = filter_var( $_POST['password'], FILTER_SANITIZE_STRING);
        if (empty($password)) {
            $errors[] = 'You forgot to enter your password.';
        }
        if (empty($errors)) {
//            $select_stmt=$dbcon->prepare("SELECT uid, userPassword, userRoleID FROM users WHERE email=?");
//            $select_stmt->bind_param(":uemail", $email);
//            $select_stmt->bind_param(":upassword", $password);
//            $select_stmt->execute();
//            while($row=$select_stmt->fetch(PDO::FETCH_ASSOC)) {
//            $dbemail = $row["email"];
//            $dbpassword = $row["password"];
//            }
//            if($email!=null AND $password!=null) {
//                if($select_stmt->rowCount()>0) {
//                if($email==$dbemail AND $password==$dbpassword) {
//                    switch ($dbrole) {
//                        case "admin":
//                    }
//                }
//                }
//            }
            require ('connect.php');
            $query = "SELECT uid, userPassword, userRoleID FROM users WHERE email=?";
            $q = mysqli_stmt_init($dbcon);
            mysqli_stmt_prepare($q, $query);
            mysqli_stmt_bind_param($q, "s", $email);
            mysqli_stmt_execute($q);

            $result = mysqli_stmt_get_result($q);

            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            if (mysqli_num_rows($result) == 1) {
                if (password_verify($password, $row[1])) {
                    session_start();
//                    $Role = ("SELECT * FROM users WHERE email ='".$_POST['email']."'");
//                    if ( $Role == "admin"){
//                        header("location:admin.php");
//                    }
//                    else if ( $Role == "member"){
//                        header("location:member.php");
//                    }
                    $_SESSION['userRoleID'] = (int) $row[4];
                    $url = ($_SESSION['userRoleID'] === 1) ? 'admin.php' :
                        'member.php';
                    header('Location: ' . $url);
//                    if ($url = ($_SESSION['userRoleID'] === 1)) {
//                    header('Location: admin.php');
//                }
//                    if ($url = ($_SESSION['userRoleID'] === 0)) {
//                        header('Location: member.php');
//                    }

                } else {
                    $errors[] = 'Password entered does not match our records. ';
                    $errors[] = 'Perhaps you need to register, just click the Register ';

                }
            } else {
                $errors[] = 'E-mail entered does not match our records. ';
                $errors[] = 'Perhaps you need to register, just click the Register ';

            }
        }
        if (!empty($errors)) {
            $errorstring = "Error! <br /> The following error(s) occurred:<br>";
            foreach ($errors as $msg) {
                $errorstring .= " $msg<br>\n";
            }
            $errorstring .= "Please try again.<br>";
            echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
        }
        mysqli_stmt_free_result($q);
        mysqli_stmt_close($q);
    }
    catch(Exception $e)
    {
        print "An Exception occurred. Message: " . $e->getMessage();
        //print "The system is busy please try later";
    }
    catch(Error $e)
    {
        print "An Error occurred. Message: " . $e->getMessage();
        //print "The system is busy please try again later.";
    }
}
