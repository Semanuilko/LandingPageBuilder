<?
$authorized = AuthController::authorize([
    'login' => $_POST['login'],
    'password' => User::hash_password($_POST['password'])
]);

?>