<?php

$metaTitle = 'Создать задачу';

if (!empty($_POST)) {
    $task = $_POST;
    $errorMessage = validateTask($task);
    var_dump(is_numeric($task['count']));
    if (!\is_null($errorMessage)) {
        $_SESSION['errors'] .= $errorMessage;
    } else {
        $task = escapeData($task);
        createTask($task);
    }
}

$content = render($currentAction['view']);