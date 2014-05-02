<?php if (Session::has('errors')) { ?>
    <h5 style="color: red;">
        <?php echo $errors;
        ?>
    </h5>
<?php } ?>

<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 4/30/14
 * Time: 10:07 PM
 */

// workaround to get facebook logged out automatically
$email = Cache::get('email');
$name = Cache::get('name');
$facebook_id = Cache::get('facebook_id');
$hometown = Cache::get('hometown');
$highschool = Cache::get('highschool');
$grad_year = Cache::get('grad_year');
$fb_pic = Cache::get('fb_pic');

Cache::forget('email');
Cache::forget('name');
Cache::forget('facebook_id');
Cache::forget('hometown');
Cache::forget('highschool');
Cache::forget('grad_year');
Cache::forget('fb_pic');

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

    <form class="form-register" action="process" method="post">
        <h2 class="form-register-heading">Register Here</h2>
        Email:<input type="text" class="input-block-level" placeholder="Email address" name="email" <?php if(isset($email)){ echo "value='" . $email . "'" ;}; ?>>
        <br>
        Name:<input type="text" class="input-block-level" placeholder="Name" name="name" <?php if(isset($name)){echo "value='" . $name . "'";} ?> >
        <br>
        Student ID:<input type="text" class="input-block-level" placeholder="Student ID" name="student_id">
        <br>
        Phone Number:<input type="text" class="input-block-level" placeholder="Phone Number" name="phone_number">
        <br>
        Street Address:<input type="text" class="input-block-level" placeholder="Street Address" name="address" >
        <br>
        Highschool:<input type="text" class="input-block-level" placeholder="Highschool" name="highschool" <?php if(isset($highschool)){ echo "value='" . $highschool . "'" ;}; ?>>
        <br>
        Hometown:<input type="text" class="input-block-level" placeholder="Hometown" name="hometown" <?php if(isset($hometown)){echo "value='" . $hometown . "'";} ?> >
        <br>
        Grad Year:<input type="text" class="input-block-level" placeholder="Graduation Year" name="grad_year" <?php if(isset($grad_year)){echo "value='" . $grad_year . "'";} ?>>
        <br>
        <?php
            if(isset($fb_pic)) {
                echo "<input type='text' class='hidden' name='profile_picture' value ='".$fb_pic."'>";
            }
        ?>
        <?php
        if(isset($facebook_id)) {
            echo "<input type='text' class='hidden' name='facebook_id' value ='".$facebook_id."'>";
        }
        ?>

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