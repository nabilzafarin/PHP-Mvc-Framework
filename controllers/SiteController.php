<?php
/**
 * User: GulaHack
 * Date: 19/7/2026
 * Time: 3:07 PM
 */

namespace App\controllers;
use App\core\Application;
use App\core\Request;
use App\core\Controller;
use App\core\Response;
use App\models\ContactForm;

class SiteController extends Controller {

    public function home() {    
        $params = [
            'name' => "TheCodeholic"
        ];
        return $this->render('home', $params);
    }
    /*
        PASSING DATA FROM CONTROLLER TO VIEW
        - The data is for displaying in the HTML page.
            Controller
                |
                | send data
                ↓
               View
    */

    public function contact(Request $request, Response $response) {     // -- why we do inside this because some GET have parameter request
        // SUBTOPIC: IMPROVE FROM WIDGET WITH ABSTRACTION -- (Assign the model of contact page + add Request)
        $contact = new ContactForm();
        if($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks fo contacting us.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }

    /* SUBTOPIC: IMPROVE FROM WIDGET WITH ABSTRACTION -- (no need handleContact() function because already include inside contact() function )
    public function handleContact(Request $request) {    // -- handle will execute when we make post request on the contact form
        $body = $request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        exit;
        return "Handling submitted data";
    }*/
}