<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
 * User: GulaHack
 * Date: 17/7/2026
 * Time: 12:06 PM
 */
use App\controllers\AuthController;
use App\controllers\SiteController;
use App\core\Application;

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load(); // to using/access ENV folder 

$config = [
    'userClass' => \App\models\User::class, // -- for login(), pass it to Application.php
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);  // -- route to home.php with implement controller

$app->router->get('/contact', [SiteController::class, 'contact']);  // -- route to contact.php with implement controller
$app->router->post('/contact', [SiteController::class, 'contact']); // SUBTOPIC: IMPROVE FROM WIDGET WITH ABSTRACTION -- (Change from handleContact() to contact())  

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/profile', [AuthController::class, 'profile']);

$app->router->get('/logout', [AuthController::class, 'logout']); // -- best case make it post method

//print_r(SiteController::class); // Outputs: App\controllers\SiteController

$app->router->get('/products/{id}', function($id) {
    return 'Products with id '.$id;
});
$app->router->get('/users/{user}/posts/{post}', function ($user, $post) {
    return "User: $user, Post: $post";
});

$app->run();

/*
    DYNAMIC ROUTE PARAMETER {name}

    mvc-framework.test/profile/Ali -> Router extracts: {name} = Ali
        Browser URL
            |
            ↓
        Router captures parameter
            |
            ↓
        Controller/function receives parameter
            |
            ↓
           Output
*/