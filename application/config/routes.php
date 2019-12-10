<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['about'] = 'home/about';
$route['room'] = 'home/room';
$route['single_room/(:num)'] = 'home/single_room/$1';
$route['facilities'] = 'home/facilities';
$route['contact'] = 'home/contact';
//Login//
$route['login'] = 'login/index';
$route['check_login'] = 'login/check_login';
$route['logout'] = 'login/logout';

$route['dashboard'] = 'dashboard/index';

//Member//
$route['member'] = 'member/index';
$route['member/(:num)'] = 'member';
$route['member/create'] = 'member/create';
$route['member/save'] = 'member/save';
$route['member/edit'] = 'member/edit/$1';
$route['member/show'] = 'member/show/$1';
$route['member/update'] = 'member/update/$1';
$route['member/delete'] = 'member/delete/$1';

//User//
$route['user'] = 'user/index';
$route['user/(:num)'] = 'user';
$route['user/create'] = 'user/create';
$route['user/save'] = 'user/save';
$route['user/edit'] = 'user/edit/$1';
$route['user/show'] = 'user/show/$1';
$route['user/update'] = 'user/update/$1';
$route['user/delete'] = 'user/delete/$1';


//Dorm//
$route['dorm'] = 'dorm/index';
$route['dorm/(:num)'] = 'dorm';
$route['dorm/create'] = 'dorm/create';
$route['dorm/save'] = 'dorm/save';
$route['dorm/edit'] = 'dorm/edit/$1';
$route['dorm/show'] = 'dorm/show/$1';
$route['dorm/update'] = 'dorm/update/$1';
$route['dorm/delete'] = 'dorm/delete/$1';

//Migrate//
$route['migrate'] = 'migrate/index';

$route['404_override'] = 'errors/index';
$route['translate_uri_dashes'] = FALSE;
