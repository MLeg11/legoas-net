
<!-- ============================================================
     PRIVATE BOTTOM NAV (mobile only)
     ============================================================ -->
<nav class="bottom-nav-private" role="navigation" aria-label="Dashboard mobile navigation">
  <a href="/dashboard.php">
    <div class="bottom-nav-icon <?php echo basename($_SERVER['PHP_SELF']) === 'dashboard.php' ? 'active' : ''; ?>"></div>
    <span class="bn-label <?php echo basename($_SERVER['PHP_SELF']) === 'dashboard.php' ? 'active' : ''; ?>">Home</span>
  </a>
  <a href="/groceries.php">
    <div class="bottom-nav-icon"></div>
    <span class="bn-label">Groceries</span>
  </a>
  <a href="/todos.php">
    <div class="bottom-nav-icon"></div>
    <span class="bn-label">Todos</span>
  </a>
  <a href="/logout.php">
    <div class="bottom-nav-icon"></div>
    <span class="bn-label">Sign out</span>
  </a>
</nav>

<script src="/assets/js/main.js"></script>
</body>
</html>
