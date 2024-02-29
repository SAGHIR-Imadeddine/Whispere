<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\testWebsocket;

class TestController extends Controller
{
    //
    public function test()
    {
        event(new testWebsocket);
    }
}
