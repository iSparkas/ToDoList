<?php

namespace TodoLiust\Migrations;

use ToDoList\Models\ToDo;
use Plenty\Modules\Plugin\Database\Contracts\Migrate;

/**
* Class CreateTodoTable
*/

class CreateToDoTable {
    
    /*
    * @Param Migrate $migrate
    */
    
    public function run(Migrate $migrate){
        $migrate->createTable($ToDO::class);
    }
}