
<!-- ============================================================
     BOTTOM NAV (mobile only — shown via CSS on small screens)
     ============================================================ -->
<nav class="bottom-nav" role="navigation" aria-label="Mobile bottom navigation">
  <a href="/" class="bottom-nav-item">
    <div class="bottom-nav-icon <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : ''; ?>"></div>
    <span class="bottom-nav-label <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : ''; ?>">Home</span>
  </a>
  <a href="/about.php" class="bottom-nav-item">
    <div class="bottom-nav-icon <?php echo basename($_SERVER['PHP_SELF']) === 'about.php' ? 'active' : ''; ?>"></div>
    <span class="bottom-nav-label <?php echo basename($_SERVER['PHP_SELF']) === 'about.php' ? 'active' : ''; ?>">About</span>
  </a>
  <a href="/contact.php" class="bottom-nav-item">
    <div class="bottom-nav-icon <?php echo basename($_SERVER['PHP_SELF']) === 'contact.php' ? 'active' : ''; ?>"></div>
    <span class="bottom-nav-label <?php echo basename($_SERVER['PHP_SELF']) === 'contact.php' ? 'active' : ''; ?>">Contact</span>
  </a>
  <a href="/login.php" class="bottom-nav-item">
    <div class="bottom-nav-icon"></div>
    <span class="bottom-nav-label" style="color:var(--accent);">Sign in</span>
  </a>
</nav>

<script src="/assets/js/main.js"></script>
</body>
</html>
