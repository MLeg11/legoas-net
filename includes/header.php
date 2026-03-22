<?php
// ============================================================
// header.php — Public page header
// Include at the top of every PUBLIC page.
// Sets the page title and outputs <head> + nav.
//
// Usage:
//   $page_title = 'About';  // optional, defaults to site name
//   require_once __DIR__ . '/includes/header.php';
// ============================================================

// Default title if not set by the page
$page_title = isset($page_title) ? $page_title . ' — Legoas.net' : 'Legoas.net';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($page_title); ?></title>

  <!-- Prevent search engines from indexing private-feeling content -->
  <meta name="robots" content="noindex, nofollow">

  <!-- Outfit font — two weights cover everything we need -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Stylesheets — order matters: theme vars first, then main styles -->
  <link rel="stylesheet" href="/assets/css/theme.css">
  <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>

<!-- ============================================================
     PUBLIC NAVIGATION
     ============================================================ -->
<nav class="nav" role="navigation" aria-label="Main navigation">

  <!-- Logo -->
  <a href="/" class="nav-logo" aria-label="Legoas.net home">
    LEGOAS<span>.</span>NET
  </a>

  <!-- Desktop nav links — hidden on mobile via CSS -->
  <ul class="nav-links" role="list">
    <li><a href="/about.php">About</a></li>
    <li><a href="/contact.php">Contact</a></li>
  </ul>

  <!-- Right side: hamburger (mobile) + sign in button -->
  <div style="display:flex;align-items:center;gap:12px;">
    <button
      class="nav-hamburger"
      id="nav-hamburger"
      aria-expanded="false"
      aria-controls="nav-drawer"
      aria-label="Open menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <a href="/login.php" class="nav-signin">Sign in</a>
  </div>

</nav>

<!-- Mobile drawer nav -->
<div class="nav-drawer" id="nav-drawer" role="navigation" aria-label="Mobile navigation">
  <a href="/">Home</a>
  <a href="/about.php">About</a>
  <a href="/contact.php">Contact</a>
  <a href="/login.php" style="color: var(--accent);">Sign in</a>
</div>
