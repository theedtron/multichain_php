<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use be\kunstmaan\multichain\MultichainClient;
use be\kunstmaan\multichain\MultichainHelper;

class TestController extends Controller
{
    //
    public function testCmds(){

        $chained = new MultichainClient(env('JSON_RPC_URL'), env('JSON_RPC_USERNAME'), env('JSON_RPC_PASSWORD'), 3);
        $res = $chained->setDebug(true)->getInfo();

        print_r($res);
    }
}
