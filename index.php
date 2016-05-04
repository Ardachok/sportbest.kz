<?php 
session_start();
include "init/db.php";
include "controller/user.php";




?>

<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">
    <script type="text/javascript" src="jquery-1.11.3.min.js" ></script>
    <script type="text/javascript">
    function searchh(){

  $("#message").html("#input").val();
  show()


}


function show(){

      $.post("controller/ajax_controller.php",
        {
          act:"findLogin",
          login:$("#login").val(),
          password:$("#password").val(),         
        },
      function(data){
        if(data=="1"){
           $("#login_form").submit();
        }else{
          $("#message").html(" <div class='alert alert-danger pager' role='alert' > login is incorrect</div>");
          // $("#message").html(data);

        }

    

       
        

      });

    }
    </script>
    <title>
        Obaju : e-commerce template
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
       <?php 
       if(isset($_SESSION['user_id']) && ($USER_DATA!=NULL)){
            include "pages/login/header.php";
       }else{
        include "pages/notlogin/header.php";
       }


       
       
       ?>
 </div>
        
     

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                    <img src="img/logo.png" alt="Obaju logo" class="hidden-xs">
                    <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="basket.html">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index.php
                        ">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Men <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">


                                                <?php 
                                                    $sqlCategory1="Select * from `category_one`";
                                                    $queryCategory1=$connection->query($sqlCategory1);
                                                    while($rowCatogory1=$queryCategory1->fetch_object()){
                                                            ?>
                                                            <h5><a href="?category1=<?php echo $rowCatogory1->id; ?>"><?php echo $rowCatogory1->name; ?> </a></h5>
                                                            <?php 
                                                            $sqlCategory2="Select * from `category_two` where category_one='$rowCatogory1->id'";
                                                            $queryCategory2=$connection->query($sqlCategory2);
                                                                while($rowCatogory2=$queryCategory2->fetch_object()){

                                                                        ?>
                                                                     
                                                                        
                                                                                <form action="controller/add.php"   >

                                                                               
                                                                                <ul>
                                                                                    <li><a href="?category2=<?php echo $rowCatogory2->id; ?>"><?php echo $rowCatogory2->name; ?> </a></li>
                                                                                   
                                                                                </ul>

                                                                                 </form>
                                                                                <?php
                                                                               


                                                                             
                                                                         
                                                                }

                                                    }


                                                ?>

                                            </div>
                                         
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                  
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->



    <div id="all">

        <div id="content">
            

            <?php 
            if(isset($_GET['page'])){
                if($_GET['page']=='regist'){
                     include "pages/notlogin/regist.php";
                }
            }elseif(isset($_GET['category1'])){
                    $category1Id=$_GET['category1'];
               
                     include "pages/detail.php";
                 
            }elseif(isset($_GET['category2'])){
                    $category1Id=$_GET['category2'];
               
                     include "pages/detail.php";
                 
            }elseif(isset($_GET['goods'])){
                    $goodId=$_GET['goods'];
               
                     include "pages/detail.php";
                 
            }else{

                    include "pages/slider.php";
                    include "pages/goods.php";
                    include "pages/blog.php";

            }
            
            include "pages/end_of_page.php";
            ?>



        </div>
        <!-- /#content -->

        <!-- *** FOOTER ***
 _________________________________________________________ -->

 
        
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
       
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>


</body>

</html>