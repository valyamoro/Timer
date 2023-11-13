<?php

function validateUser(array $data): ?string
{
    $result = null;

    if (empty($data['name'])) {
        $result .= 'Заполните поле имя' . "\n";
    } elseif (\preg_match('#[^а-яa-z]#ui', $data['name'])) {
        $result .= 'Имя содержит недопустимые символы' . "\n";
    } elseif (\mb_strlen($data['name'], 'utf8') > 15) {
        $result .= 'Имя не должно содержать более 15 символов' . "\n";
    } elseif (\mb_strlen($data['name'], 'utf8') < 3) {
        $result .= 'Имя должно содержать более 3 символов' . "\n";
    }

    if (empty($data['password'])) {
        $result .= 'Заполните поле пароль' . "\n";
    } elseif (\is_numeric($data['password'])) {
        $result .= 'Пароль не должен содержать только цифры' . "\n";
    } elseif (!\preg_match('/[A-Z]/', $data['password'])) {
        $result .= 'Пароль должен содержать минимум одну заглавную букву' . "\n";
    } elseif (\mb_strlen($data['password'], 'utf8') <= 5) {
        $result .= 'Пароль содержит меньше 5 символов' . "\n";
    } elseif (\mb_strlen($data['password'], 'utf8') > 15) {
        $result .= 'Пароль содержит больше 15 символов' . "\n";
    }

    return $result;
}

function checkUserExists(string $name): bool
{
    $query = 'SELECT name FROM users WHERE name=? LIMIT 1';

    $sth = connectionDB()->prepare($query);
    $sth->execute([$name]);

    return (bool)$sth->rowCount();
}

function addUser(array $data): int
{
    $query = 'INSERT INTO users 
    (name, password, created_at, updated_at)
    VALUES (:name, :password, :created_at, :updated_at)';

    $sth = connectionDB()->prepare($query);

    $sth->execute([
        ':name' => $data['name'],
        ':password' => $data['password'],
        ':created_at' => $data['created_at'],
        ':updated_at' => $data['updated_at'],
    ]);

    return (int)connectionDB()->lastInsertId();
}
