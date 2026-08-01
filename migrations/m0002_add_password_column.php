<?php

use App\core\Application;

/**
 * User: GulaHack
 * Date: 28/7/2026
 * Time: 10:50 AM
 */

class m0002_add_password_column {
    public function up() {
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL");
    }

    public function down() {
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE users DROP COLUMN password");
    }
}