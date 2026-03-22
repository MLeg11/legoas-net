<?php
// ============================================================
// index.php — Public homepage
// Picks a random hero photo from assets/images/hero/
// Falls back to the original background_home.jpg if none found.
// ============================================================

// Find all hero photos
$hero_dir    = __DIR__ . '/assets/images/hero/';
$hero_photos = [];

if (is_dir($hero_dir)) {
    $files = glob($hero_dir . '*.{jpg,jpeg,png,webp}', GLOB_BRACE);
    if ($files) {
        // Convert absolute paths to web-relative paths
        $hero_photos = array_map(function($f) {
            return '/assets/images/hero/' . basename($f);
        }, $files);
    }
}

// Fallback to original photo if hero folder is empty
$bg_photo = !empty($hero_photos)
    ? $hero_photos[array_rand($hero_photos)]
    : '/background_home.jpg';

$page_title = 'Home';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero background photo -->
<div class="hero-bg" style="background-image: url('<?php echo htmlspecialchars($bg_photo); ?>'); opacity: 0; transition: opacity 0.6s ease;"></div>
<div class="hero-overlay"></div>

<!-- Main hero content -->
<main class="hero-content" role="main">
  <div class="glass-card">

    <p class="hero-eyebrow">Welcome home</p>
    <h1 class="hero-title">Legoas<br>Family Hub</h1>
    <p class="hero-subtitle">
      Your home, your life,<br>everything in one place.
    </p>

    <div class="hero-divider"></div>

    <!-- Quick access grid — links to private apps after sign in -->
    <div class="quick-links">

      <a href="/login.php" class="quick-link">
        <div class="quick-link-dot" style="background: #C9954C;"></div>
        <div class="quick-link-name">Groceries</div>
        <div class="quick-link-desc">Shared list</div>
      </a>

      <a href="/login.php" class="quick-link">
        <div class="quick-link-dot" style="background: #7ec8a0;"></div>
        <div class="quick-link-name">Home hub</div>
        <div class="quick-link-desc">House info</div>
      </a>

      <a href="/login.php" class="quick-link">
        <div class="quick-link-dot" style="background: #7aafdf;"></div>
        <div class="quick-link-name">To-dos</div>
        <div class="quick-link-desc">Our lists</div>
      </a>

      <a href="/login.php" class="quick-link">
        <div class="quick-link-dot" style="background: #c47ec8;"></div>
        <div class="quick-link-name">Recipes</div>
        <div class="quick-link-desc">Family book</div>
      </a>

    </div>
  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
