<?php 

namespace ToDolist\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Templates\Twig;
use ToDoList\Contracts\ToDoRepositoryContract;


/**
 * Class ContentController
 * @package ToDoList\Controllers
 */
 
 class ContentController extends Controller {
     
     /**
      * @param Twig $twig
      * @param ToDoRepopsitoryContract $toDoRepo
      * @return string
      */
      
      public function shotToDo(Twig, $twig, ToDoRepository $toDoRepo): string {
          $newToDo = $toDoRepo->createTask($request->all());
          return json_encode($newToDo);
      }
      
      /**
       * @param int $id
       * @param ToDoRepositoryContract $toDoRepo
       * @return string
       */
       
       public function updateToDo(int $id, ToDoRepositoryContract $toDoRepo): string {
           $updateToDo = $toDoRepo->updateTast($id);
           return json_encode($updateToDo);
       }
       
       
       /**
       * @param int $id
       * @param ToDoRepositoryContract $toDoRepo
       * @return string
       */
       
       public function deleteToDo(int $id, ToDoRepositoryContract $toDoRepo): string {
           $deleteToDo = $toDoRepo->deleteTast($id);
           return json_encode($deleteToDo);
       }
     
 }
 