<?php 

namespace ToDoList\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;


/**
 * Class ToDoReouteServiceProvider
 * @package ToDoList\Providers
 */
 
 class ToDoRouteServiceProvider extends RouteServiceProvider {
     
     /**
      *  @param Router $router
      */
      
      public function map(Router $router){
          $router->get('todo', 'ToDoList\Controllers\ContentController@showToDo');
          $router->post('todo', 'ToDoList\Controllers\ContentController@createToDo');
          $router->put('todo/{id}', 'ToDolist\Controllers\ContentController@updateToDO');
          $router->delete('todo/{id}', 'ToDoList\Controllers\ContentController@deleteToDo');
      }
 }
