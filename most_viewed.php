<!DOCTYPE html>
<html class="no-js"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Forum | SLAAS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/ico/logo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
<?php include"includes/login_e.php";?>
<?php include"includes/header.php"; ?>

    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Forum</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                        <li class="active">Forum</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->         
<?php include"includes/login_form.php";?>s
   

<div class="modal-body">
    <center>
        <a style="font-color:white"href="forum.php"><button type="button" class="btn btn-primary">New Discussion</button></a>
        <a style="font-color:white"href="recently_post.php"><button type="button" class="btn btn-primary">Recently Post</button></a>
        <a style="font-color:white"href="most_viewed.php"><button type="button" class="btn btn-primary">Most viewed</button></a>
        <a style="font-color:white"href="your_discussions.php"><button type="button" class="btn btn-primary">Your Discussions</button></a>
    </center>                
</div>

<?php include"includes/footer.php"?> 

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
