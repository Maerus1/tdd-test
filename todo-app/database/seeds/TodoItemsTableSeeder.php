<?php

use Illuminate\Database\Seeder;

class TodoItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TodoItem::class, 3)->create();
    }
}
