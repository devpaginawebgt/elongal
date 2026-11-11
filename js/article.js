/* ── Hero entrance (time-based) ──────────────────────────────────── */
(function () {
    var badge    = document.getElementById('article-hero-badge');
    var title    = document.getElementById('article-hero-title');
    var subtitle = document.getElementById('article-hero-subtitle');
    if (!badge) return;

    var items = [badge, title, subtitle].filter(Boolean);
    gsap.set(items, { x: -40, autoAlpha: 0 });
    gsap.to(items, {
        x: 0, autoAlpha: 1,
        duration: 0.8, ease: 'power3.out',
        stagger: 0.12, delay: 0.2,
    });
})();

/* ── Sidebar entrance ─────────────────────────────────────────────── */
(function () {
    gsap.registerPlugin(ScrollTrigger);

    var sidebar = document.getElementById('article-sidebar');
    if (!sidebar) return;

    var cards = Array.from(sidebar.children);
    gsap.from(cards, {
        x: -50, autoAlpha: 0,
        duration: 0.7, stagger: 0.15, ease: 'power2.out',
        scrollTrigger: {
            trigger: sidebar,
            start: 'top 70%',
            toggleActions: 'play none none none',
        },
    });
})();

/* ── Article header entrance ─────────────────────────────────────── */
(function () {
    gsap.registerPlugin(ScrollTrigger);

    var header = document.getElementById('article-header');
    if (!header) return;

    var els = Array.from(header.children);
    gsap.from(els, {
        y: 40, autoAlpha: 0,
        duration: 0.7, stagger: 0.1, ease: 'power2.out',
        scrollTrigger: {
            trigger: header,
            start: 'top 70%',
            toggleActions: 'play none none none',
        },
    });
})();

/* ── Article sections entrance (scroll scrub) ────────────────────── */
(function () {
    gsap.registerPlugin(ScrollTrigger);

    var sections = document.querySelectorAll('.article-section');
    if (!sections.length) return;

    sections.forEach(function (section) {
        var h2    = section.querySelector('h2');
        var h3    = section.querySelector('h3');
        var paras = Array.from(section.querySelectorAll('p, figure'));

        if (h2) {
            gsap.set(h2, { y: 40, autoAlpha: 0 });
            gsap.to(h2, {
                y: 0, autoAlpha: 1, ease: 'power2.out',
                scrollTrigger: {
                    trigger: h2,
                    start: 'top 90%',
                    end:   'top 20%',
                    scrub: 0.8,
                },
            });
        }

        if (h3) {
            gsap.set(h3, { y: 30, autoAlpha: 0 });
            gsap.to(h3, {
                y: 0, autoAlpha: 1, ease: 'power2.out',
                scrollTrigger: {
                    trigger: h3,
                    start: 'top 90%',
                    end:   'top 20%',
                    scrub: 0.8,
                },
            });
        }

        if (paras.length) {
            gsap.set(paras, { y: 30, autoAlpha: 0 });
            gsap.to(paras, {
                y: 0, autoAlpha: 1, stagger: 0.08, ease: 'power2.out',
                scrollTrigger: {
                    trigger: paras[0],
                    start: 'top 90%',
                    end:   'top 20%',
                    scrub: 0.8,
                },
            });
        }
    });
})();

/* ── Reference items entrance (scroll scrub) ─────────────────────── */
(function () {
    gsap.registerPlugin(ScrollTrigger);

    var items = document.querySelectorAll('.reference-item');
    if (!items.length) return;

    gsap.set(items, { x: -40, autoAlpha: 0 });
    gsap.to(items, {
        x: 0, autoAlpha: 1, stagger: 0.1, ease: 'power2.out',
        scrollTrigger: {
            trigger: items[0],
            start: 'top 90%',
            end:   'top 20%',
            scrub: 0.8,
        },
    });
})();

/* ── TOC active tracking (IntersectionObserver) ──────────────────── */
(function () {
    var tocLinks = document.querySelectorAll('.toc-link');
    if (!tocLinks.length) return;

    var sections = Array.from(tocLinks).map(function (link) {
        return document.getElementById(link.getAttribute('href').replace('#', ''));
    }).filter(Boolean);

    function setActive(id) {
        tocLinks.forEach(function (link) {
            link.classList.toggle('is-active', link.getAttribute('href') === '#' + id);
        });
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) setActive(entry.target.id);
        });
    }, { threshold: 0.3, rootMargin: '-10% 0px -60% 0px' });

    sections.forEach(function (s) { observer.observe(s); });

    tocLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            var target = document.querySelector(link.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
})();

/* ── Copy link share button ──────────────────────────────────────── */
(function () {
    var btn = document.getElementById('share-link');
    if (!btn) return;

    btn.addEventListener('click', function (e) {
        e.preventDefault();
        var originalHTML = btn.innerHTML;
        navigator.clipboard.writeText(window.location.href).then(function () {
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>';
            setTimeout(function () { btn.innerHTML = originalHTML; }, 2000);
        });
    });
})();
