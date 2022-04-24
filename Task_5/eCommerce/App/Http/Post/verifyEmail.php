<?php
include_once "../Middlewares/RequestPost.php";
include_once "../Middlewares/guest.php";

use App\Database\Models\User;
use App\Mail\VerificationCode;
use App\Http\Requests\Validation;

include_once "../../../vendor/autoload.php";
session_start();

$validat = new Validation;
$validat->setValueName('email')->setValue($_POST['email'])->required()
->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')
->exists('users');

if (!empty($validat->getErrors())) {
    $_SESSION['errors'] = $validat->getErrors();
    $_SESSION['old'] = $_POST;
    header('location:../../../verify-email.php');
    die;
}

$verificationCode = rand(10000,99999);
$userModel = new User;
$userModel->setEmail($_POST['email'])->setVerification_code($verificationCode);
if(!$userModel->updateUserCode()){
    $_SESSION['errors']['something']['wrong'] = "Something Went Wrong";
    $_SESSION['old'] = $_POST;
    header('location:../../../verify-email.php');
    die;
}

 $body = "<h4> Welcome {$_POST['email']}</h4> <p> Your Verification Code:<b>{$verificationCode}</b></p><p>Thank You .</p>";
 $verificationCode = new VerificationCode($_POST['email'], "Verification Code", $body);
 if ($verificationCode->send()) {
     $_SESSION['verification_email'] = $_POST['email'];
     header('location:../../../verification-code.php?page=verify-email');
     die;
     
 } else {
     $_SESSION['errors']['mail']['error'] = "Please Try Again Later";
     header('location:../../../verify-email.php');
     die;
 }