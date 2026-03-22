<?php
// ============================================================
// logout.php — Ends the user session
// Simple and thorough — clears everything, then redirects.
// ============================================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Clear all session variables
session_unset();

// Destroy the session on the server
session_destroy();

// Also clear the session cookie in the browser
// Without this, the browser keeps the cookie until it expires naturally
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// Redirect to login page
header('Location: /login.php');
exit;
