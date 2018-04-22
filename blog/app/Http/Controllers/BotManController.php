<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use App\Conversations\FirstQuestion;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');
        DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);
        $config = [
            'facebook' => [
            'token' => env('FACEBOOK_TOKEN'),
            'app_secret' => env('FACEBOOK_APP_SECRET'),
            'verification'=>env('FACEBOOK_VERIFICATION'),
            ],
        ];
        BotManFactory::create($config);
        $botman->listen();
    }

    public function firstQuestion(BotMan $bot)
    {
        $bot->startConversation(new FirstQuestion());
    }
}
