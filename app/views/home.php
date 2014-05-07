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

<table class="table-bordered" style="margin: auto">
    <thead>
        <tr>
            <th>Picture</th>
            <th>Name</th>
            <th>Grad Year</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user) :{

            echo "<tr>";
            echo "<td><img src='$user->profile_picture'></td>";
            echo "<td style='text-align:center'>".$user->name."</td>";
            echo "<td style='text-align:center'>".$user->grad_year."</td>";
            echo "<td style='text-align:center'>".$user->phone_number."</td>";

            $statuses = Status::all();
            foreach ($statuses as $status) :{
                if($status->status_id == $user->status_id) {
                    $status_name = $status->status;
                }
            } endforeach;

            echo "<td style='text-align:center'>".$status_name ."</td>";
            echo "<td style='text-align:center'><a href='view_recruit/$user->id/'>View Profile</a></td>";
            echo "</tr>";
        } endforeach ?>



    </tbody>
</table>



</body>
</html>

