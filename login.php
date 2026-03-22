<?php
// ============================================================
// login.php — Login page
// Handles both GET (show form) and POST (process credentials).
// On success: redirects to dashboard or the page they came from.
// On failure: shows error, does NOT reveal which field was wrong.
//   (Never say "wrong password" — that confirms the username exists)
// ============================================================

require_once __DIR__ . '/includes/config.php';

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If already logged in and session is still valid, go to dashboard
if (isset($_SESSION['user']) && isset($_SESSION['last_active'])) {
    if ((time() - $_SESSION['last_active']) <= SESSION_TIMEOUT) {
        header('Location: /dashboard.php');
        exit;
    }
}

$error   = '';
$timeout = isset($_GET['reason']) && $_GET['reason'] === 'timeout';

// Where to redirect after successful login
// If they were trying to visit a specific page, send them there
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : '/dashboard.php';

// Only allow redirects to our own site (prevent open redirect attacks)
// An open redirect would allow: /login.php?redirect=https://evil.com
if (!preg_match('/^\/[a-zA-Z0-9\/_\-\.]*$/', $redirect)) {
    $redirect = '/dashboard.php';
}

// ============================================================
// PROCESS LOGIN FORM SUBMISSION
// ============================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Basic validation — don't hit the database with empty fields
    if (empty($username) || empty($password)) {
        $error = 'Please enter your username and password.';

    } elseif (isset(USERS[$username]) && password_verify($password, USERS[$username])) {
        // Credentials are correct

        // Regenerate session ID on login — prevents session fixation attacks
        // (An attacker can't steal a session ID they planted before you logged in)
        session_regenerate_id(true);

        // Store user in session
        $_SESSION['user']        = $username;
        $_SESSION['last_active'] = time();

        // Send them where they were going
        header('Location: ' . $redirect);
        exit;

    } else {
        // Wrong username or password — deliberately vague message
        $error = 'Incorrect username or password.';

        // Small delay to slow down brute-force attempts
        // 0.5 seconds — barely noticeable to real users, painful for bots
        usleep(500000);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in — Legoas Ops Hub</title>
  <meta name="robots" content="noindex, nofollow">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/assets/css/theme.css">
  <link rel="stylesheet" href="/assets/css/login.css">
</head>
<body>

<main class="login-page" role="main">
  <div class="login-card">

    <!-- Monogram -->
    <div class="login-monogram" aria-hidden="true">
      <span>M&amp;F</span>
    </div>

    <h1 class="login-title">Welcome back</h1>
    <p class="login-subtitle">Sign in to your family hub</p>

    <!-- Session timeout notice -->
    <?php if ($timeout): ?>
      <div class="login-timeout" role="alert">
        You were signed out after a period of inactivity.
      </div>
    <?php endif; ?>

    <!-- Error message -->
    <?php if ($error): ?>
      <div class="login-error" role="alert">
        <?php echo htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>

    <!-- Login form -->
    <form method="post" action="/login.php?redirect=<?php echo urlencode($redirect); ?>" novalidate>

      <div class="form-group">
        <label class="form-label" for="username">Username</label>
        <input
          class="form-input"
          type="text"
          id="username"
          name="username"
          autocomplete="username"
          autocapitalize="none"
          spellcheck="false"
          value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
          required>
      </div>

      <div class="form-group">
        <label class="form-label" for="password">Password</label>
        <input
          class="form-input"
          type="password"
          id="password"
          name="password"
          autocomplete="current-password"
          required>
      </div>

      <button class="form-submit" type="submit">Sign in</button>

    </form>

    <a href="/" class="login-back">← Back to legoas.net</a>

  </div>
</main>

</body>
</html>
