<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
 * User: GulaHack
 * Date: 28/7/2026
 * Time: 9:52 AM
 */
use App\core\Application;

require_once __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load(); // to using/access ENV folder 

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(__DIR__, $config);
/*
    echo "<pre>";
    var_dump($_ENV);
    var_dump($_ENV['DB_DSN'] ?? null);
    var_dump($_ENV['DB_USER'] ?? null);
    var_dump($_ENV['DB_PASSWORD'] ?? null);
    exit;
*/
$app->db->appyMigrations();