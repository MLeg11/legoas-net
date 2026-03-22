<?php
// ============================================================
// auth.php — Session authentication check
//
// Include this ONE LINE at the very top of every private page:
//   require_once __DIR__ . '/../includes/auth.php';
//
// That's it. If the user isn't logged in, they're redirected
// to login.php automatically. Nothing else needed.
// ============================================================

require_once __DIR__ . '/config.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user']) || !isset($_SESSION['last_active'])) {
    // Not logged in — redirect to login with return URL
    // After login, they'll be sent back to where they tried to go
    $redirect = urlencode($_SERVER['REQUEST_URI']);
    header('Location: /login.php?redirect=' . $redirect);
    exit;
}

// Check session timeout — log out inactive users
if ((time() - $_SESSION['last_active']) > SESSION_TIMEOUT) {
    session_unset();
    session_destroy();
    header('Location: /login.php?reason=timeout');
    exit;
}

// User is valid — refresh the activity timestamp
$_SESSION['last_active'] = time();

// Make current user available to the page as a variable
$current_user         = $_SESSION['user'];
$current_display_name = DISPLAY_NAMES[$current_user] ?? ucfirst($current_user);
