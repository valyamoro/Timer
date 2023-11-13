<?php

return [
    '#^create_task?#' => [
        'controller' => 'createTask',
        'model' => 'createTask',
        'view' => '',
    ],
    '#^task/create_task?#' => [
        'controller' => 'createTask',
        'model' => 'createTask',
        'view' => 'task/create_task',
    ],
    '#^registry?#' => [
        'controller' => 'registry',
        'model' => 'registry',
        'view' => '',
    ],
    '#^auth/registry?#' => [
        'controller' => 'registry',
        'model' => 'registry',
        'view' => 'auth/registry',
    ],
];
