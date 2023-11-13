<?php

$metaTitle = 'Авторизация';

if (!empty($_POST)) {
    $credentials = $_POST;
    $errorMessage = validateUser($credentials);

    $route = '/auth/login';
    if (!\is_null($errorMessage)) {
        $_SESSION['errors'] = $errorMessage;
    } else {
        $credentials = escapeData($credentials);
        $user = getUser($credentials['name']);
        dump($user);
        if ($user === false) {
            $_SESSION['errors'] = 'Вы ввели неверные данные.' . "\n";
        } else {
            if (!\password_verify($credentials['password'], $user['password'])) {
                $_SESSION['errors'] = 'Вы ввели неверные данные' . "\n";
            } else {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                ];

                $route = '/auth/profile';
            }
        }
    }
    \header("Location: {$route}");
    die;
}

$content = render($currentAction['view']);
