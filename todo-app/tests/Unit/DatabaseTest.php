<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testing database connection with data from todo_item table
     *
     * @return void
     */
    public function testTodoItemsTable() {

        //arrange
        factory(App\User::class)->create();
        $todo_name = factory(App\TodoItem::class)->create()->name;

        //assert
        $this->assertDatabaseHas('todo_items', [
            'name' => $todo_name
        ]);
    }

    /**
     * Testing database connection with data from users table
     *
     * @return void
     */
    public function testUsersTable() {

        //arrange
        $user_name = factory(App\User::class)->create()->name;

        //assert
        $this->assertDatabaseHas('users', [
            'name' => $user_name
        ]);
    }
}
