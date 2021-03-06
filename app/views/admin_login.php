
<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 4/30/14
 * Time: 9:41 PM
 */

if (Session::has('success')) { ?>
    <h1 style="color: green;">
        <?php echo Session::get('success') ?>
    </h1>
<?php }

if (Session::has('error')) { ?>
    <h1 style="color: red;">
        <?php echo Session::get('error') ?>
    </h1>
<?php }
?>

<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Home</title>

    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
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
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            width: 100%;
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }

    </style>
</head>
<body>

<div class="container">

    <form class="form-signin" action="admin_authenticate" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="username" name="username">
        <input type="password" class="input-block-level" placeholder="password" name="password">

        <p>Not an admin? Login <a href="/login">Here</a>.</p>

        <button class="btn btn-large btn-primary" type="submit">Sign in</button>

        <div>

        </div>
    </form>

</div> <!-- /container -->

</body>
</html>

