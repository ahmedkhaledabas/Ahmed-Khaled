<?php
$tittle = 'login';
include_once('LayOut/header.php');
include_once('LayOut/nav.php');


?>

<div class="login-register-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="App/Http/Post/login.php" method="post">
                                    <input type="email" name="user_email" placeholder="Email">
                                        <input type="password" name="user-password" placeholder="Password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span>Login</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('LayOut/footer.php');
include_once('LayOut/footerEnd.php');

?>