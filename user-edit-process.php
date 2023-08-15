<?php
try
{
    if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
        $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
    } elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
        $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    } else {
        echo '<p class="text-center">This page has been accessed in error.</p>';
        include ('footer.php');
        exit();
    }

    require ('connect.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = array();
                $usename = trim($_POST['usename'], FILTER_SANITIZE_STRING);
        if (empty($usename)) {
            $errors[] = 'You forgot to enter your user name.';
        }
        $email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
        if  ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $errors[] = 'You forgot to enter your email address';
            $errors[] = ' or the e-mail format is incorrect.';
        }
        if (empty($errors)) {                                        #2
            $q = mysqli_stmt_init($dbcon);
            $query = 'SELECT uid FROM users WHERE email=? AND uid !=?';
            mysqli_stmt_prepare($q, $query);
            mysqli_stmt_bind_param($q, 'si', $email, $id);
            mysqli_stmt_execute($q);
            $result = mysqli_stmt_get_result($q);

            if (mysqli_num_rows($result) == 0) {
                $query = 'UPDATE users SET userLogin=?, email=?';
                $query .= ' WHERE uid=? LIMIT 1';
                $q = mysqli_stmt_init($dbcon);
                mysqli_stmt_prepare($q, $query);
                mysqli_stmt_bind_param($q, 'ssi', $usename, $email, $id);
                mysqli_stmt_execute($q);

                if (mysqli_stmt_affected_rows($q) == 1) {
                    echo '<h3 class="text-center">The user has been edited.</h3>';
                } else {
                    echo '<p class="text-center">The user could not be edited due to a system error.';
                    echo ' We apologize for any inconvenience.</p>';
                    echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>'; 

                }
            } else {
                echo '<p class="text-center">The email address has already been registered.</p>';
            }
        } else {
            echo '<p class="text-center">The following error(s) occurred:<br />';
            foreach ($errors as $msg) {
                echo " - $msg<br />\n";
            }
            echo '</p><p>Please try again.</p>';
        }
    }

    $q = mysqli_stmt_init($dbcon);
    $query = "SELECT userLogin, email FROM users WHERE uid=?";
    mysqli_stmt_prepare($q, $query);
    mysqli_stmt_bind_param($q, 'i', $id);
    mysqli_stmt_execute($q);
    $result = mysqli_stmt_get_result($q);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    if (mysqli_num_rows($result) == 1) {

        ?>
        <h2 class="h2 text-center">Edit Record</h2>
        <form action="user-edit.php" method="post"
              name="editform" id="editform">
            <div class="form-group row">
                <label for="first_name" class="col-sm-4 col-form-label">Username:</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Username" name="usename" value="<?php echo htmlspecialchars($row[2], ENT_QUOTES); ?>" >
                </div>
            </div>
            <div class="form-group row">
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">E-mail:</label>
                <div class="col-sm-8">
                    <input type="text" name="email" placeholder="Email" value="<?php echo htmlspecialchars($row[2], ENT_QUOTES); ?>">
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <div class="form-group row">
                <label for="" class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8">
                    <input id="submit" class="btn btn-primary" type="submit" name="submit" value="Register">
                </div>
            </div>
        </form>
        <?php
    } else { 
        echo '<p class="text-center">This page has been accessed in error.</p>';
    }
    mysqli_stmt_free_result($q);
    mysqli_close($dbcon);
}
catch(Exception $e)
{
    print "The system is busy. Please try later";
    print "An Exception occurred.Message: " . $e->getMessage();
}catch(Error $e)
{
    print "The system is currently busy. Please try again later";
    print "An Error occured. Message: " . $e->getMessage();
}
?>