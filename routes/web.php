<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function () {
    Mail::raw('Тестовое письмо от Laravel!', function ($message) {
        $message->to('zharylkasynov_d@mail.ru')
                ->subject('Проверка SMTP через Яндекс');
    });

    return 'Письмо отправлено (если всё ок)';
});