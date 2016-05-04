 <div id="content">
            <div class="container">

                

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <?php 
                                    $sqlCategoryOne="Select *  from category_one";
                                    $queryCategoryOne=$connection->query($sqlCategoryOne);
                                    while ($rowCategoryOne=$queryCategoryOne->fetch_object()) {

                                        ?>
                                        <li>
                                            <a href="?category1=<?php echo $rowCategoryOne->id;?>"><?php echo $rowCategoryOne->name;?> <span class="badge pull-right"></span></a>
                                            <ul>
                                                <?php 
                                                 $sqlCategoryTwo="Select *  from category_two where category_one=$rowCategoryOne->id ";
                                                    $queryCategoryTwo=$connection->query($sqlCategoryTwo);
                                                    while ($rowCategoryTwo=$queryCategoryTwo->fetch_object()) {
                                                        ?>
                                                        <li><a href="?category2=<?php echo $rowCategoryTwo->id;?>"><?php echo $rowCategoryTwo->name; ?></a>
                                                        </li>
                                                        <?php

                                                    }

                                                ?>
                                                
                                                 
                                            </ul>
                                        </li>

                                        <?php
                                    }

                                 ?>
                                


                              
                            </ul>

                        </div>
                    </div>

                  
                   
                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>
                
                <div class="col-md-9">
                
 <?php 

                        if(isset($_GET['category1'])){
                            $category1Id=$_GET['category1'];
                       
                             $sqlGoods="Select * from goods where category_one=$category1Id  ";
                         
                            }elseif(isset($_GET['category2'])){
                            $category2Id=$_GET['category2'];
                             $sqlGoods="Select * from goods where category_two=$category2Id  ";
                       
                             
                         
                            }
                           

                      

                            if(isset($sqlGoods)){
                                 include "goods_by_category.php";
                            }
                            if(isset($_GET['goods'])){
                                 include "show_good_by_id.php";
                            }
                      
                       
                    ?>
                </div>

                
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>