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
    '#^login?#' => [
        'controller' => 'login',
        'model' => 'login',
        'view' => '',
    ],
    '#^auth/login?#' => [
        'controller' => 'login',
        'model' => 'login',
        'view' => 'auth/login',
    ],
];
