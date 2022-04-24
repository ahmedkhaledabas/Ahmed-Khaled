<?php
// include_once "../../Middlewares/RequestPost.php";

use App\Database\Models\User;
use App\Http\Requests\Validation;

include_once "../../../vendor/autoload.php";
session_start();
// validation 
// code => ['required','integer','digits:5','exists:users,verification_code']
$validat = new Validation;
$validat->setValueName('code')->setValue($_POST['code'])->required()->integer()->digits(5)->exists('users',"verifcation_code");

// if we have error => redirect to html page to display errors
if (!empty($validat->getErrors())) {
    // save errors into session
    $_SESSION['errors'] = $validat->getErrors();
    // save old values of post into session
    $_SESSION['old'] = $_POST;
    header('location:../../../verification-code.php');
    die;
}

$userModel = new User;
$userModel->setEmail($_SESSION['verification_email'])->setVerfication_code($_POST['code']);
$result = $userModel->checkCode();
if($result->num_rows != 1){
    // save errors into session
    $_SESSION['errors']['code']['wrong'] = "Wrong Code";
    // save old values of post into session
    $_SESSION['old'] = $_POST;
    header('location:../../../verification-code.php');
    die;
}
$userModel->setEmail_verified_at(date('Y-m-d H:i:s'));
if($userModel->updateUserStatus()){
    unset($_SESSION['verification_email']);
    header('location:../../../index.php');die;
}else{
      // save errors into session
      $_SESSION['errors']['someting']['wrong'] = "Something Went Wrong";
      // save old values of post into session
      $_SESSION['old'] = $_POST;
      header('location:../../../verification-code.php');
      die;
}