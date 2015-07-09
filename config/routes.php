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

$route['default_controller'] = "welcome";
//$route['scw/([a-z]+)/([a-z]+)/(\d+)'] = "$1/$2/$3";
//$route['scm/([a-z]+)/([a-z]+)/(\d+)'] = "$1/$2/$3";
//$route['pms_res/([a-z]+)/([a-z]+)/(\d+)'] = "$1/$2/$3";

/*$route['topic/(:num)'] = "topic/get/$1";*/
/*$route['post/(:num)'] = "topic/get/$1";*/
/*$route['ts_intro/([a-z]+)/([a-z]+)/(\d+)'] = "$1/$2/$3";*/
/*$route['post/(:num)'] = "par/par_upd/$1";*/

/* site route */
/*
$route['menu/menu_use/([a-z]+)'] = "menu/menu_use/$1";
$route['notice/detail/([a-z]+)'] = "notice/detail/$1";
$route['notice/notice_content/([a-z]+)'] = "notice/notice_content/$1";
$route['notice/notice_ins/([a-z]+)'] = "notice/notice_ins/$1";
$route['env/env_content/([a-z]+)'] = "env/env_content/$1";
$route['cms/corp_upd/(:num)'] = "cms/corp_upd/$1";
$route['cms/user_upd/(:num)'] = "cms/user_upd/$1";
$route['code/code_content/([a-z]+)'] = "code/code_content/$1";
*/
/* par route */
/*
$route['par/par_trace/(:num)'] = "par/par_trace/$1";
$route['par/par_upd/(:num)'] = "par/par_upd/$1";
$route['par/par_assign/(:num)'] = "par/par_assign/$1";
$route['par/par_assign_del/(:num)/(:num)'] = "par/par_assign_del/$1/$2";
$route['par/notice_detail/(:num)'] = "par/notice_detail/$1";
$route['calendar/par/(:num)/(:num)/(:num)'] = "calendar/par/$1/$2/$3";
*/

/* default */
$route['default_controller'] = "common/index";
$route['404_override'] = 'errors/notfound';

/* End of file routes.php */
/* Location: ./application/config/routes.php */