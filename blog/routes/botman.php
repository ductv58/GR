<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Xin chào', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('Chào bạn!');
    $bot->reply('Hãy gõ start để bắt đầu nhận tư vấn!');
});
$botman->hears('hello', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('Hi!!!');
    $bot->reply('Send start to start receive recommend!');
});
$botman->hears('hi', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('Hello!!!');
    $bot->reply('Send start to start receive recommend!');
});
$botman->hears('start', BotManController::class.'@firstQuestion');
