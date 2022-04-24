
<?php  

$title = "Signin";
include_once "layouts/header.php";
include_once "App/Http/Middlewares/guest.php";
include_once "layouts/navbar.php";

?>

<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> <?= $title ?> </h4>
                        </a>
                       
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <?= getError('something') ?>
                                <div class="login-register-form">
                                    <form action="App/Http/Post/signin.php" method="post">
                                        <input class="mb-8" type="email" name="email" placeholder="Email Address" value="<?= old('email') ?>">
                                        <?= getError('email') ?> 
                                        <input type="password" name="password" placeholder="Password">
                                        <?= getError('password') ?> 
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" name="remember_me" value="remember" id="remember_me">
                                                <label for="remember_me">Remember me</label>
                                                <a href="verify-email.php">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span><?=$title?></span></button>
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
include_once "layouts/footer.php";
include_once "layouts/footer-scripts.php";
?>

