<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    public static function createItem($request)
    {
        if((new self)->checkRequest($request))
        {
            $data = $request
                        ->except('_token')
                        ->validate([
                            'name' => 'required',
                            'description' => 'required',
                            'complete-by' => 'required'
                        ]);
            DB::table('todo_items')->insert($data);
        }
        
    }
    public static function updateItem($request)
    {
        if((new self)->checkRequest($request))
        {
            $data = $request
                        ->except('_token')
                        ->validate([
                            'name' => 'required',
                            'description' => 'required',
                            'complete-by' => 'required'
                        ]);
            DB::table('todo_items')
                ->where('id', $data['id'])
                ->update($data);
        }
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
            ->where('user_id', $id)
            ->get();
    }
    private function checkRequest($request)
    {
        return $request->__isset('user_id') && 
            $request->__isset('name') &&
            $request->__isset('description') &&
            $request->__isset('complete-by');
    }
}
