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
    <script src="verify.js"></script>
    <style>.error {color: #FF0001; }
        .alert { background: #000000;
            color: red;
        }

    </style>
</head>

<body>
<?php include 'header.php'; ?>

<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title">Registration Form</h2>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require('Error.php');
                }
                ?>
                <br>
                <span class = "error">* Required field </span>
                <br><br>
                <form method="POST" action="index.php" onsubmit="return checked();">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">first name<span class="error">* </span> </label>
                                <input class="input--style-4" type="text" name="first_name" value="<?php if(isset($_POST['first_name']))
                                {
                                    echo htmlentities($_POST['first_name']);
                                }?>">


                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">last name<span class="error">* </span></label>
                                <input class="input--style-4" type="text" name="last_name" value="<?php if(isset($_POST['last_name']))
                                {
                                    echo htmlentities($_POST['last_name']);
                                }?>">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
<!--                        <div class="col-2">-->
<!--                            <div class="input-group">-->
<!--                                <label class="label">Birthday<span class="error">* </span></label>-->
<!--                                <div class="input-group-icon">-->
<!--                                    <input class="input--style-4 js-datepicker" type="text" name="birthday" value="--><?php //if(isset($_POST['birthday']))
//                                    {
//                                        echo htmlentities($_POST['birthday']);
//                                    }?><!--">-->
<!--                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Gender<span class="error">* </span></label>
                                <div class="p-t-10">
                                    <label class="radio-container m-r-45">Male
                                        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">Female
                                        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email<span class="error">* </span></label>
                                <input class="input--style-4" type="email" name="email" value="<?php if(isset($_POST['email']))
                                {
                                    echo htmlentities($_POST['email']);
                                }?>">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Phone Number<span class="error">* </span></label>
                                <input class="input--style-4" type="text" name="phone" value="<?php if(isset($_POST['phone']))
                                {
                                    echo htmlentities($_POST['phone']);
                                }?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">Username <span style="color: red">*</span></label>
                            <input class="input--style-4" type="text" name="uname" value="<?php if(isset($_POST['uname']))
                            {
                                echo htmlentities($_POST['uname']);
                            }?>">
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Password <span style="color: red">*</span></label>
                                <input class="input--style-4" type="password" name="pwd" value="<?php if(isset($_POST['pwd']))
                                {
                                    echo htmlentities($_POST['pwd']);
                                }?>">
                                <span>Password must be at least 8 characters in length.</span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Re-enter Password <span style="color: red">*</span></label>
                                <input class="input--style-4" type="password" name="re-pwd" value="<?php if(isset($_POST['re-pwd']))
                                {
                                    echo htmlentities($_POST['re-pwd']);
                                }?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">Role<span class="error">* </span></label>
                            <div class="p-t-10">
<!--                                <select name="role" >-->
<!--                                    <option value=""></option>-->
<!--                                    <option value="1">Admin</option>-->
<!--                                    <option value="0">Member</option>-->
<!--                                </select>-->
                                <label class="radio-container m-r-45">Admin
                                    <input type="radio" name="role" <?php if (isset($role) && $role=="1") echo "checked";?> value="1">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Member
                                    <input type="radio" name="role" <?php if (isset($role) && $role=="2") echo "checked";?> value="2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="p-t-15">
                        <button class="btn btn--radius-2 btn--blue" style="width: 100%" type="submit">Sign Up</button>
                    </div>
                    <p> Already a member? <a href="login.php">Sign in</a> </p>
                </form>
            </div>
        </div>
    </div>
</div>




<?php include 'bottom.php'; ?>
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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
