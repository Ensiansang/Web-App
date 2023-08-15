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
    <title>Delete Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS File -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
          crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top:30px">
    <header class="jumbotron text-center row"
            style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;">
        <?php include('header-admin.php'); ?>
    </header>
    <div class="row" style="padding-left: 0px;">
        <div class="col-sm-8">
            <?php
            require ("user-delete-process.php");
            ?>
        </div>
    </div>
</div>
</body>
</html>
