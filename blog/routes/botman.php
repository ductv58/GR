<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('Hello!');
});
$botman->hears('start', BotManController::class.'@firstQuestion');
