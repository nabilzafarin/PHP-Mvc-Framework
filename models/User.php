<?php
namespace App\models;

use App\core\UserModel;
use Override;

/**
 * User: GulaHack
 * Date: 27/7/2026
 * Time: 10:29 AM
 */

class User extends UserModel {
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETE = 2;

    // name must be same with html form name='..'
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password = '';
    public string $confirmPassword = '';
    // correction for new verions  8.2+ -- error deprecated. This variable should declare by auto at DB. 
    public ?string $id = null;
    public ?string $created_at = null;

    // Abstract DbModel Rules
    #[Override]
    public static function tableName(): string
    {
        return 'users';
    }

    #[Override]
    public function attributes(): array
    {
        return ['firstname', 'lastname', 'email', 'password', 'status'];
    }

    #[Override]
    public static function primaryKey(): string
    {
        return 'id';
    }

    // Abstract UserModel Rules
    #[Override]
    public function getDisplayName(): string {
        return $this->firstname.' '.$this->lastname;
    }

    //override parent labels methods inside parent (Model.php)
    public function labels(): array {
        return [
            'firstname' => 'First name',
            'lastname' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Confirm password'
        ];
    }

    public function rules(): array {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [ self::RULE_UNIQUE, 'class' => self::class ]], // -- add RULE_UNIQUE, 'class' => 'App\core\DbModel\User'
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function save() {
        // assign status
        $this->status = self::STATUS_INACTIVE;
        // encrypt the password
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }
}