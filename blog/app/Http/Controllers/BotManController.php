<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use App\Conversations\FirstQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::guard('user')->check() == null){
            $bot->reply('Hãy đăng nhập để được tư vấn!');
        } else {
            $bot->startConversation(new FirstQuestion());
        }
    }
}
