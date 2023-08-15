<?php
session_start();
if (!isset($_SESSION['userRoleID']) || ($_SESSION['userRoleID'] != 1))
{ header("Location: login.php");
    exit();
}
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Users Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS File -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
          crossorigin="anonymous">
    <link rel="stylesheet" href="./admin-style.css" />

</head>
<style>
    body
    {
        height: 125vh;
        margin-top: 80px;
        padding: 30px;
        background-size: cover;
        font-family: sans-serif;
    }
    header {
        background-color: orange;
        position: fixed;
        left: 0;
        right: 0;
        top: 5px;
        height: 30px;
        display: flex;
        align-items: center;
        box-shadow: 0 0 25px 0 black;
    }
    header * {
        display: inline;
    }
    header li {
        margin: 20px;
    }
    header li a {
        color: blue;
        text-decoration: none;
    }
    .copyright {
        background-color: #111111;
        text-align: center;
        color: white;
    }
</style>
<body>
<header>
    <nav>
        <ul>
            <li>
                <a href="#"> Home </a>
            </li>
            <li>
                <a href="#"> News </a>
            </li>
            <li>
                <a href="#"> Contact </a>
            </li>
            <li> <a href="#"> Terms of use </a>
            </li>
            <li><a href="logout.php"> Logout</a> </li>
        </ul>
    </nav>
</header>
<div class="container" style="margin-top:30px">


    <div class="row" style="padding-left: 0px;">
        <nav class="col-sm-2"></nav>
        <!-- Center Column Content Section -->
        <div class="col-sm-8">
            <a href="admin.php">Go Back</a>
            <h2 class="text-center">These are the registered users</h2>
            <p>
                <?php
                try {
                    require('connect.php');
                    $query ="SELECT uid, accountId, userLogin, email, userRoleID FROM users ORDER BY userRoleID ASC";
                    $result = mysqli_query ($dbcon, $query);
                    if ($result) {
                        echo '<table class="table table-striped">
<tr>
<th scope="col">Edit</th>
<th scope="col">Delete</th>
<th scope="col">User_ID</th>
<th scope="col">Account_ID</th>
<th scope="col">userLogin</th>
<th scope="col">Email</th>
<th scope="col">userRoleID</th>
</tr>';
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $user_id = htmlspecialchars($row['uid'], ENT_QUOTES);
                            $accountId = htmlspecialchars($row['accountId'], ENT_QUOTES);
                            $userLogin = htmlspecialchars($row['userLogin'], ENT_QUOTES);
                            $email = htmlspecialchars($row['email'], ENT_QUOTES);
                            $userRoleID = htmlspecialchars($row['userRoleID'], ENT_QUOTES);
                            echo '<tr>
	<td><a href="user-edit.php?id=' . $user_id . '">Edit</a></td>
	<td><a href="user-delete.php?id=' . $user_id . '">Delete</a></td>
	<td>' . $user_id . '</td>
	<td>' . $accountId . '</td>
	<td>' . $userLogin . '</td>
	<td>' . $email . '</td>
	<td>' . $userRoleID . '</td>
	</tr>';
                        }
                        echo '</table>';
                        //                                                                                                                                                                      #7
                        mysqli_free_result ($result);
                    }
                    else {
                        echo '<p class="error">The current users could not be retrieved. We apologize';
                        echo ' for any inconvenience.</p>';
echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $query . '</p>';
                        exit;
                    }
                    mysqli_close($dbcon);
                }
                catch(Exception $e)
                {
                     print "An Exception occurred. Message: " . $e->getMessage();
                    print "The system is busy please try later";
                }
                catch(Error $e)
                {
                    print "An Error occurred. Message: " . $e->getMessage();
                    print "The system is busy please try again later.";
                }
                ?>

        </div>

    </div>

</div>
<p class="copyright"> Issues at siansang.com &copy 2021
</body>
</html>
