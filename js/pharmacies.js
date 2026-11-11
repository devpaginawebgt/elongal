/* ── Page script ─────────────────────────────────────────────── */

gsap.registerPlugin(ScrollTrigger);

/* ── Card hover (desktop only) ───────────────────────────────── */
(() => {
  if (!window.matchMedia('(hover: hover)').matches) return;
  document.querySelectorAll('.ph-pharmacy-card').forEach(card => {
    const btn = card.querySelector('.ph-pharmacy-btn');
    if (!btn || btn.getAttribute('aria-disabled')) return;

    const tl = gsap.timeline({ paused: true });
    tl.to(card, { scale: 1.03, boxShadow: '0 8px 28px rgba(81,40,136,0.14)', duration: 0.22, ease: 'power2.out' }, 0)
      .to(btn,  { backgroundColor: '#702082', color: '#fff', borderColor: '#512888', duration: 0.22 }, 0);

    card.addEventListener('mouseenter', () => tl.play());
    card.addEventListener('mouseleave', () => tl.reverse());
  });
})();

/* ── Card entrance (scroll) ──────────────────────────────────── */
(() => {
  if (!document.getElementById('ph-grid')) return;

  gsap.from('.ph-pharmacy-card', {
    y: 50, opacity: 0, stagger: 0.06, duration: 0.5, ease: 'power2.out',
    scrollTrigger: {
      trigger: '#ph-grid',
      start:   'top 75%',
      end:     'top 30%',
      scrub:   0.8,
    },
  });
})();

/* ── Hero entrance (time-based) ──────────────────────────────── */
(() => {
  if (!document.getElementById('ph-hero')) return;

  gsap.timeline({ defaults: { ease: 'power3.out' } })
    .from('#ph-breadcrumb',    { y: -15, opacity: 0, duration: 0.5 },  0.1)
    .from('#info-search-text', { y: 30,  opacity: 0, duration: 0.6 },  0.35)
    .from('#ph-search',        { y: 20,  opacity: 0, duration: 0.5 },  0.65);
})();

/* ── Grid section header entrance ────────────────────────────── */
(() => {
  const section = document.getElementById('ph-grid-section');
  if (!section) return;

  gsap.from(['#ph-grid-title', '#ph-grid-subtitle'], {
    y: 40, opacity: 0, stagger: 0.12,
    scrollTrigger: {
      trigger: section,
      start:   'top 70%',
      end:     'top 40%',
      scrub:   0.8,
    },
  });

  gsap.from('#ph-disclaimer', {
    y: 20, opacity: 0,
    scrollTrigger: {
      trigger: '#ph-disclaimer',
      start:   'top 90%',
      end:     'top 70%',
      scrub:   0.8,
    },
  });
})();

/* ── FAQ CTA: entrance + hover ───────────────────────────────── */
(() => {
  const section = document.getElementById('ph-faq-cta');
  const text    = document.getElementById('ph-faq-text');
  const btn     = document.getElementById('ph-faq-btn');
  if (!section || !text || !btn) return;

  gsap.set(text, { x: -50, opacity: 0 });
  gsap.set(btn,  { x:  50, opacity: 0 });

  ScrollTrigger.create({
    trigger: section,
    start:   'top 90%',
    once:    true,
    onEnter: () => {
      gsap.to(text, { x: 0, opacity: 1, duration: 0.6, ease: 'power2.out' });
      gsap.to(btn,  { x: 0, opacity: 1, duration: 0.6, ease: 'power2.out', delay: 0.15 });
    },
  });

  if (window.matchMedia('(hover: hover)').matches) {
    const hoverTl = gsap.timeline({ paused: true });
    hoverTl.to(btn, { backgroundColor: '#512888', color: '#fff', borderColor: '#512888', duration: 0.25, ease: 'power2.out' });
    btn.addEventListener('mouseenter', () => hoverTl.play());
    btn.addEventListener('mouseleave', () => hoverTl.reverse());
  }
})();
