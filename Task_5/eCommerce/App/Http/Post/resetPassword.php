<?php
include_once "../Middlewares/RequestPost.php";
include_once "../Middlewares/guest.php";

use App\Database\Models\User;
use App\Http\Requests\Validation;

include_once "../../../vendor/autoload.php";

session_start();

$validat = new Validation;
$validat->setValueName('password')->setValue($_POST['password'])->required()
->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/',
 "Minimum 8 and maximum 20 characters, at least one uppercase letter, one lowercase letter, one number and one special character")
    ->confirmed($_POST['password_confirmation']);

$validat->setValueName('password_confirmation')->setValue($_POST['password_confirmation'])->required();


if (!empty($validat->getErrors())) {
    $_SESSION['errors'] = $validat->getErrors();
    $_SESSION['old'] = $_POST;
    header('location:../../../reset-password.php');
    die;
}

$userModel = new User;
$userModel->setEmail($_SESSION['verification_email'])->setPassword(password_hash($_POST['password'],PASSWORD_BCRYPT));
if (! $userModel->updatePassword() ) {
    $_SESSION['errors']['code']['wrong'] = "Someting Went Wrong";
    $_SESSION['old'] = $_POST;
    header('location:../../../reset-password.php');
    die;
}
unset($_SESSION['verification_email']);
header('location:../../../signin.php');