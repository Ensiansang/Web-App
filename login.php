<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form
    </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?>
    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="container">
                <div class="form">
                    <h2>Login Form</h2>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {                                //#1
                        require('login-check.php');
                    } 
                    ?>
                    <form action="login.php" method="post">
                    <div class="inputBox">
<!--                        <input type="text" placeholder="Username" name="usename"  value="--><?php //if (isset($_POST['usename'])) echo $_POST['usename']; ?><!--">-->
                        <input type="text" name="email" placeholder="Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
                    </div>
                    <div class="inputBox">
                        <input type="password" placeholder="Password" name="password"  value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="" value="Login">
                        <p class="forget">
                            Forgot Password? <a href="#">Click Here</a>
                        </p>
                        <p class="forget">
                           Don't have an account? <a href="index.php">Sign Up</a>
                        </p>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>

