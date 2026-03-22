/*
 * main.js — Site-wide JavaScript
 * Kept minimal on purpose. Only handles UI interactions.
 * No frameworks, no dependencies. Vanilla JS only.
 */

document.addEventListener('DOMContentLoaded', function () {

  // ============================================================
  // MOBILE NAV DRAWER
  // Toggles the slide-down nav menu on mobile.
  // ============================================================
  const hamburger = document.getElementById('nav-hamburger');
  const drawer    = document.getElementById('nav-drawer');

  if (hamburger && drawer) {
    hamburger.addEventListener('click', function () {
      const isOpen = drawer.classList.toggle('open');
      // Update aria-expanded for accessibility
      hamburger.setAttribute('aria-expanded', isOpen);
    });

    // Close drawer when any link inside it is clicked
    drawer.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        drawer.classList.remove('open');
        hamburger.setAttribute('aria-expanded', false);
      });
    });

    // Close drawer when clicking outside it
    document.addEventListener('click', function (e) {
      if (!drawer.contains(e.target) && !hamburger.contains(e.target)) {
        drawer.classList.remove('open');
        hamburger.setAttribute('aria-expanded', false);
      }
    });
  }

  // ============================================================
  // HERO BACKGROUND FADE-IN
  // Prevents the background photo from popping in.
  // The body starts transparent and fades to full opacity
  // once the background image has loaded.
  // ============================================================
  const heroBg = document.querySelector('.hero-bg');

  if (heroBg) {
    const bgImage = window.getComputedStyle(heroBg).backgroundImage;
    // Extract URL from "url('...')"
    const urlMatch = bgImage.match(/url\(["']?(.+?)["']?\)/);

    if (urlMatch) {
      const img = new Image();
      img.onload = function () {
        heroBg.style.opacity = '1';
      };
      img.onerror = function () {
        // If image fails to load, still show the page
        heroBg.style.opacity = '1';
      };
      img.src = urlMatch[1];
    }
  }

});
