<?php
session_start();
if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1))
{ header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
          crossorigin="anonymous">
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
        <a href="admin-edit.php">Go Back</a>
        <div class="col-sm-8">
            <?php
            require ("user-edit-process.php");
            ?>
        </div>

    <p class="copyright"> Issues at siansang.com &copy 2021
</body>
</html>
