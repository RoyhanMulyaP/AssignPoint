<?php

// Database connection details from .env or Config\Database.php
// But I can just use CI's DB object if I run it through spark or a custom controller.

namespace App\Controllers;

use Config\Database;

class DbFix extends BaseController
{
    public function index()
    {
        $db = Database::connect();
        
        $sql = "CREATE TABLE IF NOT EXISTS testimonials (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT(11) UNSIGNED NOT NULL,
            rating INT(1) NOT NULL,
            comment TEXT NOT NULL,
            status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
            created_at DATETIME DEFAULT NULL,
            updated_at DATETIME DEFAULT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
        )";

        try {
            $db->query($sql);
            
            // Add extra columns if they don't exist
            $db->query("ALTER TABLE users ADD COLUMN IF NOT EXISTS phone VARCHAR(20) AFTER email");
            $db->query("ALTER TABLE users ADD COLUMN IF NOT EXISTS job_title VARCHAR(100) AFTER phone");
            $db->query("ALTER TABLE users ADD COLUMN IF NOT EXISTS address TEXT AFTER job_title");
            $db->query("ALTER TABLE users ADD COLUMN IF NOT EXISTS bio TEXT AFTER address");
            $db->query("ALTER TABLE users ADD COLUMN IF NOT EXISTS avatar VARCHAR(255) AFTER bio");

            return "Table testimonials created and user fields added successfully!";
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
