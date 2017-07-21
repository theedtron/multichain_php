<?php

namespace App\Http\Controllers;

use App\Helpers\Bitcoin;
use Illuminate\Http\Request;
use be\kunstmaan\multichain\MultichainClient;
use be\kunstmaan\multichain\MultichainHelper;

class TestController extends Controller
{
    //
    public function testCmds(){

        $chained = new MultichainClient('http://'.env('JSON_RPC_URL').':'.env('JSON_RPC_PORT'), env('JSON_RPC_USERNAME'), env('JSON_RPC_PASSWORD'), 3);
        $res = $chained->setDebug(true)->getInfo();

        print_r($res);
    }

    public function easyCoin(){

        $bitcoin = new Bitcoin(env('JSON_RPC_USERNAME'),env('JSON_RPC_PASSWORD'),env('JSON_RPC_URL'),env('JSON_RPC_PORT'));
        $res = $bitcoin->getinfo();
        print_r($bitcoin->error.PHP_EOL);
        print_r($bitcoin->response.PHP_EOL);
        print_r($bitcoin->status.PHP_EOL);

        print_r($res);
    }

    public function curlComm(){

    }
}
