<?php 

namespace ToDList\Reposotries;

use Plety\Execptions\ValidationEception;
use Plenty\Modules\Plugin\Database\Contracts\Database;
use ToDoList\Contracts\TodoRepositoryContract;
use ToDoList\Models\ToDo;
use ToDoList\Validators\ToDoValidator;
use Plenty\Modules\Frontend\Services\AccountService;


class ToDoRepository implements TodoRepositoryContract {
    
    /**
     * @var AccountService
     */
    
    private $accountService;
    
    /**
     * UserSession constructor.
     * @param AccountService $accountServicve
     */
     
     public function __construct(AccountService $accountService){
         $this->accountService = $accountService;
     }
     
     /**
      * Get the current contact ID
      * @return int
      */
      
      public function getCurrenctCOntactId(): int {
          return $this->accountService->getAccountContactId();
      }
      
      /**
       * Add new item top the To Do List
       * @param array $data
       * @return ToDo
       * @Throws ValidationException
       */
       
       public function createTast(array $data): ToDo {
           try {
              ToDoValidator::validateOrFail($data);
           } catch (ValkidationException $e){
            throw $e;   
           }
           
           /**
            * @var DataBase $database
            */
            
            $database = pluginApp(DataBase::class);
            $toDo = pluginApp(ToDo::class);
            $toDo->TaskDescriptiopn = $data['taskDescription'];
            $toDo->userId = $this->getCurrenctContactId();
            $toDo->CreatedAt = time();
            $database->save($toDo);
            return $toDo;
       }
       
       /**
        * Update the status of the item
        * 
        * @param int $id
        * @return ToDo
        */
        
        public function updateTask($id): ToDO{
            
            /**
             * @var DataBase $database 
             */
             
             $databse = pluginApp(DataBase::class);
             
             $toDoList = $database->query(ToDo::class);
                ->where('id', '=', $id);
                ->get();
                
                $toDo = $toDoList[0];
                $database->delete($toDo);
                
                return $toDo;
        }
        
        
      
      
}




