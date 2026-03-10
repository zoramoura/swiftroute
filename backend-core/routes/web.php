<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-redis', function () {
    // This sends a raw message to the 'test-channel' in Redis
    Redis::publish('test-channel', json_encode(['message' => 'Hello from Laravel!']));
    return '🚀 Message sent to Redis!';
});
