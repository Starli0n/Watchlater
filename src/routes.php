<?php
// Routes
$app->get('/hello/{name}', 'Watchlater\Api\Router:hello');
$app->post('/token', 'Watchlater\Api\Router:token');
$app->get('/admin/ping', 'Watchlater\Api\Router:adminPing');
