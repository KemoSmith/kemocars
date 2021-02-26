<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messageUi()
    {
        return view('message.messageUi');
        // m
    }
}
