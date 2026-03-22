<?php
// ============================================================
// dashboard.php — Private family dashboard
// The main hub page after signing in.
// ============================================================

// Auth check MUST be first — before any output
require_once __DIR__ . '/includes/auth.php';

$page_title = 'Dashboard';
require_once __DIR__ . '/includes/header-private.php';

// Determine greeting based on time of day
$hour = (int) date('G');
if ($hour < 12) {
    $greeting = 'Good morning';
} elseif ($hour < 17) {
    $greeting = 'Good afternoon';
} else {
    $greeting = 'Good evening';
}
?>

<main class="page-wrapper" role="main">

  <!-- Page header -->
  <header class="page-header">
    <p class="page-eyebrow">M&amp;F Legoas Ops Hub</p>
    <h1 class="page-title"><?php echo $greeting; ?>, <?php echo htmlspecialchars($current_display_name); ?>.</h1>
    <p class="page-subtitle"><?php echo date('l, F j, Y'); ?></p>
  </header>

  <!-- Daily use apps -->
  <p class="section-label">Daily</p>
  <div class="app-grid">

    <a href="/groceries.php" class="app-card">
      <div class="app-card-icon" style="background: rgba(201,149,76,0.15);">🛒</div>
      <div class="app-card-name">Groceries</div>
      <div class="app-card-desc">Shared list for both of you</div>
      <span class="app-card-badge soon">Coming soon</span>
    </a>

    <a href="/todos.php" class="app-card">
      <div class="app-card-icon" style="background: rgba(126,200,160,0.15);">✓</div>
      <div class="app-card-name">To-dos</div>
      <div class="app-card-desc">House tasks and reminders</div>
      <span class="app-card-badge soon">Coming soon</span>
    </a>

    <a href="/recipes.php" class="app-card">
      <div class="app-card-icon" style="background: rgba(196,126,200,0.15);">🍽</div>
      <div class="app-card-name">Recipes</div>
      <div class="app-card-desc">Family recipe book</div>
      <span class="app-card-badge soon">Coming soon</span>
    </a>

    <a href="/finances.php" class="app-card">
      <div class="app-card-icon" style="background: rgba(122,175,223,0.15);">$</div>
      <div class="app-card-name">Finances</div>
      <div class="app-card-desc">Budget and spending</div>
      <span class="app-card-badge soon">Coming soon</span>
    </a>

  </div>

  <!-- Home management apps -->
  <p class="section-label">Home</p>
  <div class="app-grid">

    <a href="/home-hub.php" class="app-card">
      <div class="app-card-icon" style="background: rgba(201,149,76,0.10);">🏠</div>
      <div class="app-card-name">Home hub</div>
      <div class="app-card-desc">Appliances, docs, resources</div>
      <span class="app-card-badge soon">Coming soon</span>
    </a>

    <a href="/maintenance.php" class="app-card">
      <div class="app-card-icon" style="background: rgba(126,200,160,0.10);">🔧</div>
      <div class="app-card-name">Maintenance</div>
      <div class="app-card-desc">Car and house logs</div>
      <span class="app-card-badge soon">Coming soon</span>
    </a>

  </div>

</main>

<?php require_once __DIR__ . '/includes/footer-private.php'; ?>
