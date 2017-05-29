<?php 

namespace ToDoList\Providers;

use Plenty\Plugin\ServiceProvider;
use ToDoList\Contracts\ToDoRepositoryContract;
use ToDoList\Repositories\ToDoRepository;



/**
 * Class ToDoServiceProvider
 * @package ToDoList\Providers
 */
 
 class ToDoServiceProvider extends ServiceProovider {
     
     /**
      * Register the service Provider
      */
      
      public function register() {
          $this->getApplication()->register(ToDoRouteServiceProvider::class);
          $this->getApplication()->bind(ToDoRepositoryContract::class, ToDoRepository::class);
      }
      
      public function boot(RefferenceContainer $refferenceContainer){
          // register refference type for logs
          try {
              $refferenceContainer->add(["toDoId"=>"toDoId"]);
          } catch(RefferenceTypeException $ex) {
              
          }
      }
     
 }