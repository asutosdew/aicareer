<?php
/**
 * Site Configuration
 * PsychFiTech - Digital Life, Career & Money
 * Designed for cPanel Hosting
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    // Set secure session cookie parameters
    session_set_cookie_params([
        'lifetime' => 86400 * 7, // 7 days
        'path' => '/',
        'domain' => '',
        'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    session_start();
}

// Site Meta
define('SITE_NAME', 'PsychFiTech® | डिजिटल स्कूल');
define('SITE_TAGLINE', 'AI सीखें | Business बढ़ाएँ | डिजिटल दुनिया में सही निर्णय, बेहतर करियर और पैसे की समझ');
define('AUTHOR_NAME', 'सुनील कोसारिया (Sunil Kosariya)');
define('AUTHOR_BOOK', 'THE GREAT ECONOMIC DIVIDE');
define('SITE_EMAIL', 'contact@psychfitech.com');
define('SITE_PHONE', '+91 98765 43210');

// ====================================================================
// WHATSAPP COMMUNITY CONFIGURATION
// Replace with your actual WhatsApp Group / Community invite link
// ====================================================================
define('WHATSAPP_COMMUNITY_URL', 'https://chat.whatsapp.com/invite/PsychFiTechOfficial');
define('WHATSAPP_COMMUNITY_NAME', 'PsychFiTech® AI & Career Official Community');

// Base URL calculation
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$script_dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$base_path = ($script_dir === '/' || $script_dir === '.') ? '' : $script_dir;

// If inside /dashboard, strip that from base path
if (substr($base_path, -10) === '/dashboard') {
    $base_path = substr($base_path, 0, -10);
}

define('BASE_URL', rtrim($protocol . $host . $base_path, '/'));
define('APP_PATH', dirname(__DIR__));
