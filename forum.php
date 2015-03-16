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
<?php include"includes/login_form.php";?>
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

   

<div class="modal-body">
    <center>
        <a style="font-color:white"href="forum.php"><button type="button" class="btn btn-primary">New Discussion</button></a>
        <a style="font-color:white"href="recently_post.php"><button type="button" class="btn btn-primary">Recently Post</button></a>
        <a style="font-color:white"href="most_viewed.php"><button type="button" class="btn btn-primary">Most viewed</button></a>
        <a style="font-color:white"href="your_discussions.php"><button type="button" class="btn btn-primary">Your Discussions</button></a>
    </center>                
</div>

<div class="container">
    <div class="well" style="background-color:#2dcc70">
        <form action="" method="post" target="recently_post.php">
            <center>
            <h2 style="font:arial">New Discussion</h2>
            <table>
                <tr>
                    <td>Discussion Title : </td>
                    <td><input type="text" name="title" required="required"><td>
                </tr>
                <tr>
                    <td>Main Post : </td>
                    <td><textarea name="post" rows="10" cols="100" required="required"></textarea></td>
                <tr>
            </table>
            <button type="submit" class="btn btn-primary" style="background-color:#0000ff">Post</button>    
            </center>
        </form>
    </div>
</div>

<?php

    $title = $post = $current_date = $reply = "";

    $title = $_POST["title"];
    $post = $_POST["post"];
    $d=strtotime("+5 Hours +30 Minutes");
    $current_date =date("Y-m-d h:i:sa", $d);
   

    if($username=='')
    {
        echo '<script>
        alert("Please register before add discussions.");
        </script>';
    }
    else if($title!="")
    {   

        $link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
        mysql_select_db("slaas") or die("Database not found");
        $sql="INSERT INTO forum (user_name, title, post, p_date, reply )
        VALUES ('$username', '$title', '$post', '$current_date', '$reply' )";

        mysql_query($sql,$link);
      
        mysql_close($link);

        //echo $sql;

        /*
        echo "$username ";
        echo "$title ";
        echo "$post ";
        echo "$current_date ";
        echo "$reply ";
        */
        $title = $post = $current_date = $reply = "";
        echo '<script>
        alert("Your discussion is successfully posted.");
        </script>';
    }
    //$result = mysql_num_rows('SELECT * FROM forum');
    //$f_id = $result+1;

?>


<?php include"includes/footer.php"?> 
<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
