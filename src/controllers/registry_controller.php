<?php

$metaTitle = 'Регистрация';

if (!empty($_POST)) {
    $user = $_POST;
    $errorMessage = validateUser($user);

    if (!\is_null($errorMessage)) {
        $_SESSION['errors'] = $errorMessage;
    } else {
        $route = '/auth/registry';

        $isUserExists = checkUserExists($user['name']);

        if ($isUserExists === true) {
            $_SESSION['errors'] = 'Пользователь с этими данными уже существует!' . "\n";
        } else {
            if ($user['password'] === $user['confirm_password']) {
                $user['password'] = \password_hash($user['password'], PASSWORD_DEFAULT);

                $user['created_at'] = ($user['updated_at'] = date('Y-m-d H:i:s'));
                $lastId = addUser($user);
                
                if ($lastId === 0) {
                    $_SESSION['errors'] = 'Произошла непредвиденная ошибка, пожалуйста, попробуйте снова' . "\n";
                } else {
                    $_SESSION['success'] = 'Вы зарегистрировались!' . "\n";
                    $route = '/';
                }
            }
        }
        \header("Location: {$route}");
        die;
    }
}

$content = render($currentAction['view']);
