<?php
$tittle = 'signup';
include_once('LayOut/header.php');
include_once('LayOut/nav.php');
include_once 'App/Helpers/Functions.php';


?>

<div class="login-register-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                <?= getError('something'); ?>
                                    <?= getError('mail'); ?>
                                    <form action="App/Http/Post/signup.php" method="post">
                                        <input type="text" name="first_name" placeholder="first Name" value="<?= old('first_name');?>">
                                        <?= getError('first_name'); ?>
                                            
                                        <input type="text" name="last_name" placeholder="Last Name"value="<?= old('last_name');?>">
                                        <?= getError('last_name'); ?>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="m" <?php if($_POST){ $_POST['gender']=='m'? 'selected':"" ;} ?> >Male</option>
                                            <option value="f" <?php if($_POST){ $_POST['gender']=='f'? 'selected':"" ;} ?> >Female</option>
                                        </select>
                                        
                                        <br>
                                        <input type="email" name="user_email" placeholder="Email" value="<?= old('user_email');?>">
                                        <?= getError('user_email'); ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?= getError('password'); ?>
                                        <input type="password" name="password_confirmation" placeholder="Password Confirmation">
                                        <?= getError('password_confirmation'); ?>
                                        <input type="number" name="user_phone" placeholder="Phone"value="<?= old('user_phone');?>">
                                        <?= getError('user_phone'); ?>
                                        <div class="button-box text-center">
                                            <button type="submit"><span>Sign up</span></button>
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

<?php
include_once('LayOut/footer.php');
include_once('LayOut/footerEnd.php');

?>