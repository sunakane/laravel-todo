<?php


namespace App\Http\Controllers;



use Illuminate\Support\Facades\Request;

class TestController extends Controller
{
    public function test(Request $request) {
        return $request['test']. 'test_ok';
    }
}
