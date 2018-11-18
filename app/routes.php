<?php

$router->get('', 'App\Controllers\TaskController@index');
$router->post('add-task', 'App\Controllers\TaskController@add');
