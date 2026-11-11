gsap.registerPlugin(ScrollTrigger);

/* ── Hero entrance ───────────────────────────────────────────── */
(function () {
    var breadcrumb = document.getElementById('producto-breadcrumb');
    var title      = document.getElementById('producto-hero-title');
    var img        = document.getElementById('producto-hero-img');

    if (!title) return;

    gsap.set(breadcrumb, { autoAlpha: 0 });
    gsap.to(breadcrumb, { autoAlpha: 1, duration: 0.6, ease: 'power2.out', delay: 0.3 });

    gsap.set(title, { x: -60, autoAlpha: 0 });
    gsap.to(title,  { x: 0, autoAlpha: 1, duration: 0.9, ease: 'power3.out', delay: 0.5 });

    if (img) {
        gsap.set(img, { x: 60, autoAlpha: 0 });
        gsap.to(img,  { x: 0, autoAlpha: 1, duration: 0.9, ease: 'power3.out', delay: 0.4 });
    }
})();

/* ── Fórmula entrance ────────────────────────────────────────── */
(function () {
    var header = document.getElementById('formula-header');
    var items  = document.querySelectorAll('#formula-items li');

    if (!header) return;

    var st = { trigger: '#formula', start: 'top 70%', toggleActions: 'play none none none' };

    gsap.from(header, { y: 40, autoAlpha: 0, duration: 0.7, ease: 'power2.out', scrollTrigger: st });
    gsap.from(items,  { y: 40, autoAlpha: 0, duration: 0.7, ease: 'power2.out', stagger: 0.12, scrollTrigger: st });
})();

/* ── Producto tabs ───────────────────────────────────────────── */
(function () {
    var tabs   = document.querySelectorAll('.producto-tab');
    var imgEl  = document.getElementById('producto-imagen');

    if (!tabs.length || !imgEl) return;

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            if (tab.classList.contains('color-gradient-primary')) return;

            // Actualiza clases de tabs
            tabs.forEach(function (t) {
                t.classList.remove('color-gradient-primary', 'text-white', 'border-transparent');
                t.classList.add('border-(--deep-purple)', 'text-(--deep-purple)');
            });
            tab.classList.add('color-gradient-primary', 'text-white', 'border-transparent');
            tab.classList.remove('border-(--deep-purple)', 'text-(--deep-purple)');

            var newSrc    = tab.dataset.imagen;
            var newNombre = tab.dataset.nombre;
            var newKey    = tab.dataset.key;

            // Crossfade imagen
            gsap.to(imgEl, {
                opacity: 0,
                scale: 0.95,
                duration: 0.2,
                ease: 'power1.in',
                onComplete: function () {
                    imgEl.src = newSrc;
                    imgEl.alt = 'Elongal ' + newNombre;
                    gsap.to(imgEl, { opacity: 1, scale: 1, duration: 0.35, ease: 'power2.out' });
                },
            });

            // Actualiza textos del acordeón para la presentación activa
            document.querySelectorAll('.producto-detalle-text').forEach(function (p) {
                p.classList.toggle('hidden', p.dataset.key !== newKey);
            });
        });
    });
})();

/* ── Producto acordeón ───────────────────────────────────────── */
(function () {
    var items   = document.querySelectorAll('.producto-detalle-item');
    if (!items.length) return;

    var openItem = null;

    function closeItem(item) {
        var answer  = item.querySelector('.producto-detalle-answer');
        var chevron = item.querySelector('.producto-detalle-chevron');
        var trigger = item.querySelector('.producto-detalle-trigger');
        gsap.to(answer,  { height: 0,   duration: 0.3, ease: 'power2.in' });
        gsap.to(chevron, { rotation: 0, duration: 0.3, ease: 'power2.inOut' });
        item.classList.remove('is-open');
        trigger.setAttribute('aria-expanded', 'false');
        openItem = null;
    }

    function openItemFn(item) {
        var answer  = item.querySelector('.producto-detalle-answer');
        var chevron = item.querySelector('.producto-detalle-chevron');
        var trigger = item.querySelector('.producto-detalle-trigger');
        gsap.to(answer,  { height: 'auto', duration: 0.4, ease: 'power2.out' });
        gsap.to(chevron, { rotation: 180,  duration: 0.3, ease: 'power2.inOut' });
        item.classList.add('is-open');
        trigger.setAttribute('aria-expanded', 'true');
        openItem = item;
    }

    // Abre el primer item por defecto
    openItemFn(items[0]);

    items.forEach(function (item) {
        item.querySelector('.producto-detalle-trigger').addEventListener('click', function () {
            if (item === openItem) {
                closeItem(item);
            } else {
                if (openItem) closeItem(openItem);
                openItemFn(item);
            }
        });
    });
})();

/* ── Producto entrance ───────────────────────────────────────── */
(function () {
    var imgCol  = document.getElementById('producto-img-col');
    var infoCol = document.getElementById('producto-info-col');

    if (!imgCol || !infoCol) return;

    var st = { trigger: '#detalle-producto', start: 'top 80%', end: 'top 20%', scrub: 0.8 };

    gsap.from(imgCol,  { x: -65, autoAlpha: 0, ease: 'power2.out', scrollTrigger: st });
    gsap.from(infoCol, { x:  65, autoAlpha: 0, ease: 'power2.out', scrollTrigger: st });
})();