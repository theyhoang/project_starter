<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 4/30/14
 * Time: 10:07 PM
 */

?>

<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Register</title>

    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-register {
            max-width: 500px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
        }
        .form-register .form-signin-register,
        .form-register .checkbox {
            margin-bottom: 10px;
        }
        .form-register input[type="text"],
        .form-register input[type="password"] {
            font-size: 16px;
            width: 100%;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }

    </style>
</head>
<body>

<div class="container">

    <form class="form-register">
        <h2 class="form-register-heading">Register Here</h2>
        <input type="text" class="input-block-level" placeholder="Email address" name="email" >
        <br>
        <input type="password" class="input-block-level" placeholder="password" name="password">
        <br>
        <input type="password" class="input-block-level" placeholder="confirm password" name="confirm_password">
        <br>
        <input type="text" class="input-block-level" placeholder="Name" name="name">
        <br>
        <input type="text" class="input-block-level" placeholder="Student ID" name="student_id">
        <br>
        <input type="text" class="input-block-level" placeholder="Phone Number" name="phone_number">
        <br>
        <input type="text" class="input-block-level" placeholder="Street Address" name="address" >
        <br>
        <input type="text" class="input-block-level" placeholder="Graduation Year" name="grad_year">

        <p>Have a Facebook? Login <a href="/fb_login">Here</a>.</p>
        <br>
        <p>Already have an account? Login <a href="login">Here</a></p>

        <button class="btn btn-large btn-primary" type="submit">Register</button>

        <div>

        </div>
    </form>

</div> <!-- /container -->

</body>
</html>