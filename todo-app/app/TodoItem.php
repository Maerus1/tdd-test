<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    public static function createItem($request)
    {
        $request->validate([
            'name' => 'required',
            'complete-by' => 'required'
        ]);
        $data = $request
                    ->except('_token');   

        DB::table('todo_items')->insert($data);
        
        
    }
    public static function updateItem($request)
    {
        $request->validate([
            'name' => 'required',
            'complete-by' => 'required'
        ]);
        $data = $request
                    ->except(['_token', '_method']);

        DB::table('todo_items')
            ->where('id', $data['id'])
            ->update($data);
    
    }

    public static function deleteItem($id)
    {
        DB::table('todo_items')
            ->where('id', $id)
            ->delete();
    }

    public static function getTodoItems($id)
    {
        return DB::table('todo_items')
            ->where('user_id', auth()->user()->id)
            ->get();
    }
}
