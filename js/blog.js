/* ── Hero entrance ──────────────────────────────────────────────── */
(function () {
    if (!document.getElementById('blog-hero-title')) return;

    const items = ['blog-breadcrumb', 'blog-hero-badge', 'blog-hero-title', 'blog-hero-subtitle']
        .map(function (id) { return document.getElementById(id); })
        .filter(Boolean);
    const image = document.getElementById('blog-hero-image');

    gsap.set(items, { x: -40, autoAlpha: 0 });
    gsap.to(items, {
        x: 0, autoAlpha: 1,
        duration: 0.8, ease: 'power3.out',
        stagger: 0.12, delay: 0.2,
    });

    if (image) {
        gsap.set(image, { x: 50, autoAlpha: 0 });
        gsap.to(image, {
            x: 0, autoAlpha: 1,
            duration: 0.9, ease: 'power3.out',
            delay: 0.3,
        });
    }
})();

/* ── Featured article entrance ──────────────────────────────────── */
(function () {
    gsap.registerPlugin(ScrollTrigger);

    const article = document.getElementById('featured-article');
    if (!article) return;

    const st = { trigger: article, start: 'top 70%', end: 'top 20%', scrub: 0.8 };
    const img = article.querySelector('img');
    const textItems = [
        article.querySelector('.article-meta'),
        article.querySelector('h2'),
        article.querySelector('p'),
        article.querySelector('.article-cta'),
    ].filter(Boolean);

    if (img) {
        gsap.from(img, { y: 50, autoAlpha: 0, ease: 'power2.out', scrollTrigger: st });
    }
    if (textItems.length) {
        gsap.from(textItems, { x: -40, autoAlpha: 0, ease: 'power2.out', stagger: 0.08, scrollTrigger: st });
    }
})();

/* ── Articles grid entrance ─────────────────────────────────────── */
(function () {
    gsap.registerPlugin(ScrollTrigger);

    const grid = document.getElementById('articles-grid');
    if (!grid) return;

    const cards = grid.querySelectorAll('article');
    if (!cards.length) return;

    gsap.from(cards, {
        y: 60, autoAlpha: 0, ease: 'power2.out', stagger: 0.1,
        scrollTrigger: { trigger: grid, start: 'top 70%', end: 'top 20%', scrub: 0.8 },
    });
})();

/* ── Sidebar entrance ───────────────────────────────────────────── */
(function () {
    gsap.registerPlugin(ScrollTrigger);

    const sidebar = document.getElementById('blog-sidebar');
    if (!sidebar) return;

    const blocks = ['blog-search-block', 'blog-topics-block', 'blog-related-block']
        .map(function (id) { return document.getElementById(id); })
        .filter(Boolean);
    if (!blocks.length) return;

    const st = { trigger: sidebar, start: 'top 70%', end: 'top 30%', scrub: 0.8 };
    const mm = gsap.matchMedia();

    mm.add('(min-width: 1024px)', function () {
        gsap.from(blocks, { x: 50, autoAlpha: 0, ease: 'power2.out', stagger: 0.12, scrollTrigger: st });
    });

    mm.add('(max-width: 1023px)', function () {
        gsap.from(blocks, { y: 40, autoAlpha: 0, ease: 'power2.out', stagger: 0.1, scrollTrigger: st });
    });
})();

/* ── Pagination entrance ────────────────────────────────────────── */
(function () {
    gsap.registerPlugin(ScrollTrigger);

    const pag = document.getElementById('blog-pagination');
    if (!pag) return;

    gsap.from(pag, {
        y: 30, autoAlpha: 0, ease: 'power2.out',
        scrollTrigger: { trigger: pag, start: 'top 80%', end: 'top 65%', scrub: 0.8 },
    });
})();

/* ── Grid cards hover ───────────────────────────────────────────── */
(function () {
    const cards = document.querySelectorAll('.blog-grid-card');
    if (!cards.length) return;

    gsap.matchMedia().add('(hover: hover)', function () {
        cards.forEach(function (card) {
            const img = card.querySelector('img');
            if (!img) return;
            const tl = gsap.timeline({ paused: true })
                .to(img, { scale: 1.05, duration: 0.3, ease: 'power2.out' });
            card.addEventListener('mouseenter', function () { tl.play(); });
            card.addEventListener('mouseleave', function () { tl.reverse(); });
        });
    });
})();
