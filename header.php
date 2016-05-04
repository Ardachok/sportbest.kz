 <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                 </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="?page=regist">Register</a>
                    </li>
                    <li><a href="contact.html">Contact</a>
                    </li>
                    <li><a href="#">Recently viewed</a>
                    </li>
                </ul>
            </div>
        </div>
           <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    
                    <div id="message">
                    </div>

                    <div class="modal-body">
                        <form action="controller/check.php" method="post" id="login_form">
                            <div class="form-group">
                                <input type="text" class="form-control" id="login" placeholder="login" name="login">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" placeholder="password" name="password">
                            </div>

                            <p class="text-center">
                                <input type="button"  value="submit" onclick="searchh()" >
                                
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="?page=regist"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>