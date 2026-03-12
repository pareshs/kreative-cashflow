/**
 * Kreative Cashflow — Main JavaScript
 * @version 1.0.0
 */
(function () {
  'use strict';

  // ── Sticky Header
  const header = document.getElementById('site-header');
  if (header) {
    const onScroll = () => {
      header.classList.toggle('scrolled', window.scrollY > 60);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  // ── Mobile Menu Toggle
  const menuToggle = document.getElementById('menu-toggle');
  const primaryNav = document.getElementById('primary-nav');

  if (menuToggle && primaryNav) {
    menuToggle.addEventListener('click', () => {
      const isOpen = menuToggle.classList.toggle('active');
      primaryNav.classList.toggle('mobile-open', isOpen);
      menuToggle.setAttribute('aria-expanded', isOpen.toString());
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    // Close on outside click
    document.addEventListener('click', (e) => {
      if (!primaryNav.contains(e.target) && !menuToggle.contains(e.target)) {
        menuToggle.classList.remove('active');
        primaryNav.classList.remove('mobile-open');
        menuToggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });

    // Close on ESC
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        menuToggle.classList.remove('active');
        primaryNav.classList.remove('mobile-open');
        menuToggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
  }

  // ── Scroll Animations (Intersection Observer)
  const animateEls = document.querySelectorAll('[data-animate]');
  if (animateEls.length && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
    );
    animateEls.forEach((el) => observer.observe(el));
  } else {
    // Fallback — just show everything
    animateEls.forEach((el) => el.classList.add('in-view'));
  }

  // ── Hero stat number counter animation
  const statNums = document.querySelectorAll('.hero-stat-num');
  if (statNums.length && 'IntersectionObserver' in window) {
    const counterObs = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const raw = el.textContent.trim();
        const prefix = raw.match(/^[^0-9]*/)[0];
        const suffix = raw.match(/[^0-9]*$/)[0];
        const num    = parseInt(raw.replace(/[^0-9]/g, ''), 10);
        if (isNaN(num)) return;

        let start = 0;
        const duration = 1200;
        const startTime = performance.now();

        const tick = (now) => {
          const elapsed = now - startTime;
          const progress = Math.min(elapsed / duration, 1);
          const ease = 1 - Math.pow(1 - progress, 3); // ease-out-cubic
          const current = Math.round(ease * num);
          el.textContent = prefix + current.toLocaleString() + suffix;
          if (progress < 1) requestAnimationFrame(tick);
        };

        requestAnimationFrame(tick);
        counterObs.unobserve(el);
      });
    }, { threshold: 0.5 });

    statNums.forEach((el) => counterObs.observe(el));
  }

  // ── Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', (e) => {
      const id = anchor.getAttribute('href').slice(1);
      const target = document.getElementById(id);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // ── Header hero background parallax (subtle)
  const hero = document.querySelector('.hero-section');
  const heroOrb = document.querySelector('.hero-orb');
  if (hero && heroOrb) {
    window.addEventListener('scroll', () => {
      const scrolled = window.scrollY;
      if (scrolled < window.innerHeight) {
        heroOrb.style.transform = `translateY(calc(-50% + ${scrolled * 0.15}px))`;
      }
    }, { passive: true });
  }

  // ── Property card hover — image zoom via JS (enhances CSS)
  document.querySelectorAll('.property-card').forEach((card) => {
    card.addEventListener('mouseenter', () => card.classList.add('hovered'));
    card.addEventListener('mouseleave', () => card.classList.remove('hovered'));
  });

  // ── Testimonials — simple auto-scroll on mobile
  const testimonialGrid = document.querySelector('.testimonials-grid');
  if (testimonialGrid && window.innerWidth < 640) {
    let currentIndex = 0;
    const cards = testimonialGrid.querySelectorAll('.testimonial-card');
    if (cards.length > 1) {
      setInterval(() => {
        currentIndex = (currentIndex + 1) % cards.length;
        cards[currentIndex].scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
      }, 5000);
    }
  }

  // ── Contact form AJAX (if using custom form action)
  const contactForm = document.querySelector('#kc-contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', async (e) => {
      const submitBtn = contactForm.querySelector('[type="submit"]');
      if (!submitBtn) return;

      // Let WordPress / CF7 / WPForms handle if present
      if (contactForm.dataset.plugin) return;

      e.preventDefault();
      const originalText = submitBtn.textContent;
      submitBtn.textContent = 'Sending...';
      submitBtn.disabled = true;

      const formData = new FormData(contactForm);
      formData.append('action', 'kc_contact_submit');
      formData.append('nonce', kcData.nonce);

      try {
        const res = await fetch(kcData.ajaxUrl, { method: 'POST', body: formData });
        const data = await res.json();

        if (data.success) {
          contactForm.innerHTML = '<div style="padding:32px;text-align:center;"><div style="font-family:var(--font-serif);font-size:1.8rem;font-style:italic;color:var(--slate);margin-bottom:12px;">Thank you!</div><p>We\'ll be in touch within 1 business day.</p></div>';
        } else {
          submitBtn.textContent = originalText;
          submitBtn.disabled = false;
          alert(data.data || 'Something went wrong. Please try again.');
        }
      } catch {
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
        alert('Something went wrong. Please try again.');
      }
    });
  }

  // ── Lazy load images (native + polyfill)
  document.querySelectorAll('img[loading="lazy"]').forEach((img) => {
    if ('loading' in HTMLImageElement.prototype) return;
    // Fallback for older browsers
    const observer = new IntersectionObserver(([entry]) => {
      if (entry.isIntersecting) {
        img.src = img.dataset.src || img.src;
        observer.unobserve(img);
      }
    });
    observer.observe(img);
  });

})();
