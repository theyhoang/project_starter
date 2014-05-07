<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 5/6/14
 * Time: 6:11 PM
 */
?>

<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Set Event</title>
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
        <th>Event ID</th>
        <th>Event</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach($events as $event) {
            echo "<tr><td>$event->event_id</td><td>$event->event</td></tr>";
        }
    ?>
    </tbody>
</table>
<form class="form-register" action="cache_event" method="post">
<select name="event_id">
    <?php
    $event_id = Cache::get('event_id');

    foreach($events as $event) {
        if(isset($event_id) && $event_id == $event->event_id) {
            echo "<option value='$event->event_id' selected>$event->event</option>";
        }
        else {
            echo "<option value='$event->event_id'>$event->event</option>";
        }

    }
    ?>
</select>
    <button class='btn btn-success' type='submit'>Set Event</button>
</form>


    <h2>Create Event</h2>

    <form class='form-register' action='register_event' method='post'>
        <input name='event' type='text' placeholder="event name"/>
        <button class='btn btn-success' type='submit'>Register Event</button>
    </form>


</body>
</html>