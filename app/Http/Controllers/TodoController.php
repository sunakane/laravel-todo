<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function create(Request $request) {
        DB::table('todos')->insert([
            'title' => $request['title']
        ]);
        return response()->json(['ok']);
    }

    public function all() {
        $alltodos = DB::table('todos')
            ->select()
            ->get();
        return response()->json($alltodos);
    }
}
