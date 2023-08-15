<?php
//session_start();
//$_SESSION["uid"] = "1";
//DEFINE ('DB_USER', 'u265455877_siansang');
//DEFINE ('DB_PASSWORD', 'Asd,car21Sang');
//DEFINE ('DB_HOST', 'siansang.com');
//DEFINE ('DB_NAME', 'u265455877_siansang');
//$dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Connection Error: " . mysqli_error($conn));
//
//if (count($_POST) > 0) {
//    $result = mysqli_query($dbcon, "SELECT * from users WHERE uid='" . $_SESSION["uid"] . "'");
//    $row = mysqli_fetch_array($result);
//    if ($_POST["password"] == $row["userPassword"]) {
//        mysqli_query($dbcon, "UPDATE users set userPassword='" . $_POST["password1"] . "' WHERE uid='" . $_SESSION["uid"] . "'");
//        $message = "Password Changed";
//    } else
//        $message = "Current Password is not correct";
//}
//?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
<!--    <script>-->
<!--        function validatePassword() {-->
<!--            var password, password1,password2,output = true;-->
<!---->
<!--            password = document.frmChange.password;-->
<!--            password1 = document.frmChange.password1;-->
<!--            password2 = document.frmChange.password2;-->
<!---->
<!--            if(!password.value) {-->
<!--                password.focus();-->
<!--                document.getElementById("password").innerHTML = "required";-->
<!--                output = false;-->
<!--            }-->
<!--            else if(!password1.value) {-->
<!--                password1.focus();-->
<!--                document.getElementById("password1").innerHTML = "required";-->
<!--                output = false;-->
<!--            }-->
<!--            else if(!password2.value) {-->
<!--                password2.focus();-->
<!--                document.getElementById("password2").innerHTML = "required";-->
<!--                output = false;-->
<!--            }-->
<!--            if(password1.value != password2.value) {-->
<!--                password1.value="";-->
<!--                password2.value="";-->
<!--                password1.focus();-->
<!--                document.getElementById("password2").innerHTML = "not same";-->
<!--                output = false;-->
<!--            }-->
<!--            return output;-->
<!--        }-->
<!--    </script>-->
    <script src="verify.js"></script>
    <style>.error {color: #FF0001; }
        .alert { background: #000000;
            color: red;
        }

    </style>
</head>
<body>

<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <a href="member.php">Go Back</a>
                <h2>Change Password</h2>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require('forget-password-process.php');
                }
                ?>
                <br>
                <span class = "error">* Required field </span>
                <br><br>
                <form method="POST" action="forget-password.php" onsubmit="return checked();">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email<span class="error">* </span> </label>
                                <input class="input--style-4" type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">


                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Current-Password<span class="error">* </span></label>
                                <input class="input--style-4" type="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">New-Password<span class="error">* </span></label>
                                <input class="input--style-4" type="password" name="password1" value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Retype-Password<span class="error">* </span></label>
                                <input class="input--style-4" type="password" name="password2" value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="p-t-15">
                        <button class="btn btn--radius-2 btn--blue" style="width: 100%" type="submit">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/datepicker/moment.min.js"></script>
<script src="vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="js/global.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
