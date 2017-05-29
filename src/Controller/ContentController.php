<?php 

namespace ToDolist\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Templates\Twig;
use ToDoList\Contracts\ToDoRepositoryContract;
use Plenty\Plugin\Log\Loggable;


/**
 * Class ContentController
 * @package ToDoList\Controllers
 */
 
 class ContentController extends Controller {
     
     use Loggable;
     
     /**
      * @param Twig                   $twig
      * @param ToDoRepositoryContract $toDoRepo
      * @return string
      */
      public function showToDo(Twig $twig, ToDoRepositoryContract $toDoRepo): string {
         $toDoList = $toDoRepo->getToDoList();
         $templateData = array("tasks" => $toDoList);
         return $twig->render('ToDoList::content.todo', $templateData);
      }
      
        /**
        * @param  \Plenty\Plugin\Http\Request $request
        * @param ToDoRepositoryContract       $toDoRepo
        * @return string
        */
        
      public function createToDo(Request, $request, ToDoRepositoryContract $toDoRepo): string{
          $newToDo = $toDoRepo->createTask(requrest->all());
          
          // add logging here
          
          $this
          ->getLogger("contentController_createToDo")
          ->setRefferenceType("ToDoId")
          ->setRefferenceValue($newToDoId->id)
          ->info("ToDoList.createToDoInformation",['userId' => $newToDo->userId ]);
          
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
           $deleteToDo = $toDoRepo->deleteTask($id);
           return json_encode($deleteToDo);
       }
     
 }
 