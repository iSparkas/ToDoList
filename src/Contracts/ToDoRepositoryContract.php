<?php

namespace ToDoList\Contracts;

use ToDoList\Models\ToDo;

/**
* Class ToDoRepositoryContract
* @package ToDoList\Contracts
*/

interface ToDoRepositoryContract {
    
    /**
    * Add a new task to the To Do list
    *
    * @param array $data
    * @return ToDo
    */
    
    public function createTask(array $data): ToDO;
    
    /**
    * List all taks of the To Do List
    * 
    * @return ToDo[] array
    */
    
    public function getToDoList(): array;
    
    /**
    * Update the status of the task
    * 
    * @param int $id
    * @return ToDO
    */
    
    public function updateTask($id): ToDO;
    
    /**
    *Delete task from the TO DO List
    * 
    * @param int $id
    * @reutn ToDo
    */
    
    public function deleteTask($id): ToDO;
}
