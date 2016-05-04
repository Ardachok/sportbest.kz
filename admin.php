<?php 
session_start();
include "init/db.php";
include "controller/user.php";
  
	if(isset($_SESSION['user_id'])){
         
        if($_SESSION['user_id']=="1"){
             


       

	?>
	<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

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
          <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                 </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="controller/logout.php" >Logout</a>
                    </li>
                    <li><a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
       
      

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
         <div class="container">
            <div class="row">
                <div class="col-md-2"><h1><a href="?all=0">All goods</a></h1></div>
                <div class="col-md-2"><h1><a href="?New=0">New goods</a></h1></div>
                <div class="col-md-2"><h1><a href="?Shop=0">Shop</a></h1></div>
            </div>
         </div>
       
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">
               
                <div class="row">
                    <?php 
                    
                            if(isset($_GET['good'])){
                                $goodId=$_GET['good'];

                                 $sqlGoods="Select * from goods  where id='$goodId'";
                            $queryGoods=$connection->query($sqlGoods);
                           
                            while ($rowGoods=$queryGoods->fetch_object()) {
                                    ?>
                                    <div class="col-md-5 centr">
                                    <form action="controller/add.php" method="POST" >
                                        <input type="hidden" name="new" value="update">
                                        <input type="hidden" name="id" value="<?php echo $goodId; ?>">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image 1</label><br>
                                            <img src="<?php echo $rowGoods->image_url_big ;?>" weight=42  height=42 >
                                            <input type="text" class="form-control" name="image1" value="<?php echo $rowGoods->image_url_big ;?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image 2</label><br>
                                            <img src="<?php echo $rowGoods->image_url_small ;?>" weight=42  height=42>
                                            <p><input type="text" class="form-control"name="image2"  value="<?php echo $rowGoods->image_url_small ;?>">
                                        </p>
                                            </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nmae</label><br>
                                           <input type="text" class="form-contro" name="name" value="<?php echo $rowGoods->name ;?>"> 
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Price</label><br>
                                            <input type="text"class="form-contro" name="price"  value="<?php echo $rowGoods->price ;?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Size</label><br>
                                            <input type="text"class="form-contro" name="size"   value="<?php echo $rowGoods->size ;?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Weight</label><br>
                                            <input type="text" class="form-contro" name="weight"  value="<?php echo $rowGoods->weight ;?>">
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1">Descrition</label><br>
                                            <input type="text" class="form-contro" name="description"  value="<?php echo $rowGoods->description ;?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category one</label><br>
                                            <input type="text"class="form-contro"  name="category_one" value="<?php echo $rowGoods->category_one ;?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category two</label><br>
                                            <input type="text"class="form-contro" name="category_two" value="<?php echo $rowGoods->category_two ;?>">
                                        </div>
                                        
                                        
                                        <input type="submit">
                                        <br><br><br><br>
                                        
                                        
                                        
                                    </form>
                                    </div>
                                    <?php
}

                            }elseif(isset($_GET['all'])){
                                $sqlGoods="Select * from goods ";
                            $queryGoods=$connection->query($sqlGoods);
                           
                            while ($rowGoods=$queryGoods->fetch_object()) {
                                    ?>
                                    <div class="col-md-3">
                                    
                                        <div class="form-group">
                                           
                                            <img src="<?php echo $rowGoods->image_url_big ;?>" weight=42  height=42 >
                                          
                                            <h4> <a href="?good=<?php echo $rowGoods->id ;?>"><?php echo $rowGoods->name ;?></a></h4>
                                        </div>

                                     

                                       </div>

                            <?php 
                        }


                            }elseif (isset($_GET['New'])) {

                                ?>
                                 <div class="col-md-5 centr">
                                    <form action="controller/add.php" method="post" >
                                        <input type="hidden" name="new" value="good">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image 1</label><br>
                                            
                                            <input type="tetx" name="image1" class="form-control" id="exampleInputEmail1" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image 2</label><br>
                                            <p><input type="text" name="image2" class="form-control" >
                                        </p>
                                            </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nmae</label><br>
                                           <input type="text" class="form-contro" name="name" > 
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Price</label><br>
                                            <input type="text"class="form-contro" name="price" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Size</label><br>
                                            <input type="text"class="form-contro" name="size"  >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Weight</label><br>
                                            <input type="text" class="form-contro" name="weight" >
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1">Descrition</label><br>
                                            <input type="text" class="form-contro" name="description">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category one</label><br>
                                            <select name="category_one">
                                                  
                                                <?php

                                                $sqlCO="Select *  from category_one";
                                                $queryCO=$connection->query($sqlCO);
                                                    while ($rowCO=$queryCO->fetch_object()) {
                                                       
                                                        ?>

                                                        <option value="<?php echo $rowCO->id ;?>"><?php echo $rowCO->name ;?></option>
                                                        <?php
                                                       }
                                                 ?>
                                                        <option value="0"><?php echo "New.." ;?></option>
                                            </select>
                                            <input type="text" class="form-contro" name="category_oneNew">
                                          
                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category two</label><br>

                                            <select name="category_two">
                                                <?php

                                                $sqlCO="Select *  from category_two ";
                                                $queryCO=$connection->query($sqlCO);
                                                    while ($rowCO=$queryCO->fetch_object()) {
                                                       
                                                        ?>
                                                        <option value="<?php echo $rowCO->id ;?>"><?php echo $rowCO->name ;?></option>
                                                        <?php
                                                       }
                                                 ?>
                                                <option value="0"><?php echo "New.." ;?></option>
                                            </select>
                                            <input type="text" class="form-contro" name="category_twoNew">
                                        </div>
                                        
                                        
                                        <input type="submit" class=" btn btn-default">
                                        <br><br><br><br>
                                        
                                        
                                        
                                    </form>
                                    </div>

                                <?php


                            }elseif (isset($_GET['Shop'])) {

                                  $sqlShop="Select * from shop where sold='no' order by shop_dated" ;
                            $queryShop=$connection->query($sqlShop);
                            while ($row=$queryShop->fetch_object()) {
                                  $sqlGoods="Select * from goods where id=$row->id ";

 
                            $queryGoods=$connection->query($sqlGoods);
                           
                            while ($rowGoods=$queryGoods->fetch_object()) {
                                    ?>
                                    <div class="col-md-8">
                                        <form action="controller/shop.php" method="POST">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $row->id;?>">
                                           
                                            <img src="<?php echo $rowGoods->image_url_big ;?>" weight=42  height=42 >
                                          
                                            <h4> <a href="?good=<?php echo $rowGoods->id ;?>"><?php echo $rowGoods->name ;?></a></h4>
                                            <h4>  <?php echo $row->shop_dated ;?></h4>
                                             <h4>  <?php echo $row->name ;?></h4>
                                             <h4>  <?php echo $row->number ;?></h4>
                                             <h6>Call is </h6>
                                              <h4>  <?php echo $row->call ;?>, change to</h4>

                                             <select name="call">
                                                <option>No</option>
                                                <option>Yes</option>
                                             </select>
                                              <h6>Sale is </h6> 
                                              <h4>  <?php echo $row->sold ;?>, change to</h4>
                                             <select name="sold">Sale
                                                <option>No</option>
                                                <option>Yes</option>
                                             </select>

                                        </div>

                                        <input type="submit" value="Go">
                                        </form>
                                        

                                     

                                       </div>

                            <?php 
    }
}


                                ?>
                                <?php

}

                    ?>
                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2015 Your name goes here.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Template by <a href="?">Bootstrap Ecommerce Templates</a> with support from <a href="http://kakusei.cz">Designové předměty</a> 
                        <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
                    </p>
                </div>
            </div>
        </div>
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


	<?php
  }

    }




?>