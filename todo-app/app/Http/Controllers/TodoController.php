<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TodoItem;

class TodoController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        return view('todo', [
            'items' => TodoItem::getTodoItems($id)
        ]);
    }

    public function create(Request $request, $id)
    {
        TodoItem::createItem($request);
        
        return view('todo', [
            'items' => TodoItem::getTodoItems($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        TodoItem::updateItem($request);
        return view('todo', [
            'items' => TodoItem::getTodoItems($id)
        ]);
    }

    public function delete($user_id, $item_id)
    {
        TodoItem::deleteItem($item_id);
        return view('todo', [
            'items' => TodoItem::getTodoItems($user_id)
        ]);
    }
}
