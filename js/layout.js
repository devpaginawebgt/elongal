/* ── Loading screen ─────────────────────────────────────────── */
(function () {
    var LS_WAIT = 1.8; // seconds before animation starts

    document.body.classList.add('is-loading');

    var content  = document.getElementById('ls-content');
    var panelTop = document.getElementById('ls-top');
    var panelBot = document.getElementById('ls-bottom');
    var screen   = document.getElementById('loading-screen');

    if (!content || !panelTop || !panelBot || !screen) {
        document.body.classList.remove('is-loading');
        return;
    }

    gsap.timeline({ delay: LS_WAIT })
        .to(content,  { opacity: 0, duration: 0.4, ease: 'power2.out' })
        .to(panelTop, { y: '-100%', duration: 0.9, ease: 'power3.inOut' }, '+=0.05')
        .to(panelBot, { y: '100%',  duration: 0.9, ease: 'power3.inOut' }, '<')
        .call(function () {
            document.body.classList.remove('is-loading');
            screen.style.display = 'none';
        });
})();

/* ── Header entrance ────────────────────────────────────────── */
(function () {
    const nav = document.querySelector('header > nav');
    if (!nav) return;

    const logo    = nav.querySelector(':scope > a');
    const navPill = nav.querySelector(':scope > ul');
    const actions = nav.querySelector(':scope > div');
    const items   = [logo, navPill, actions].filter(Boolean);

    gsap.set(items, { y: -20, autoAlpha: 0 });
    gsap.to(items, {
        y: 0,
        autoAlpha: 1,
        duration: 0.65,
        ease: 'power3.out',
        stagger: 0.08,
        delay: 0.1,
    });
})();

/* ── Hamburger menu ──────────────────────────────────────────── */
(function () {
    const toggle = document.getElementById('menu-toggle');
    const menu   = document.getElementById('mobile-menu');

    if (!toggle || !menu) return;

    toggle.addEventListener('click', () => {
        const expanded = toggle.getAttribute('aria-expanded') === 'true';
        toggle.setAttribute('aria-expanded', String(!expanded));
        menu.classList.toggle('hidden', expanded);
    });
})();

/* ── Country selector ───────────────────────────────────────── */
(function () {
    document.querySelectorAll('select[data-country-select]').forEach(function (sel) {
        sel.addEventListener('change', function () {
            const url = new URL(window.location.href);
            url.searchParams.set('pais', this.value);
            window.location.href = url.toString();
        });
    });
})();

/* ── Active nav helper ───────────────────────────────────────── */
(function () {
    const mobile = document.getElementById('mobile-menu');

    const DK_ON  = ['bg-(--deep-purple)', 'text-white', 'font-semibold'];
    const DK_OFF = ['font-medium', 'text-gray-700', 'hover:bg-(--light-purple)', 'hover:text-white'];
    const MB_ON  = ['text-gradient-primary'];
    const MB_OFF = ['text-gray-700'];

    window.setActiveNav = function (key) {
        document.querySelectorAll('a[data-nav]').forEach(function (a) {
            const isMobile = mobile && mobile.contains(a);
            const isActive = a.dataset.nav === key;
            const on  = isMobile ? MB_ON  : DK_ON;
            const off = isMobile ? MB_OFF : DK_OFF;

            (isActive ? off : on).forEach(c => a.classList.remove(c));
            (isActive ? on  : off).forEach(c => a.classList.add(c));
        });
    };
})();

/* ── Smooth anchor scroll ───────────────────────────────────── */
(function () {
    const mobileMenu = document.getElementById('mobile-menu');
    const menuToggle = document.getElementById('menu-toggle');

    function init() {
        gsap.registerPlugin(ScrollToPlugin);

        document.addEventListener('click', function (e) {
            const link = e.target.closest('a[href]');
            if (!link) return;

            const href = link.getAttribute('href');
            if (!href) return;

            // Extraer el hash de URLs absolutas o relativas (ej: "/base/#section" o "#section")
            const hashIndex = href.lastIndexOf('#');
            if (hashIndex === -1) return;

            const hash = href.slice(hashIndex);
            if (hash === '#') return;

            // Verificar que el elemento destino exista en esta página
            const target = document.querySelector(hash);
            if (!target) return;

            e.preventDefault();

            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                menuToggle && menuToggle.setAttribute('aria-expanded', 'false');
            }

            gsap.to(window, {
                scrollTo: { y: target, offsetY: 40 },
                duration: 1,
                ease: 'power3.inOut',
            });
        });
    }

    if (typeof ScrollToPlugin !== 'undefined') {
        init();
    } else {
        const s = document.createElement('script');
        s.src = 'https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollToPlugin.min.js';
        s.onload = init;
        document.head.appendChild(s);
    }
})();


/* ── Footer buscar button ────────────────────────────────────── */
(function () {
    const btn    = document.getElementById('footer-buscar-btn');
    const select = document.getElementById('footer-country-select');
    if (!btn || !select) return;

    btn.addEventListener('click', function () {
        window.location.href = btn.dataset.href + '?pais=' + select.value;
    });
})();

/* ── Footer entrance ─────────────────────────────────────────── */
(function () {
    const infoSection = document.getElementById('info-section');
    const footer      = document.getElementById('footer');
    if (!infoSection && !footer) return;

    gsap.registerPlugin(ScrollTrigger);

    const stInfo = {
        trigger: infoSection,
        start:   'top 80%',
        end:     'top 70%',
        scrub:   0.8,
    };

    gsap.from('#info-search-text',     { x: -50, autoAlpha: 0, ease: 'power2.out', scrollTrigger: stInfo });
    gsap.from('#info-search-controls', { x:  50, autoAlpha: 0, ease: 'power2.out', scrollTrigger: stInfo });

    gsap.from(['#info-atulado-text', '#info-atulado-cta'], {
        x:          60,
        autoAlpha:  0,
        ease:       'power2.out',
        stagger:    0.1,
        scrollTrigger: stInfo,
    });

    gsap.from('#footer-cols', {
        y:         40,
        autoAlpha: 0,
        duration:  0.6,
        ease:      'power2.out',
        scrollTrigger: {
            trigger:       footer,
            start:         'top 85%',
            toggleActions: 'play none none reverse',
        },
    });
})();
