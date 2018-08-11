<?
AuthController::authorize([
    'login' => $_POST['login'],
    'password' => User::hash_password($_POST['password'])
]);

// Если при авторизации не произошел редирект - значит авторизация не успешна, продолжаем выполнять код.
PageController::render("login",[
    'global_errors' => [
        ['message' => "Ошибка авторизации."],
        ['message' => "Ошибка авторизации 2."]
    ]
]);

?>