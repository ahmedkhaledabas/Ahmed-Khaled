<?php

include_once '../../Middlewares/RequestPost.php';
include_once '../../../vendor/autoload.php';

use App\Http\Requestes\Validation;
use App\DataBase\Models\User;
use App\Mail\VerificationCode;

$validat = new Validation;
$validat->setValueName('first_name')->setValue($_POST['first_name'])->required();
$validat->setValueName('last_name')->setValue($_POST['last_name'])->required();
$validat->setValueName('user_email')->setValue($_POST['user_email'])->required();

$validat->setValueName('password')->setValue($_POST['password'])->required();

$validat->setValueName('phone')->setValue($_POST['phone'])->required();
$validat->setValueName('password_confirmation')->setValue($_POST['password_confirmation'])->required();
$validat->setValueName('gender')->setValue($_POST['gender'])->required();

print_r($validat->getErrors());

if (!empty($validat->getErrors())) {
    $_SESSION['errors'] = $validat->getErrors();
    $_SESSION['old'] = $_POST;
    header('location:../../../signup.php');
    die;
}

$verificationCode = rand(10000, 99999);

$user = new User;
$user->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])
    ->setPhone($_POST['phone'])->setEmail($_POST['user_email'])->setGender($_POST['gender'])
    ->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT))->setverfication_code($verificationCode);
if ($user->create()) {
    // send mail with verification code
    $body = "<h4>Hello {$_POST['first_name']}</h4> <p> Your Verification Code:<b>{$verificationCode}</b></p><p>Thank You See U Soon.</p>";
    $verificationCode = new VerificationCode($_POST['email'], "Verification Code", $body);

    if ($verificationCode->send()) {
        // header to verification code page
        $_SESSION['verification_email'] = $_POST['email'];
        header('location:../../../verification-code.php');
        die;
    } else {
        $_SESSION['errors']['mail']['error'] = "Please Try Again Later";
        header('location:../../../signup.php');
        die;
    }
} else {
    $_SESSION['errors']['something']['error'] = "Something WentWorng";
    header('location:../../../signup.php');
    die;
}
