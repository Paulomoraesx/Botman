<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Ola', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('teste', function ($bot){
    $bot->reply('Hello!');
});

$botman->hears('oi', BotManController::class.'@responderUsuario');
