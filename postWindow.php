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

    <style type="text/css">
    .bs-example{
        margin: 20px;
    }
    a#forum{
        padding: 2px;               
    }
    </style>

<script src="js/jquery.min.js"></script>
<script>  
    $(document).ready(function(){
            $(replyForm.reply).hide();
    });

    function reply(id){
        $(document).ready(function(){
            $(id).toggle();
        });
    }
</script>
</head>

<body>
<div class="col-md-2"></div>
<div class="col-md-8">
<?php
    $link1 = mysql_connect("localhost", "root", "");
    mysql_select_db("slaas", $link1);

    $result = mysql_query("SELECT * FROM forum ORDER BY p_date DESC", $link1);
    /*$num_rows = mysql_num_rows($result);
    echo "$num_rows Rows\n";*/

    //$rows = array();
    echo "<div class='col-md-3'></div>";
    echo"<div class='container col-md-6'><table >";
    $num=0;
    while($rows=mysql_fetch_array($result)) {
        $num++;
        $reply="reply"."$num";
        $reply_form="reply_form"."$num";
        $sql1 = mysql_query("select photo from user where user_name='$rows[user_name]' ");
        $photo = mysql_fetch_array($sql1);

        echo "<script>
                 $(document).ready(function(){
                    $('div.reply_form').hide();
                });
            </script>";
       
        echo"<div class='bs-example'>
            <div class='media'>
                <a href='#' class='pull-left'>
                    <img src='$photo[photo]' class='media-object img-rounded' alt='Sample Image' height='50px' width='50px'>
                </a>
                <div class='media-body'>
                    <h4 class='media-heading'>$rows[user_name] <small><i>Posted on $rows[p_date]</i></small></h4>
                    <h5 class='media-heading'>Title : $rows[title]</h5>
                    <p>$rows[post]</p>
                </div>
                <div class='media-footer'>
                    <button id='$reply' class='btn btn-success' onclick='reply($reply_form)'>Reply</button>                                        
                </div>";
                
                $reply = $_POST["reply"];
                $d = strtotime("+5 Hours +30 Minutes");
                $current_date = date("Y-m-d h:i:sa", $d);
                $sql2 = mysql_query("insert into reply(f_id,p_date,r_date,reply)
                            values($rows[f_id],$rows[p_date],$current_date,$reply)");
                echo "$current_date"." ";
                echo "$reply"." ";
                echo "$rows[f_id]"." ";
                echo "$rows[p_date]"."<br>";
                echo "$sql2";


            echo"<div id='$reply_form' class='reply_form container'>
                    <form action='' name='replyForm' method='post'>
                        <table>                            
                            <tr>
                                <td>Write your reply</td>
                            </tr>
                            <tr>
                                <td><textarea name='reply' rows='5' cols='100'></textarea></td>
                            </tr>
                        </table>
                        <button type='submit' class='btn btn-primary'>Post</button>    
                    </form>
                </div>
               
                </div>
                <hr />
                
                </div>";


        
       /* echo "<tr>";
        echo "<td><b>Posted by : </b>$rows[user_name]</td>";
        echo "<td><b>Date of posted : </b>$rows[p_date]</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><b>$rows[title]</b></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$rows[post]</td>";
        echo "</tr>";
        echo "<tr><td colspan='2'><br><hr></td></tr>";*/

    }
    

?>
</div>
<div class="col-md-2"></div>
 
<script src="js/jquery.min.js"></script>
<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
