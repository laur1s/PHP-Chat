<?php
session_start();
require_once 'database.php';

$query = "SELECT * FROM messages ORDER BY id DESC";
$shouts = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Web Chat</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
</head>
<body>

<!-- Navigation Bar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Chat</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Web Chat</a></li>
                <li><a href="#">Second Link</a></li>
                <li><a href="#">Third Link</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span
                            class="glyphicon glyphicon-user"></span>&nbsp;Logged in: <?php echo $_SESSION["user"]; ?>
                        &nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span
                                    class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">Chaty</h1>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                <?php while ($row = mysqli_fetch_assoc($shouts)) : ?>
                    <li class="list-group-item"><span><?php echo $row['time'] ?>
                            - </span><strong><?php echo $row['user'] ?>:</strong> <?php echo $row['message'] ?> </li>
                <?php endwhile; ?>
            </ul>

            <div id="input">
                <?php if (isset($_GET['error'])) : ?>
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="process.php">
                    <div class="input-group">
                        <input class="form-control" id="focusedInput" type="text" name="user"
                               placeholder="Enter Your Name" value="<?php echo $_SESSION["user"]; ?>"/>
                    </div>

                    <div class="input-group">
                        <input class="form-control input-lg" id="focusedInput" type="text" name="message"
                               placeholder="Enter A Message"/>
                    </div>
                    <br>
                    <div class="col-md-2">
                        <input class="btn-success btn-default" type="submit" name="submit" value="Send message"/>
                    </div>
                </form>
            </div>
        </div>


    </div>


</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
>
</body>
</html>
