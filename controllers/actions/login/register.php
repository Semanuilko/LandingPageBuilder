<?

$user = new User([
    'login' => $_POST['login'],
    'name' => $_POST['login'],
    'password' => User::hash_password($_POST['password']),
]);

$user->save();
AuthController::authorize([
    'login' => $user->login,
    'password' => $user->password
]);


?>