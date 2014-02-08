<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "public/auth";
$route['404_override'] = '';
$route['auth'] = 'public/auth';
$route['auth/(:any)'] = 'public/auth/$1';
$route['admin/home'] = 'admin/home';
$route['admin/user/create_user'] = 'admin/user/create_user';
$route['admin/(:any)'] = 'admin/$1';
$route['admin/home/(:any) '] = 'admin/home/$1';
$route['admin/products/sview_products/(:any)'] = 'admin/products/sview_products/$1';
$route['marketer/home'] = 'marketer/home';
$route['marketer/home/(:any)'] = 'marketer/home/$1';
$route['marketer/(:any)'] = 'marketer/$1';
$route['marketer/agent/create_agent'] = 'marketer/agent/create_agent';
$route['agent/home'] ='agent/home';
$route['agent/home/(:any)'] = 'agent/home/$1';
$route['agent/(:any)'] = 'agent/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */