/* ── Hero entrance ───────────────────────────────────────────── */
(function () {
    var breadcrumb = document.getElementById('faq-breadcrumb');
    var title      = document.getElementById('faq-hero-title');
    var subtitle   = document.getElementById('faq-hero-subtitle');
    var deco       = document.getElementById('faq-hero-deco');

    if (!title) return;

    var items = [breadcrumb, title, subtitle].filter(Boolean);
    gsap.set(items, { y: 30, autoAlpha: 0 });
    gsap.to(items, {
        y: 0,
        autoAlpha: 1,
        duration: 0.7,
        ease: 'power3.out',
        stagger: 0.12,
        delay: 0.15,
    });

    if (deco) {
        gsap.set(deco, { x: 40, autoAlpha: 0 });
        gsap.to(deco, {
            x: 0,
            autoAlpha: 1,
            duration: 0.9,
            ease: 'power3.out',
            delay: 0.3,
        });
    }
})();

/* ── FAQ Accordion ───────────────────────────────────────────── */
(function () {
    var items = document.querySelectorAll('.faq-item');
    if (!items.length) return;

    var openItem = null;

    function closeItem(item) {
        var answer  = item.querySelector('.faq-answer');
        var chevron = item.querySelector('.faq-chevron');
        var trigger = item.querySelector('.faq-trigger');
        gsap.to(answer,  { height: 0,   duration: 0.3, ease: 'power2.in' });
        gsap.to(chevron, { rotation: 0, duration: 0.3, ease: 'power2.inOut' });
        item.classList.remove('is-open');
        trigger.setAttribute('aria-expanded', 'false');
        openItem = null;
    }

    function openItemFn(item) {
        var answer  = item.querySelector('.faq-answer');
        var chevron = item.querySelector('.faq-chevron');
        var trigger = item.querySelector('.faq-trigger');
        gsap.to(answer,  { height: 'auto', duration: 0.4, ease: 'power2.out' });
        gsap.to(chevron, { rotation: 180,  duration: 0.3, ease: 'power2.inOut' });
        item.classList.add('is-open');
        trigger.setAttribute('aria-expanded', 'true');
        openItem = item;
    }

    items.forEach(function (item) {
        item.querySelector('.faq-trigger').addEventListener('click', function () {
            if (item === openItem) {
                closeItem(item);
            } else {
                if (openItem) closeItem(openItem);
                openItemFn(item);
            }
        });
    });
})();

/* ── FAQ Search ──────────────────────────────────────────────── */
(function () {
    var input     = document.getElementById('faq-search');
    var items     = document.querySelectorAll('.faq-item');
    var noResults = document.getElementById('faq-no-results');
    if (!input || !items.length) return;

    input.addEventListener('input', function () {
        var term    = input.value.trim().toLowerCase();
        var visible = 0;

        items.forEach(function (item) {
            var question = item.dataset.question || '';
            var matches  = !term || question.includes(term);

            if (matches) {
                item.style.display = '';
                gsap.to(item, { autoAlpha: 1, duration: 0.2 });
                visible++;
            } else {
                gsap.to(item, {
                    autoAlpha: 0,
                    duration: 0.15,
                    onComplete: function () { item.style.display = 'none'; },
                });
            }
        });

        if (noResults) noResults.classList.toggle('hidden', visible > 0);
    });
})();

/* ── FAQ Questions — scroll entrance ────────────────────────── */
(function () {
    gsap.registerPlugin(ScrollTrigger);

    var leftCol  = document.getElementById('faq-left-col');
    var rightCol = document.getElementById('faq-right-col');
    if (!leftCol || !rightCol) return;

    gsap.set(leftCol, { x: -40, autoAlpha: 0 });
    gsap.to(leftCol, {
        x: 0,
        autoAlpha: 1,
        duration: 0.7,
        ease: 'power3.out',
        scrollTrigger: { trigger: leftCol, start: 'top 80%' },
    });

    var searchWrapper = document.querySelector('#faq-right-col .relative');
    if (searchWrapper) {
        gsap.set(searchWrapper, { y: -15, autoAlpha: 0 });
        gsap.to(searchWrapper, {
            y: 0,
            autoAlpha: 1,
            duration: 0.5,
            ease: 'power3.out',
            scrollTrigger: { trigger: rightCol, start: 'top 80%' },
        });
    }

    var faqItems = document.querySelectorAll('.faq-item');
    gsap.set(faqItems, { y: 20, autoAlpha: 0 });
    gsap.to(faqItems, {
        y: 0,
        autoAlpha: 1,
        duration: 0.5,
        ease: 'power3.out',
        stagger: 0.07,
        scrollTrigger: { trigger: rightCol, start: 'top 75%' },
    });
})();

/* ── FAQ Contact — scroll entrance ──────────────────────────── */
(function () {
    var header       = document.getElementById('faq-contact-header');
    var formPanel    = document.getElementById('faq-form-panel');
    var contactPanel = document.getElementById('faq-contact-panel');
    if (!header) return;

    gsap.set(header, { y: 30, autoAlpha: 0 });
    gsap.to(header, {
        y: 0,
        autoAlpha: 1,
        duration: 0.7,
        ease: 'power3.out',
        scrollTrigger: { trigger: header, start: 'top 85%' },
    });

    if (formPanel) {
        gsap.set(formPanel, { x: -40, autoAlpha: 0 });
        gsap.to(formPanel, {
            x: 0,
            autoAlpha: 1,
            duration: 0.7,
            ease: 'power3.out',
            scrollTrigger: { trigger: formPanel, start: 'top 80%' },
        });
    }

    if (contactPanel) {
        gsap.set(contactPanel, { x: 40, autoAlpha: 0 });
        gsap.to(contactPanel, {
            x: 0,
            autoAlpha: 1,
            duration: 0.7,
            ease: 'power3.out',
            scrollTrigger: { trigger: contactPanel, start: 'top 80%' },
        });
    }
})();

/* ── FAQ Location — scroll entrance ─────────────────────────── */
(function () {
    var section = document.getElementById('faq-location');
    if (!section) return;

    gsap.set(section, { y: 20, autoAlpha: 0 });
    gsap.to(section, {
        y: 0,
        autoAlpha: 1,
        duration: 0.6,
        ease: 'power3.out',
        scrollTrigger: { trigger: section, start: 'top 90%' },
    });
})();

/* ── Active nav (faqs page) ──────────────────────────────────── */
(function () {
    if (!window.setActiveNav) return;

    window.setActiveNav('faqs');

    const contactSection = document.getElementById('faq-contact');
    if (!contactSection) return;

    gsap.registerPlugin(ScrollTrigger);

    ScrollTrigger.create({
        trigger:     contactSection,
        start:       'top 50%',
        onEnter:     () => window.setActiveNav('contacto'),
        onEnterBack: () => window.setActiveNav('faqs'),
    });
})();

/* ── Contact form submit ─────────────────────────────────────── */
(function () {
    var form      = document.getElementById('contact-form');
    var statusEl  = document.getElementById('cf-status');
    if (!form || !statusEl) return;

    var submitBtn = form.querySelector('[type="submit"]');

    function showStatus(ok, msg) {
        gsap.killTweensOf(statusEl);
        statusEl.className = ok
            ? 'flex items-center gap-3 mt-4 p-4 rounded-xl bg-green-50 border border-green-200 text-green-700 text-sm font-medium'
            : 'flex items-center gap-3 mt-4 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm font-medium';
        statusEl.textContent = msg;
        gsap.fromTo(statusEl,
            { y: 10, autoAlpha: 0 },
            { y: 0, autoAlpha: 1, duration: 0.4, ease: 'power3.out' }
        );
    }

    function hideStatus() {
        gsap.to(statusEl, {
            autoAlpha: 0,
            duration: 0.2,
            onComplete: function () { statusEl.className = 'hidden'; },
        });
    }

    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        hideStatus();

        var name    = form.querySelector('[name="name"]').value.trim();
        var email   = form.querySelector('[name="email"]').value.trim();
        var message = form.querySelector('[name="message"]').value.trim();
        var privacy = form.querySelector('[name="privacy"]').checked;

        if (!name || !email || !message) {
            showStatus(false, 'Por favor completa todos los campos obligatorios.');
            return;
        }
        // if (!privacy) {
        //     showStatus(false, 'Debes aceptar la política de privacidad.');
        //     return;
        // }

        var originalHTML     = submitBtn.innerHTML;
        submitBtn.disabled   = true;
        submitBtn.textContent = 'Enviando…';

        try {
            var res  = await fetch(form.dataset.action, { method: 'POST', body: new FormData(form) });
            var json = await res.json();

            if (json.ok) {
                showStatus(true, '¡Mensaje enviado! Nos pondremos en contacto contigo pronto.');
                form.reset();
                if (typeof turnstile !== 'undefined') turnstile.reset();
            } else {
                showStatus(false, json.error || 'Ocurrió un error. Intenta de nuevo.');
                if (typeof turnstile !== 'undefined') turnstile.reset();
            }
        } catch (_err) {
            showStatus(false, 'No se pudo conectar. Revisa tu conexión e intenta de nuevo.');
        } finally {
            submitBtn.disabled  = false;
            submitBtn.innerHTML = originalHTML;
        }
    });
})();
