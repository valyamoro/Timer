<?php

/* Валидация при создании задачи.
 *
 */
function validateTask(array $data): ?string
{
    $result = null;

    if (empty($data['name'])) {
        $result .= 'Поле с названием должно быть заполнено!' . "\n";
    } elseif (\mb_strlen($data['name'], 'utf8') > 255) {
        $result .= 'Название задачи не должно превышать более 255 символов' . "\n";
    } elseif (\mb_strlen($data['name'], 'utf8') < 3) {
        $result .= 'Название задачи не должно быть меньше 3 символов' . "\n";
    }

    if (empty($data['content'])) {
        $result .= 'Поле с названием должно быть заполнено!' . "\n";
    } elseif (\mb_strlen($data['content'], 'utf8') > 255) {
        $result .= 'Название задачи не должно превышать более 255 символов' . "\n";
    } elseif (\mb_strlen($data['content'], 'utf8') < 3) {
        $result .= 'Название задачи не должно быть меньше 3 символов' . "\n";
    }

    if (empty($data['count'])) {
        $result .= 'Поле с количеством должно быть заполнено!' . "\n";
    } elseif ($data['count'] == 0) {
        $result .= 'Количество повторений должно быть больше нуля' . "\n";
    } elseif (!\is_numeric($data['count'])) {
        $result .= 'В поле повторений должна быть цифра' . "\n";
    }

    return $result;
}

/* Создание задачи.
 *
 */
function createTask(array $data): int
{
    $query = 'INSERT INTO tasks 
    (name, content, count)
    VALUES (:name, :content, :count)';

    $sth = connectionDB()->prepare($query);

    $sth->execute([
        ':name' => $data['name'],
        ':content' => $data['content'],
        ':count' => $data['count'],
    ]);

    return connectionDB()->lastInsertId();
}
