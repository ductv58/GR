<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('Danh sách ngành sắp xếp theo độ phù hợp giảm dần từ trên xuống');
    $bot->reply('Khoa học máy tính');
    $bot->reply('Kỹ thuật máy tính');
    $bot->reply('Công nghệ thông tin');
    $bot->reply('Công nghệ thông tin Việt Nhật');
    $bot->reply('Công nghệ thông tin ICT');
});
$botman->hears('start', BotManController::class.'@firstQuestion');
