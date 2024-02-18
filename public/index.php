<?php 
session_start();
use Router\Router;

require '../vendor/autoload.php'; 

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR );
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
$_GET['url'] = $_SERVER['REQUEST_URI'];   

$router = new Router($_GET['url']);  


////////////////////// Admin - Employe - Visiteur /////////////////////

$router->get('/', 'App\Controllers\HomeController@welcome');

$router->get('/posts', 'App\Controllers\BlogController@index');

$router->get('/posts/:id', 'App\Controllers\ShowController@show');

// Form login 
$router->get('/login', 'App\Controllers\LoginController@login');
$router->post('/login', 'App\Controllers\LoginController@loginpost'); 
$router->get('/login', 'App\Controllers\LoginController@loginpost');

// logout 
$router->get('/logout', 'App\Controllers\LoginController@logout');
$router->post('/logout', 'App\Controllers\LoginController@logout');

// Filter 

//Contact email 
$router->get('/contact', 'App\Controllers\ContactController@showForm');
$router->post('/contact', 'App\Controllers\ContactController@sendEmail');

// Contact email annonce  show 
$router->post('/send-contact-form', 'App\Controllers\ShowController@sendContactForm');
$router->get('/send-contact-form', 'App\Controllers\ShowController@sendContactForm');


//////////////////////// Admin //////////////////////

// Interface administrateur
$router->get('/admin', 'App\Controllers\Admin\AdminController@admin');
// Posts 
$router->get('/admin/posts', 'App\Controllers\Admin\PostController@index');
$router->post('/admin/posts/delete/:id', 'App\Controllers\Admin\PostController@destroy');
$router->get('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@update');
// Service 
$router->get('/admin/services', 'App\Controllers\Admin\ServiceController@index');
$router->post('/admin/services/delete/:id', 'App\Controllers\Admin\ServiceController@destroy');
// Service edit 
$router->get('/admin/services/edit/:id', 'App\Controllers\Admin\ServiceController@edit');
$router->post('/admin/services/edit/:id', 'App\Controllers\Admin\ServiceController@update');
// Posts create 
$router->get('/admin/posts/create', 'App\Controllers\Admin\PostController@create');
$router->post('/admin/posts/create', 'App\Controllers\Admin\PostController@createPost');
// Employe
$router->get('/admin/employes', 'App\Controllers\Admin\EmployeController@index');
// Employe create
$router->get('/admin/employe/create', 'App\Controllers\Admin\EmployeController@create');
$router->post('/admin/employe/create', 'App\Controllers\Admin\EmployeController@createEmploye');
// Hours 
$router->get('/admin/hours', 'App\Controllers\Admin\HoursController@index');
// Hours edit 
$router->get('/admin/hours/edit/:id', 'App\Controllers\Admin\HoursController@edithours');
$router->post('/admin/hours/edit/:id', 'App\Controllers\Admin\HoursController@updatehours');



/////////// Admin Employe //////////////////////
// Interface admin
$router->get('/adminemploye', 'App\Controllers\AdminEmploye\EmployePostController@adminemploye');

// Avis create 
$router->get('/createavis', 'App\Controllers\AdminEmploye\AvisController@create');
$router->post('/createavis', 'App\Controllers\AdminEmploye\AvisController@createAvis');
// Post create 
$router->get('/employe/createpost', 'App\Controllers\AdminEmploye\EmployePostController@create');
$router->post('/employe/createpost', 'App\Controllers\AdminEmploye\EmployePostController@createPost');
// Gerer avis 
$router->get('/employe/gereravis', 'App\Controllers\AdminEmploye\AvisController@avismoderator');
$router->post('/employe/gereravis', 'App\Controllers\AdminEmploye\AvisController@handleActions');
///////////////////////////////////////////////////////////////////////////////

$router->get('/filter', 'App\Controllers\AnnonceController@filter');
$router->post('/filter', 'App\Controllers\AnnonceController@search');






$router->run();
 