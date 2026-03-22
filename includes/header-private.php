<?php
// ============================================================
// header-private.php — Private page header
// Include at the top of every PRIVATE page (after auth.php).
//
// Usage:
//   require_once __DIR__ . '/../includes/auth.php';     // FIRST
//   $page_title = 'Groceries';
//   require_once __DIR__ . '/../includes/header-private.php';
// ============================================================

$page_title = isset($page_title) ? $page_title . ' — Ops Hub' : 'M&F Legoas Ops Hub';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($page_title); ?></title>

  <!-- Never index private pages -->
  <meta name="robots" content="noindex, nofollow">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/assets/css/theme.css">
  <link rel="stylesheet" href="/assets/css/dashboard.css">
</head>
<body class="page-private">

<!-- ============================================================
     PRIVATE NAVIGATION
     ============================================================ -->
<nav class="nav-private" role="navigation" aria-label="Dashboard navigation">

  <a href="/dashboard.php" class="nav-logo">
    M<span>&</span>F <span style="color:rgba(255,255,255,0.3);font-weight:300;margin:0 4px;">|</span>
    <span style="color:rgba(255,255,255,0.5);font-weight:400;letter-spacing:0.04em;font-size:11px;">Ops Hub</span>
  </a>

  <div class="nav-user">
    <span class="nav-user-name">
      <?php echo htmlspecialchars($current_display_name); ?>
    </span>
    <a href="/logout.php" class="nav-signout">Sign out</a>
  </div>

</nav>
