<?php

namespace TodoLiust\Migrations;

use ToDoList\Models\ToDo;
use Plenty\Modules\Plugin\Database\Contracts\Migrate;
use Plenty\Plugin\Log\Loggable;

/**
* Class CreateTodoTable
*/

class CreateToDoTable {
    
    use Loggable;
    
    /*
    * @Param Migrate $migrate
    */
    
    public function run(Migrate $migrate){
        $migrate->createTable($ToDO::class);
        $this->getLogger("CreateToDoTable_run")->debug('ToDoList::migration.successMessage', ['table_name' => 'ToDo']);
    }
}