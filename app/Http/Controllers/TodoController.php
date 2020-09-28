<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function create(Request $request) {
        $id = DB::table('todos')->insertGetId([
            'title' => $request['title']
        ]);
        return response()->json(['newid' => $id]);
    }

    public function all() {
        try {
            $alltodos = DB::table('todos')
                ->where('valid', '=', 1)
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
            ->where('id', '=', $request['id'])
            ->update([
                'valid' => false
            ]);
        return response()->json(['deleted' => $request['id']]);
    }

    public function toggleComplete(Request $request) {
        DB::table('todos')
            ->where('id', '=', $request['id'])
            ->update([
                'completed' => DB::raw('NOT completed')
            ]);
        return response('toggled');
    }
}

