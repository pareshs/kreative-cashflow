/**
 * Kreative Cashflow — Main JavaScript (Bootstrap 5.3)
 * @version 3.0.0
 */
(function () {
  'use strict';

  // Sticky Navbar
  const navbar = document.getElementById('main-navbar');
  if (navbar) {
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.scrollY > 60);
    }, { passive: true });
  }

  // Scroll Animations
  const animateEls = document.querySelectorAll('[data-animate]');
  if (animateEls.length && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    animateEls.forEach((el) => observer.observe(el));
  }

  // Counter Animation for Stats
  const statNums = document.querySelectorAll('.hero-stat-num');
  if (statNums.length) {
    const counterObs = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const raw = el.textContent.trim();
        const prefix = raw.match(/^[^0-9]*/)[0];
        const suffix = raw.match(/[^0-9]*$/)[0];
        const num = parseInt(raw.replace(/[^0-9]/g, ''), 10);
        if (isNaN(num)) return;

        let current = 0;
        const duration = 1200;
        const startTime = performance.now();

        const tick = (now) => {
          const elapsed = now - startTime;
          const progress = Math.min(elapsed / duration, 1);
          const ease = 1 - Math.pow(1 - progress, 3);
          current = Math.round(ease * num);
          el.textContent = prefix + current.toLocaleString() + suffix;
          if (progress < 1) requestAnimationFrame(tick);
        };

        requestAnimationFrame(tick);
        counterObs.unobserve(el);
      });
    }, { threshold: 0.5 });
    statNums.forEach((el) => counterObs.observe(el));
  }

})();
