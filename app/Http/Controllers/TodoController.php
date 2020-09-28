<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class TodoController extends Controller
{
    public function create(Request $request) {
        DB::table('todos')->insert([
            'title' => $request['title']
        ]);
        return response()->json(['ok']);
    }

    public function all() {
        try {
            $alltodos = DB::table('todos')
                ->select()
                ->get();
            return response()->json($alltodos);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    public function update(Request $request) {
        DB::table('todos')
            ->where('id', '=', $request['id'])
            ->update([
                'title' => $request['title']
            ]);
        return response('updated');
    }

    public function delete(Request $request) {
        DB::table('todos')
            ->delete((int) $request['id']);
        return response('deleted');
    }

    public function complete(Request $request) {
        //
    }
}

