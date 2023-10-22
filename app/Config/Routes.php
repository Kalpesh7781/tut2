<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
//$routes->post('/add','api\BoyController::addUser'); //on
$routes->group("api",function($routes)
{
    // //http://localhost:8080/api/add
    $routes->post('add','api\BoyController::addUser');
    //http://localhost:8080/api/user
    $routes->get('user','api\BoyController::allUsers');
    //http://localhost:8080/api/getuser/3
    $routes->get('getuser/(:num)','api\BoyController::getuser/$1');
     //http://localhost:8080/api/user
    $routes->put('update/(:num)','api\BoyController::updateUser/$1');
    //http://localhost:8080/api/delete/3
    $routes->delete('delete/(:num)','api\BoyController::deleteUser/$1');

});
