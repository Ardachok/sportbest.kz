  <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Hot this week</h2>
                        </div>
                    </div>
                </div>

               


                <div class="container">
                    <div class="row">
                        <?php 

                            $sqlGoods="Select * from goods ";
                            $queryGoods=$connection->query($sqlGoods);
                           
                            while ($rowGoods=$queryGoods->fetch_object()) {
                            ?>         <div class="col-md-4">
                            <div class="item"> <div class="product">     <div
                            class="flip-container">         <div
                            class="flipper">

                                        <div class="front">

                                            <a href="?goods=<?php echo $rowGoods->id; ?>">
                                                <img src="<?php echo $rowGoods->image_url_big; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="?goods=<?php echo $rowGoods->id; ?>">
                                                <img src="<?php echo $rowGoods->image_url_small; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="?goods=<?php echo $rowGoods->id; ?>" class="invisible">
                                    <img src="<?php echo $rowGoods->image_url_small; ?>" alt="" class="img-responsive">
                                </a>
                                <div>

                                </div>
                                <div class="text">
                                    <h3><a href="?goods=<?php echo $rowGoods->id; ?>"><?php echo $rowGoods->name; ?></a></h3>
                                    <p class="price">$<?php echo $rowGoods->price; ?></p>
                                    <p class="price"><button href="#" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $rowGoods->id;?>">Quick shop</button> </p>

                                </div>
                                <div class="text">
                                    <!-- -->

                                    

                                            <div class="modal fade" id="<?php echo $rowGoods->id;?>" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                                                 <div class="modal-dialog modal-sm">

                                                        <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title" id="Login"><?php echo $rowGoods->name;?></h4>
                                                                </div>
                     

                                                                <div class="modal-body">
                                                                    <?php 
                                                                        if(isset($_SESSION['user_id'])){


                                                                            ?>
                                                                            <form action="controller/shop.php" method="post" id="login_form">
                                                                        <div class="form-group">
                                                                            <input type="hidden" value="<?php echo $rowGoods->id;?>" name="good_id">
                                                                            <input type="hidden" value="good" name="new">
                                                                            <input type="text" class="form-control" name="number"  placeholder="Please enter your phone number" name="telNumber" value="<?php echo $USER_DATA->phones_number;?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="address" placeholder="Please enter your  address" name="address" value="<?php echo $USER_DATA->address;?>">
                                                                        </div>

                                                                        <p class="text-center">
                                                                            <input type="submit"  value="Shop"  >
                                                                            
                                                                        </p>

                                                                             </form>

                                                                            <?php
                                                                        }else{


                                                                            ?>
                                                                            <form action="controller/shop.php" method="post" id="login_form">
                                                                        <div class="form-group">
                                                                            <input type="hidden" value="<?php echo $rowGoods->id;?>" name="good_id">
                                                                            <input type="hidden" value="good" name="new">
                                                                            <input type="text" class="form-control"  placeholder="Please enter your phone number" name="telNumber" >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"  placeholder="Please enter your  address" name="address">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"  placeholder="Please enter your  Name" name="name">
                                                                        </div>

                                                                        <p class="text-center">
                                                                            <input type="submit"  value="Shop"  >
                                                                            
                                                                        </p>
                                                                                  <p class="text-center text-muted">Not registered yet?</p>
                                                                    <p class="text-center text-muted"><a href="?page=regist"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>


                                                                             </form>

                                                                            <?php

                                                                        }

                                                                    ?>

                                                          
                                                                </div>
                                                        </div>
                                                </div>
                                            </div>

                                 </div>



                                
                                <!-- /.text -->

                            </div>
                            <!-- /.product -->
                        </div>

                                    </div>

                                    <?php
                                
                                # code...
                            }
                        ?>
                    </div>
                </div>
                <!-- /.container -->

           