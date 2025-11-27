<?php
/**
 * Configuration File
 * Contains all configuration settings for the portfolio
 */

// Error Reporting (Set to 0 in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Timezone
date_default_timezone_set('Asia/Kolkata');

// Email Configuration
define('CONTACT_EMAIL', 'your.email@example.com'); // Change this to your email
define('SITE_NAME', 'My Portfolio');
define('SITE_URL', 'http://localhost/portfolio');

// SMTP Configuration (Optional - for better email delivery)
// If you want to use SMTP instead of PHP mail(), uncomment and configure:
/*
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your.email@gmail.com');
define('SMTP_PASSWORD', 'your-app-password');
define('SMTP_ENCRYPTION', 'tls');
*/

// Security Settings
define('ENABLE_CSRF', true);
define('RATE_LIMIT_ENABLED', false); // Disabled for testing - enable in production!
define('MAX_REQUESTS_PER_HOUR', 5); // Maximum contact form submissions per hour per IP

// Session Configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// CSRF Token Generation
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Verify CSRF Token
function verifyCSRFToken($token) {
    if (!ENABLE_CSRF) return true;
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Rate Limiting
function checkRateLimit() {
    if (!RATE_LIMIT_ENABLED) return true;
    
    $ip = $_SERVER['REMOTE_ADDR'];
    $key = 'rate_limit_' . md5($ip);
    
    if (!isset($_SESSION[$key])) {
        $_SESSION[$key] = [
            'count' => 0,
            'reset_time' => time() + 3600 // 1 hour
        ];
    }
    
    // Reset if time expired
    if (time() > $_SESSION[$key]['reset_time']) {
        $_SESSION[$key] = [
            'count' => 0,
            'reset_time' => time() + 3600
        ];
    }
    
    // Check limit
    if ($_SESSION[$key]['count'] >= MAX_REQUESTS_PER_HOUR) {
        return false;
    }
    
    $_SESSION[$key]['count']++;
    return true;
}

// Sanitize Input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Validate Email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'portfolio');
define('DB_USER', 'root');
define('DB_PASS', '');

function getDBConnection() {
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
        return $pdo;
    } catch(PDOException $e) {
        error_log("Database connection failed: " . $e->getMessage());
        return null;
    }
}
?>
