<?php

namespace App\Http\Controllers;

use App\Helpers\Bitcoin;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use be\kunstmaan\multichain\MultichainClient;
use be\kunstmaan\multichain\MultichainHelper;

class TestController extends Controller
{
    //
    public function testCmds(){

        $chained = new MultichainClient('http://'.env('JSON_RPC_URL').':'.env('JSON_RPC_PORT'), env('JSON_RPC_USERNAME'), env('JSON_RPC_PASSWORD'), 3);
//        print_r($chained);
        $res = $chained->setDebug(true)->getInfo();

        print_r($res);
    }

    public function easyCoin(){

        $bitcoin = new Bitcoin(env('JSON_RPC_USERNAME'),env('JSON_RPC_PASSWORD'),env('JSON_RPC_URL'),env('JSON_RPC_PORT'));
        print_r($bitcoin);
        print_r(' '.PHP_EOL);

        $res = $bitcoin->getinfo();
        print_r($bitcoin->error.PHP_EOL);
        print_r($bitcoin->response.PHP_EOL);
        print_r($bitcoin->status.PHP_EOL);

        print_r($res);
    }

    public function curlComm(){
        $a = 'curl -s --user '.env('JSON_RPC_USERNAME').':'.env('JSON_RPC_PASSWORD').' --data-binary \'';
        $b = '{"jsonrpc": "1.0", "id":"curltest", "method": "getinfo", "params": [';
        $c = '] }\' -H "content-type: text/plain;" http://127.0.0.1:'.env('JSON_RPC_PORT').'/';
        $cmd = $a . $b . $c;

        echo "\n<h2>Raw Output</h2><pre>\n";
        $ret=system($cmd);

        echo "\n<h2>Decoded Output</h2>\n";
        $rets = json_decode($ret, true);
        print_r($rets);

    }
}
