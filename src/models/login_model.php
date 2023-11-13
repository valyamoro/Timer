<?php

function validateUser(array $data): ?string
{
    $result = null;

    if (empty($data['name'])) {
        $result .= 'Заполните поле с именем' . "\n";
    } elseif (\mb_strlen($data['name'], 'utf8') > 255) {
        $result .= 'Неверное имя' . "\n";
    }

    if (empty($data['password'])) {
        $result .= 'Заполните поле пароль' . "\n";
    } elseif (\mb_strlen($data['password'], 'utf8') > 255) {
        $result .= 'Неверный пароль' . "\n";
    }

    return $result;
}

function getUser(string $name): bool|array
{
    $query = 'SELECT * FROM users WHERE name=? LIMIT 1';

    $sth = connectionDB()->prepare($query);
    $sth->execute([$name]);

    return $sth->fetch();
}