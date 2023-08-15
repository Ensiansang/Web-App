<?php
session_start();
if (isset($_SESSION['userRoleID']) || ($_SESSION['userRoleID'] != 1))
{ header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="./admin-style.css" />
</head>
<body>
<ul>
    <li><a href="#home">Home</a></li>
    <li><a href="#news">News</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#about">About</a></li>
    <li style="float:right"><a href="logout.php"> Logout</a> </li>
    <li style="float:right"><a href="forget-password.php"> New Password</a> </li>
</ul>
<main>
    <section class="glass">
        <div class="dashboard">
            <div class="user">
                <h3>Hello, admin!</h3>
                <p>Authorized user</p>
            </div>
            <div class="pro">
<!--                <button type="button"  onclick="location.href = 'admin-edit.php'">View Members</button>-->
                <li><a href="admin-edit.php"> View Members</a> </li>
            </div>
        </div>
        <div class="games">
            <div class="status">
                <h1 style="text-align: center">Welcome to Admin Page.</h1>
                <h2 style="text-align: center">Authority given.</h2>
            </div>
            <div class="cards">
                <div class="card">
                    <div class="card-info">
                        <h2>You have permission to:</h2>

                        <div class="card">
                            <div class="card-info">
                                <p>Edit and Delete.</p>
                            </div>
                        </div>
                <div class="card">
                    <div class="card-info">
                        <p>View Members to check all the members</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-info">
                        <p>New Password will change your password.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="circle1"></div>
<div class="circle2"></div>
<?php include('bottom.php'); ?>
</body>
</html>
