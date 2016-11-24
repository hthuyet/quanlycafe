<!DOCTYPE html>
<html>

    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- global level css -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" />
        <!-- end of global level css -->
        <!-- page level css -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/pages/login.css')); ?>" />
        <link href="<?php echo e(asset('assets/vendors/iCheck/css/square/blue.css')); ?>" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/ladda/ladda-themeless.min.css')); ?>">
        <!-- end of page level css -->

        <style type="text/css">
            #btnLogin{
                width: 86%;
                margin-top: 4px;
                padding: 10px 5px 10px 26px;
                border: 1px solid rgb(178, 178, 178);
                -webkit-appearance: textfield;
                box-sizing: content-box;
                border-radius: 3px;
                box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
                font-size: 18px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row vertical-offset-100">
                <!-- Notifications -->
                <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                    <div id="container_demo">
                        <a class="hiddenanchor" id="toregister"></a>
                        <a class="hiddenanchor" id="tologin"></a>
                        <a class="hiddenanchor" id="toforgot"></a>
                        <div id="wrapper">
                            <div id="login" class="animate form">
                                <form id="frmLogin" action="<?php echo e(route('signin')); ?>" autocomplete="on" method="post" role="form">
                                    <h3 class="black_bg">
                                        <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="josh logo">
                                        <br>Log in</h3>
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                    <div class="form-group has-error">
                                        <div class="col-sm-12">
                                            <center><span class="help-block" id="errorMessage"></span></center>
                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->first('email', 'has-error')); ?>">
                                        <label style="margin-bottom:0px;" for="email" class="uname control-label"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            E-mail
                                        </label>
                                        <input id="email" name="email" required type="text" placeholder="E-mail"
                                               value="<?php echo old('email'); ?>"/>
                                        <div class="col-sm-12">
                                            <?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->first('password', 'has-error')); ?>">
                                        <label style="margin-bottom:0px;" for="password" class="youpasswd"> <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Password
                                        </label>
                                        <input id="password" name="password" required type="password" placeholder="eg. X8df!90EO" />
                                        <div class="col-sm-12">
                                            <?php echo $errors->first('password', '<span class="help-block">:message</span>'); ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="remember-me" id="remember-me" value="remember-me"
                                                   class="square-blue"/>
                                            Keep me logged in
                                        </label>
                                    </div>
                                    <p class="login button">
                                        <button id="btnLogin" value="Login"  type="submit"
                                                class="btn btn-success ladda-button" data-style="expand-left">Login</button>
                                    </p>
                                    <p class="change_link">
                                        <a href="#toforgot">
                                            <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Forgot password</button>
                                        </a>
                                        <a href="#toregister">
                                            <button type="button" class="btn btn-responsive botton-alignment btn-success btn-sm" style="float:right;">Sign up</button>
                                        </a>
                                    </p>
                                </form>
                            </div>
                            <div id="register" class="animate form">
                                <form action="<?php echo e(route('signup')); ?>" autocomplete="on" method="post" role="form">
                                    <h3 class="black_bg">
                                        <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="josh logo">
                                        <br>Sign Up</h3>
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                                    <div class="form-group <?php echo e($errors->first('first_name', 'has-error')); ?>">
                                        <label style="margin-bottom:0px;" for="first_name" class="youmail">
                                            <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            First Name
                                        </label>
                                        <input id="first_name" name="first_name" required type="text" placeholder="John"
                                               value="<?php echo old('first_name'); ?>"/>
                                        <div class="col-sm-12">
                                            <?php echo $errors->first('first_name', '<span class="help-block">:message</span>'); ?>

                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->first('last_name', 'has-error')); ?>">
                                        <label style="margin-bottom:0px;" for="last_name" class="youmail">
                                            <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Last Name
                                        </label>
                                        <input id="last_name" name="last_name" required type="text" placeholder="Doe"
                                               value="<?php echo old('last_name'); ?>"/>
                                        <div class="col-sm-12">
                                            <?php echo $errors->first('last_name', '<span class="help-block">:message</span>'); ?>

                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->first('email', 'has-error')); ?>">
                                        <label style="margin-bottom:0px;" for="email" class="youmail">
                                            <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            E-mail
                                        </label>
                                        <input id="email" name="email" required type="email"
                                               placeholder="mysupermail@mail.com" value="<?php echo old('email'); ?>"/>
                                        <div class="col-sm-12">
                                            <?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->first('email_confirm', 'has-error')); ?>">
                                        <label style="margin-bottom:0px;" for="email" class="youmail">
                                            <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Confirm E-mail
                                        </label>
                                        <input id="email_confirm" name="email_confirm" required type="email"
                                               placeholder="mysupermail@mail.com" value="<?php echo old('email_confirm'); ?>"/>
                                        <div class="col-sm-12">
                                            <?php echo $errors->first('email_confirm', '<span class="help-block">:message</span>'); ?>

                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->first('password', 'has-error')); ?>">
                                        <label style="margin-bottom:0px;" for="password" class="youpasswd">
                                            <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Password
                                        </label>
                                        <input id="password" name="password" required type="password" placeholder="eg. X8df!90EO" />
                                        <div class="col-sm-12">
                                            <?php echo $errors->first('email_confirm', '<span class="help-block">:message</span>'); ?>

                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->first('password_confirm', 'has-error')); ?>">
                                        <label style="margin-bottom:0px;" for="passwor_confirm" class="youpasswd">
                                            <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Confirm Password
                                        </label>
                                        <input id="password_confirm" name="password_confirm" required type="password" placeholder="eg. X8df!90EO" />
                                        <div class="col-sm-12">
                                            <?php echo $errors->first('email_confirm', '<span class="help-block">:message</span>'); ?>

                                        </div>
                                    </div>
                                    <p class="signin button">
                                        <input type="submit" class="btn btn-success" value="Sign up" />
                                    </p>
                                    <p class="change_link">
                                        <a href="#tologin" class="to_register">
                                            <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Back</button>
                                        </a>
                                    </p>
                                </form>
                            </div>
                            <div id="forgot" class="animate form">
                                <form action="<?php echo e(route('forgot-password')); ?>" autocomplete="on" method="post" role="form">
                                    <h3 class="black_bg">
                                        <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="josh logo">Password</h3>
                                    <p>
                                        Enter your email address below and we'll send a special reset password link to your inbox.
                                    </p>

                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                                    <div class="form-group <?php echo e($errors->first('email', 'has-error')); ?>">
                                        <label style="margin-bottom:0px;" for="emailsignup1" class="youmai">
                                            <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Your email
                                        </label>
                                        <input id="email" name="email" required type="email" placeholder="your@mail.com"
                                               value="<?php echo old('email'); ?>"/>
                                        <div class="col-sm-12">
                                            <?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

                                        </div>
                                    </div>
                                    <p class="login button">
                                        <input type="submit" value="Submit" class="btn btn-success" />
                                    </p>
                                    <p class="change_link">
                                        <a href="#tologin" class="to_register">
                                            <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Back</button>
                                        </a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- global js -->
        <script src="<?php echo e(asset('assets/js/jquery-1.11.1.min.js')); ?>" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
        <!--livicons-->
        <script src="<?php echo e(asset('assets/js/raphael-min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/livicons-1.4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendors/iCheck/js/icheck.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/js/pages/login.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/plugins/ladda/spin.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/plugins/ladda/ladda.min.js')); ?>" type="text/javascript"></script>

        <script type="text/javascript">
            Ladda.bind('button[type=submit]');
            $("#email").focus();

            $(document).ready(function () {
                $('#frmLogin').on('submit', function (e) { //use on if jQuery 1.7+
                    e.preventDefault();  //prevent form from submitting
                    var url = $(this).attr('action');
                    var data = $("#frmLogin :input").serializeArray();

                    $.ajax({
                        method: "POST",
                        url: url,
                        data: data,
                        success: function (response) {
                            Ladda.stopAll();
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }else{
                                window.location.href = response.redirect;
                            }
                        }, error: function (response) {
                            Ladda.stopAll();
                            if (response.responseJSON) {
                                $("#errorMessage").html(response.responseJSON.errorMess);
                            }
                            $("#email").focus();
                        }
                    });

                });
            });
        </script>
        <!-- end of global js -->
    </body>
</html>