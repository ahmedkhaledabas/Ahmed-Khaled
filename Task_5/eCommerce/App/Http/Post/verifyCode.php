<?php
include_once "../Middlewares/RequestPost.php";
include_once "../Middlewares/guest.php";

use App\Database\Models\User;
use App\Http\Requests\Validation;

include_once "../../../vendor/autoload.php";
session_start();

$validat = new Validation;
$validat->setValueName('code')->setValue($_POST['code'])->required()->integer()->digits(5)->exists('users', "verification_code");

if (!empty($validat->getErrors())) {
    $_SESSION['errors'] = $validat->getErrors();
    $_SESSION['old'] = $_POST;
    header('location:../../../verification-code.php?page='.$_GET['page']);
    die;
}

$userModel = new User;
$userModel->setEmail($_SESSION['verification_email'])->setVerification_code($_POST['code']);
$result = $userModel->checkCode();
if ($result->num_rows != 1) {
    $_SESSION['errors']['code']['wrong'] = "Wrong Code";
    $_SESSION['old'] = $_POST;
    header('location:../../../verification-code.php?page='.$_GET['page']);
    die;
}
if ($_GET['page'] == 'signup') {
    $userModel->setEmail_verified_at(date('Y-m-d H:i:s'));
    if ($userModel->makeUserVerified()) {
        unset($_SESSION['verification_email']);
        header('location:../../../signin.php');
        die;
    } else {
        $_SESSION['errors']['someting']['wrong'] = "Something Went Wrong";
        $_SESSION['old'] = $_POST;
        header('location:../../../verification-code.php?page='.$_GET['page']);
        die;
    }
}elseif($_GET['page'] == 'verify-email'){
    header('location:../../../reset-password.php');
    die;
}
