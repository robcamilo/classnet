<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	http://codeigniter.com/user_guide/general/routing.html
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

$route['logout'] = 'User/logout';
$route['logoutestu'] = 'User/logoutestu';

$route['about'] = 'User/about';
$route['work'] = 'User/work';
$route['contact'] = 'User/contact';
$route['loginreg'] = 'User/loginreg';
$route['reglog'] = 'User/reglog';
$route['services'] = 'User/services';

$route['registerprof'] = 'User/registerprof';
$route['registerestu'] = 'User/registerestu';
$route['register_success'] = 'User/register_success';
$route['register_success_estu'] = 'User/register_success_estu';

$route['loginprof'] = 'User/loginprof';
$route['loginestu'] = 'User/loginestu';
$route['login_success'] = 'User/login_success';
$route['login_success_estu'] = 'User/login_success_estu';

$route['conexionprof'] = 'User/conexionprof';

//plantilla admin
$route['blank_page'] = 'User/blank_page';
$route['charts'] = 'admin/charts';
$route['compose'] = 'User/compose';
$route['froms'] = 'User/froms';
$route['general'] = 'User/general';
$route['grids'] = 'User/grids';
$route['inbox'] = 'User/inbox';
$route['index'] = 'User/indexadmin';
$route['login'] = 'User/login';
$route['media'] = 'User/media';
$route['signup'] = 'User/signup';
$route['tables'] = 'User/tables';
$route['typography'] = 'User/typography';
$route['validation'] = 'User/validation';
$route['widgets'] = 'User/widgets';




$route['default_controller'] = 'User';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
