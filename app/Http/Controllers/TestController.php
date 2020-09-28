<?php

namespace App\Http\Controllers;

use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request) {
        return $request['test']. 'test_ok';
    }
}
