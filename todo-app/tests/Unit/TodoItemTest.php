<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use App\TodoItem;
use App;

class TodoItemTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Create a TodoItem record
     *
     * @return void
     */
    public function testTodoItemInsert()
    {
        //arrange
        $request = new Request();
        $user_id = factory(App\User::class)->create()->id;
        $request->replace([
            'user_id' => $user_id,
            'name' => 'Taking out the trash',
            'description' => 'It\'s recycling day, so take out only the recycling',
            'complete-by' => '2019-02-20'
        ]);
        
        $result = $request->only(['name'])['name'];

        //act
        TodoItem::createItem($request);

        //assert
        $this->assertDatabaseHas('todo_items', [
            'name' => $result
        ]);
    }

    /**
     * Update a TodoItem record
     *
     * @return void
     */
    public function testTodoItemUpdate()
    {
        //arrange
        $request = new Request();
        $user_id = factory(App\User::class)->create()->id;
        factory(App\TodoItem::class)->create();
        $todoItem = TodoItem::first();
        $request->replace([
            'id' => $todoItem->id,
            'user_id' => $todoItem->user_id,
            'name' => $todoItem->name,
            'description' => $todoItem->description . ' and eat lunch',
            'complete-by' => $todoItem->{'complete-by'}
        ]);
        $result = $request->only(['description'])['description'];

        //act
        TodoItem::updateItem($request);

        //assert
        $this->assertDatabaseHas('todo_items', [
            'description' => $result
        ]);
    }

    /**
     * Delete a TodoItem record
     *
     * @return void
     */
    public function testTodoItemDelete()
    {
        //arrange
        factory(App\User::class)->create();
        $todo_item_id = factory(App\TodoItem::class)->create()->id;

        //act
        TodoItem::deleteItem($todo_item_id);

        //assert
        $this->assertDatabaseMissing('todo_items', [
            'id' => $todo_item_id
        ]);
    }

    /**
     * Get a list of TodoItem records
     *
     * @return void
     */
    public function testTodoItemRetrieveList()
    {
        //arrange
        $listSize = 10;
        $user_id = factory(App\User::class)->create()->id;
        factory(App\TodoItem::class, $listSize)->create();

        //act
        $todo_items = TodoItem::getTodoItems($user_id);

        //assert
        $this->assertIsObject($todo_items);
    }
}
