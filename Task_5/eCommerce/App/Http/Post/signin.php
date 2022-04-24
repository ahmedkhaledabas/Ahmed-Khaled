<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;

include_once "../Middlewares/RequestPost.php";
include_once "../Middlewares/guest.php";
include_once "../../../vendor/autoload.php";

session_start();

define('not_active',0);

$validat = new Validation;
$validat->setValueName('email')->setValue($_POST['email'])->required()
->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')
->exists('users');
$validat->setValueName('password')->setValue($_POST['password'])->required()
->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/');
if (!empty($validat->getErrors())) {
    $_SESSION['errors'] = $validat->getErrors();
    $_SESSION['old'] = $_POST;
    header('location:../../../signin.php');
    die;
}

$userModel = new User;
$result = $userModel->setEmail($_POST['email'])->getUserByEmail();
if($result->num_rows != 1) {
    $_SESSION['errors']['email']['wrong'] = "Email Not Exists";
    $_SESSION['old'] = $_POST;
    header('location:../../../signin.php');
    die;
}
$user = $result->fetch_object(User::class);
// if(!password_verify($_POST['password'],$user->getPassword())){
//     $_SESSION['errors']['password']['wrong'] = "Wrong Email Or Password";
//     $_SESSION['old'] = $_POST;
//     header('location:../../../signin.php');
//     die;
// }

if($user->getStatus() == not_active){
    $_SESSION['errors']['something']['block'] = "Sorry Your Account Has been Blocked!";
    $_SESSION['old'] = $_POST;
    header('location:../../../signin.php');
    die;
}

if(is_null($user->getEmail_verified_at())){
     $_SESSION['verification_email'] = $_POST['email'];
     header('location:../../../verification-code.php');
     die;
}

if(isset($_POST['remember_me'])){
    $rememberToken = uniqid(more_entropy:true);
    $user ->setRemember_token($rememberToken)->updateRememberToken();
    setcookie('user',$rememberToken, time() + (365*24*60*60) ,'/');
}
$_SESSION['user'] = $user->safeData();
header('location:../../../index.php');