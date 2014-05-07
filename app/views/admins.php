<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 5/6/14
 * Time: 12:06 PM
 */
?>

<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Admins</title>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">RecruitBase</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="admin_home">Home</a></li>
                    <li><a href="set_event">Set Event</a></li>
                    <li><a href="admins">Admins</a></li>
                    <li><a href="admin_logout">Logout</a></li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</head>
<body>

<table class="table-bordered" style="margin: auto">
    <caption>Admins</caption>
    <thead>
    <tr>
        <th>Username</th>
        <th>Delete?</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($admins as $admin) :{
        echo "<tr>";
        echo "<td style='text-align:center'>".$admin->username."</td>";
        echo "<td style='text-align:center'>"."<a href='delete_admin/$admin->username'>Delete</a>"."</td>";

        echo "</tr>";
    } endforeach ?>



    </tbody>
</table>

<div style="margin:auto">
    <h2>Create Admin User</h2>

    <form class='form-register' action='register_admin' method='post' >
        <input name='username' type='text' placeholder="username"/>
        <input name='password' type="password" placeholder="password"/>
        <button class='btn btn-success' type='submit'>Register Admin</button>
    </form>
</div>



</body>
</html>

