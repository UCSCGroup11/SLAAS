<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <title>Video Gallery | SLAAS</title>
    <meta name="description" content="">
    
    <script src="js/vendor/jquery-1.9.1.min.js"></script>
    <script src="js1/jquery.youtubevideogallery.js"></script>
    <link rel="stylesheet" href="css/youtube-video-gallery.css" type="text/css"/>
    <link rel="stylesheet" href="test/test.css" type="text/css"/>

    <!-- add colorbox -->
    <link rel="stylesheet" href="css/colorbox/example1/colorbox.css" />
    <script src="css/colorbox/jquery.colorbox.js"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

     <!--Le fav and touch icons--> 
    <link rel="shortcut icon" href="images/ico/logo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <!--[if lt IE 9]>
    <link href="../youtube-video-gallery-legacy-ie.css" type="text/css" rel="stylesheet"/>
    <![endif]-->
    
</head>

<body>
<?php include"includes/login_e.php";?>
<?php include"includes/header.php";?>

    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Video Gallery</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                        <li><a href="#">Digital Library</a> <span class="divider">/</span></li>
                        <li class="active">Video Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!---->
     
         
<section>  
    <div class="container">
        <div class="row-fluid">          
            <!--<div id="test"></div>-->
                <ul class="youtube-videogallery">
            	<?php
            		$link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
            		mysql_select_db("slaas") or die("Database not found");
            		$video=mysql_query("select * from video ");
            		while($row=mysql_fetch_array($video)){
            			$link=$row["link"];
            			$des=$row["des"];
            			echo"<li><a href='$link'>".$des."</a></li>";
            			
            			}
            			?>
                </ul>
            
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
       $("ul.youtube-videogallery").youtubeVideoGallery( {plugin:'colorbox',assetFolder:'css/colorbox'} );

        /* $("ul.youtube-videogallery").youtubeVideoGallery( {apiFallbackUrl: 'https://www.youtube.com/watch?v=0Tm5zRuET8Q', apiUrl: 'https://gdata.youtube.com/feeds/api/channels?q=Demo&start-index=11&max-results=10&v=2'} );*/
    });
</script>

<?php include"includes/footer.php";?>  

<?php include"includes/login_form.php";?>

<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
