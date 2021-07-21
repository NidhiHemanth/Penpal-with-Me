<?php 
    session_start();

    if(isset($_SESSION['logged_in'])) {
        header('Location: http://localhost/PHPfiles/PenPals/dashboard.php');
        exit;
    }
?>
<!DOCTYPE html>
<head>
    <title>Login / Sign Up</title>
    <link rel="icon" href="./assets/icon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style/login.css">
</head>
<body>
    <h1 id="logo">Pen-Pals</h1>
    <h3 id="slogan"> ~ Make new friends ~ </h3>

    <div class="container-own" id="container-own">
        <div class="form-container sign-up-container">
    
            <form method="POST" action="./php/signup.php">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                </div>
                <span>or use your email for registration</span>
                
                <div id="error_message"></div>
                <input type="text" placeholder="Name" name="name" id="name" required/>
                <input type="email" placeholder="Email" name="email1" id="email" required/>
                <input type="password" placeholder="Password" name="pw1" id="password" required/>
                <button type="submit" onclick="return signup_validation()">Sign Up</button>
            </form>
    
        </div>
    
        <div class="form-container sign-in-container">
            
            <form method="POST" action="./php/login.php" id="form1">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                </div>
                
                <span>or use your account</span>

                <div id="error_message_login"></div>
                <input type="text" placeholder="Email" name="email2" id="email2" required/>
                <input type="password" placeholder="Password" name="pw2" id="pw2" required/>
                <div class="inline-fields">
                    <input type="checkbox" name="remember" id="rem">
                    <label>Remember Me</label>
                </div>
                <a href="#forgotPWmodal" data-toggle="modal" data-target="#forgotPWmodal" id="forgot">Forgot your password?</a>
                <button type="submit" onclick="return login_validation()">Sign In</button>
            </form>
            
        </div>
    
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="text-align: center;">
        <span id="agreement" style="cursor:pointer"> Read user agreement</span>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">User Agreement</h4>
                    </div>
                    <div class="modal-dialog modal-dialog-scrollable">
                       <div class="info">
                        When you use our Services you agree to all of these terms. 
                        <br> Your use of our Services is also subject to our 
                        <b>Cookie Policy</b>  and our <b>Privacy Policy</b>, 
                        which covers how we collect, use, share, and 
                        store your personal information.
                        <br> We may modify this Contract, our Privacy Policy and 
                        <br> our Cookies Policy
                        from time to time. If we make material changes to it, 
                        we will provide you notice through our Services, or by other means, 
                        to provide you the opportunity to review the changes
                        before they become effective. 
                        We agree that changes cannot be retroactive. 
                        <br> If you object to any changes, you may <b>close your account</b> .
                        Your continued use of our Services after we publish or send a notice 
                        about our changes to these terms means that you are <b>consenting</b>
                        to the updated terms as of their effective date.
                       </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>    
    </div>      
    
    <div class="modal fade" id="forgotPWmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Reset your password</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="./php/update.php">
                        <div id="error_message_reset"></div>
                        <input type="text" placeholder="Name" name="name3" id="name3" required/>
                        <input type="email" placeholder="Email" name="email3" id="email3" required/>
                        <input type="password" placeholder="New Password" name="pw3" id="pw3" required/>
                        <input type="password" placeholder="Confirm Password" name="pw4" id="pw4" required/>
                        <button type="submit" class="btn btn-primary" id="addConfirm" style="outline:none">Confirm</button>
                        <!-- <button type="submit" class="btn btn-primary" id="addConfirm" onclick="return reset_validation()" style="outline:none">Confirm</button> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="outline:none">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./script/login.js"></script>
</body>
</html>