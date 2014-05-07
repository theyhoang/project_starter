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
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Admin Home</title>
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
                    <li><a href="admin_logout">Logout</a></li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</head>
<body>

<table class="table-bordered">
    <thead>
    <tr>
        <th>Picture</th>
        <th>Name</th>
        <th>Grad Year</th>
        <th>Phone Number</th>
        <th>Status</th>
        <th>Update/Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(Session::has('user')) {
        $user = Session::get('user');


    echo "<form class='form-register' action='update_recruit' method='post'>";
    echo "<input name='id' type='Integer' class='hidden' value='$user->id'></input>";
    echo "<tr>";
    echo "<td><img src='$user->profile_picture'></td>";
    echo "<td style='text-align:center'>".$user->name."</td>";
    echo "<td style='text-align:center'>".$user->grad_year."</td>";
    echo "<td style='text-align:center'>".$user->phone_number."</td>";


    echo "<td style='text-align:center'><select name='status'>";
    $statuses = Status::all();
    foreach ($statuses as $status) :{
        if($status->status_id == $user->status_id) {
            echo "<option value='$status->status_id' selected>$status->status</option>";
        }
        else {
            echo "<option value='$status->status_id'>$status->status</option>";
        }
    } endforeach;

   //<option></select>".$status_name ."</td>";
    echo "<td style='text-align:center'> <button class='btn btn-large btn-success' type='submit'>Update</button></td>";
    echo "</tr></form>";
    }
    ?>



    </tbody>
</table>



</body>
</html>

