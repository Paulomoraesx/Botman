<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
use App\Conversations\teste;
use Illuminate\Support\Facades\Session;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        Session::put('botUtilizado');
        return view('tinker');
    }

    public function redirecionarParaView($id)
    {
        Session::put('botUtilizado', $id);
        return view('Chatbot/tinker');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }
    public function responderUsuario(BotMan $bot)
    {
        $bot->startConversation(new teste());
    }

    
}
