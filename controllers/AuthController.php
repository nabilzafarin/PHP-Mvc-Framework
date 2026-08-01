<?php
namespace App\controllers;

use App\core\Application;
use App\core\Request;
use App\core\Controller;
use App\core\Response;
use App\models\User;
use App\models\LoginForm;
use App\core\middlewares\AuthMiddleware;
/**
 * User: GulaHack
 * Date: 19/7/2026
 * Time: 8:36 PM
 */

Class AuthController extends Controller {

    /* SUBTOPIC-2: CREATE PROTECTED ROUTES -- (Add construct and 'profile' meaning restrict this profile page without session.) */
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));  // -- can be added example ['profile', 'info], so 2 pages are restrict
    }

    public function login(Request $request) {
        // Model Login
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            // Method POST
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                Application::$app->response->redirect('/');
                return;
            }
        }
        // Method GET
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request) {
        // Model User (Register)
        $user = new User();
        if ($request->isPost()) {
            // Method POST
            $user->loadData($request->getBody());
            
            if ($user->validate() && $user->save()){
                //header('Location: /'); 
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                exit;
            }

            /*echo '<pre>';
            var_dump($user->errors);
            echo '</pre>';
            exit;*/

            return $this->render('register', [
                'model' => $user
            ]);
        }
        //Method GET
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response) {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile() {
        return $this->render('profile');
    }
    
}