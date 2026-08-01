<?php
namespace App\models;

use App\core\Application;
use App\core\Model;

/**
 * User: GulaHack
 * Date: 30/7/2026
 * Time: 11:53 AM
 */

class LoginForm extends Model {

    public string $email = '';
    public string $password = '';

    public function rules(): array {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array {
        return [
            'email' => 'Your email',
            'password' => 'Password'
        ];
    }

    public function login(): bool {
        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'User does not exist with this email');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        // echo '<pre>';
        // var_dump($user);
        // echo '</pre>';
        // exit;
        return Application::$app->login($user);
    }
}