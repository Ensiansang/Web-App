<?php
session_start();
if (!isset($_SESSION['userRoleID']) || ($_SESSION['userRoleID'] != 0))
{ header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
            href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="./styles.css" />
    <title>Member Page</title>
</head>
<body>
<header>
    <div class="logo-container">
        <img src="./img/logo.svg" alt="logo" />
        <h4 class="logo">Three Dots</h4>
    </div>
    <nav>
        <ul class="nav-links">
            <li><a class="nav-link" href="#">Home</a></li>
            <li><a class="nav-link" href="#">News</a></li>
            <li><a class="nav-link" href="#">Contact</a></li>
        </ul>
    </nav>
    <div class="cart">
        <?php include 'another-member.php'; ?>
    </div>
</header>

<main>
    <section class="presentation">
        <div class="introduction">
            <div class="intro-text">
                <h1>Welcome to Member Page!</h1>
                <h2>Laptop for the future</h2>
                <p>
                    The new 14 inch bezeless display oferring a 4k
                    display with touch screen.
                </p>
            </div>
            <div class="cta">
                <button class="cta-select">14 Inch</button>
                <button class="cta-add">Add To Cart</button>
            </div>
        </div>
        <div class="cover">
            <img src="./img/matebook.png" alt="matebook" />
        </div>
    </section>



    <img class="big-circle" src="./img/big-eclipse.svg" alt="" />
    <img class="medium-circle" src="./img/mid-eclipse.svg" alt="" />
    <img class="small-circle" src="./img/small-eclipse.svg" alt="" />
</main>

</body>
</html>
