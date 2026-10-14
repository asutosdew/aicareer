<?php
/**
 * Helper Functions
 * PsychFiTech - Digital Life, Career & Money
 */

require_once __DIR__ . '/config.php';

/**
 * Sanitize string output for HTML
 */
function e($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Sanitize incoming user input
 */
function clean_input($data) {
    if (is_array($data)) {
        return array_map('clean_input', $data);
    }
    return trim(strip_tags($data ?? ''));
}

/**
 * Generate CSRF Token
 */
function csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Render CSRF Hidden Field
 */
function csrf_field() {
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}

/**
 * Verify CSRF Token
 */
function verify_csrf() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $token = $_POST['csrf_token'] ?? '';
        if (empty($token) || !hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
            die('Invalid CSRF Token. Please refresh the page and try again.');
        }
    }
}

/**
 * Check if user is logged in
 */
function is_logged_in() {
    return !empty($_SESSION['user_id']);
}

/**
 * Get logged-in user data
 */
function current_user() {
    if (!is_logged_in()) {
        return null;
    }
    return [
        'id' => $_SESSION['user_id'],
        'name' => $_SESSION['user_name'] ?? 'Student',
        'email' => $_SESSION['user_email'] ?? '',
        'role' => $_SESSION['user_role'] ?? 'student',
        'qualification' => $_SESSION['user_qualification'] ?? '',
        'career_interest' => $_SESSION['user_interest'] ?? ''
    ];
}

/**
 * Require login guard
 */
function require_auth() {
    if (!is_logged_in()) {
        set_flash('error', 'कृपया इस पैनल को देखने के लिए पहले लॉगिन करें। (Please login to access the dashboard and services)');
        header('Location: ' . BASE_URL . '/login.php');
        exit;
    }
}

/**
 * Flash message setter
 */
function set_flash($type, $message) {
    $_SESSION['flash'] = [
        'type' => $type, // 'success', 'error', 'info', 'warning'
        'message' => $message
    ];
}

/**
 * Flash message getter
 */
function get_flash() {
    if (!empty($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

/**
 * Safe redirect
 */
function redirect($url) {
    header("Location: " . $url);
    exit;
}
