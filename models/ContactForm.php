<?php 
namespace App\models;

use App\core\Model;
use Override;

/**
 * User: GulaHack
 * Date: 1/8/2026
 * Time: 1:47 AM
 */

// SUBTOPIC: IMPROVE FROM WIDGET WITH ABSTRACTION -- (Make the html contact.php using widget Field and Form, instead <input>)
class ContactForm extends Model {
    public string $subject = '';
    public string $email = '';
    public string $body = '';

    #[Override]
    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED],
            'body' => [self::RULE_REQUIRED],
        ];
    }

    #[Override]
    public function labels(): array
    {
        return [
            'subject' => 'Enter your subject',
            'email' => 'Your email',
            'body' => 'Body'
        ];
    }

    
    public function send() {
        // -- refer the LoginForm to save()
        return true;
    }
}