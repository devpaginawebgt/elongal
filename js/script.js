/* ── Hero: selector de sabores ──────────────────────────────── */
(function () {
    const bg      = document.getElementById('hero-bg');
    const product = document.getElementById('hero-product');
    const video   = document.getElementById('hero-bg-video');

    if (!bg || !product) return;

    const selectors  = document.querySelectorAll('[data-presentacion]');
    const thumbnails = document.querySelectorAll('[data-presentacion-card]');

    if (!selectors.length) return;

    const mql = window.matchMedia('(max-width: 1024px)');
    let currentId = null;

    function getFondo(el) {
        return mql.matches ? el.dataset.fondoSm : el.dataset.fondo;
    }

    function setActiveState(targetId) {
        selectors.forEach(el => {
            const btn      = el.querySelector('button');
            const dot      = el.querySelector('div');
            const isActive = el.dataset.id === targetId;

            btn.classList.toggle('color-gradient-primary',  isActive);
            btn.classList.toggle('text-white',              isActive);
            btn.classList.toggle('border-transparent',      isActive);
            btn.classList.toggle('text-(--deep-purple)',   !isActive);
            btn.classList.toggle('border-(--deep-purple)', !isActive);
            dot.classList.toggle('color-gradient-primary',  isActive);
            dot.classList.toggle('bg-(--deep-purple)',      !isActive);
        });

        thumbnails.forEach(card => {
            const imgBox   = card.querySelector('div');
            const label    = card.querySelector('span');
            const isActive = card.dataset.id === targetId;

            card.classList.toggle('opacity-60',              !isActive);
            imgBox.classList.toggle('ring-2',                isActive);
            imgBox.classList.toggle('ring-(--deep-purple)',  isActive);
            label.classList.toggle('text-(--deep-purple)',   isActive);
            label.classList.toggle('text-gray-500',         !isActive);
        });
    }

    function activate(targetId, animate = true) {
        let fondo, producto, videoSrc;

        selectors.forEach(el => {
            if (el.dataset.id === targetId) {
                fondo    = getFondo(el);
                producto = el.dataset.producto;
                videoSrc = el.dataset.video || '';
            }
        });

        if (!fondo) return;

        currentId = targetId;

        // En desktop mostramos video; en mobile siempre imagen (fondo-sm)
        const useVideo = videoSrc && video && !mql.matches;

        if (animate) {
            gsap.to(product, {
                opacity: 0, duration: 0.2, ease: 'power1.in',
                onComplete() {
                    product.style.backgroundImage = `url(${producto})`;
                    gsap.to(product, { opacity: 1, duration: 0.4, ease: 'power1.out' });
                },
            });

            if (useVideo) {
                // Desktop: fade-out del video actual → swap src → fade-in del nuevo
                gsap.to(bg, { opacity: 0, duration: 0.25, ease: 'power1.in' });
                gsap.to(video, {
                    opacity: 0, duration: 0.2, ease: 'power1.in',
                    onComplete() {
                        video.src = videoSrc;
                        video.load();
                        video.play();
                        gsap.to(video, { opacity: 1, duration: 0.4, ease: 'power1.out' });
                    },
                });
            } else {
                // Mobile o presentación sin video: mostrar imagen de fondo
                if (video) {
                    gsap.to(video, {
                        opacity: 0, duration: 0.25, ease: 'power1.in',
                        onComplete() { video.pause(); },
                    });
                }
                gsap.to(bg, {
                    opacity: 0, duration: 0.25, ease: 'power1.in',
                    onComplete() {
                        bg.style.backgroundImage = `url(${fondo})`;
                        gsap.to(bg, { opacity: 1, duration: 0.4, ease: 'power1.out' });
                    },
                });
            }
        } else {
            bg.style.backgroundImage      = `url(${fondo})`;
            product.style.backgroundImage = `url(${producto})`;
        }

        setActiveState(targetId);
    }

    // Al cruzar el breakpoint: alternar entre video (desktop) e imagen (mobile)
    mql.addEventListener('change', () => {
        if (!currentId) return;
        selectors.forEach(el => {
            if (el.dataset.id !== currentId) return;
            const vSrc   = el.dataset.video || '';
            const useVid = vSrc && video && !mql.matches;
            bg.style.backgroundImage = `url(${getFondo(el)})`;
            if (useVid) {
                video.src = vSrc;
                video.load();
                video.play();
                gsap.set(video, { opacity: 1 });
                gsap.set(bg,    { opacity: 0 });
            } else {
                if (video) { video.pause(); gsap.set(video, { opacity: 0 }); }
                gsap.set(bg, { opacity: 1 });
            }
        });
    });

    // Estado inicial sin animación
    const initialEl = [...selectors].find(el => el.dataset.activo === '1');
    if (initialEl) activate(initialEl.dataset.id, false);

    selectors.forEach(el  => el.addEventListener('click', () => activate(el.dataset.id)));
    thumbnails.forEach(el => el.addEventListener('click', () => activate(el.dataset.id)));
})();

/* ── Hero entrance ───────────────────────────────────────────── */
(function () {
    const bg          = document.getElementById('hero-bg');
    const bgVideo     = document.getElementById('hero-bg-video');
    const product     = document.getElementById('hero-product');
    const textBlock   = document.getElementById('hero-text');
    const flavorPanel = document.getElementById('hero-flavor-panel');
    const scrollInd   = document.getElementById('hero-scroll');

    if (!bg) return;

    const isDesktop = window.matchMedia('(min-width: 1024px)').matches;

    gsap.set(bg, { autoAlpha: 0 });
    gsap.to(bg, { autoAlpha: 1, duration: 1.2, ease: 'power2.out' });

    if (bgVideo && isDesktop) {
        gsap.set(bgVideo, { opacity: 0 });
        gsap.to(bgVideo, { opacity: 1, duration: 1.2, ease: 'power2.out' });
    }

    if (textBlock) {
        gsap.set(textBlock, { x: -50, autoAlpha: 0 });
        gsap.to(textBlock, { x: 0, autoAlpha: 1, duration: 0.9, ease: 'power3.out', delay: 0.3 });
    }

    if (product) {
        gsap.set(product, isDesktop ? { x: 60, autoAlpha: 0 } : { y: 40, autoAlpha: 0 });
        gsap.to(product, { x: 0, y: 0, autoAlpha: 1, duration: 1, ease: 'power3.out', delay: 0.5 });
    }

    if (flavorPanel) {
        gsap.set(flavorPanel, { y: 24, autoAlpha: 0 });
        gsap.to(flavorPanel, { y: 0, autoAlpha: 1, duration: 0.7, ease: 'power3.out', delay: 0.65 });
    }

    if (scrollInd) {
        gsap.set(scrollInd, { autoAlpha: 0 });
        gsap.to(scrollInd, { autoAlpha: 1, duration: 0.6, ease: 'power2.out', delay: 0.9 });
    }
})();

/* ── Hero: modal Conoce Elongal ──────────────────────────────── */
(function () {
    const modal    = document.getElementById('hero-modal');
    const backdrop = document.getElementById('hero-modal-backdrop');
    const panel    = document.getElementById('hero-modal-panel');
    const closeBtn = document.getElementById('hero-modal-close');
    const ctaBtn   = document.getElementById('hero-cta-btn');
    const modalImg = document.getElementById('hero-modal-img');
    const flavorEl = document.getElementById('hero-modal-flavor');

    if (!modal || !ctaBtn) return;

    function getActiveSelector() {
        return [...document.querySelectorAll('[data-presentacion]')]
            .find(el => el.querySelector('button')?.classList.contains('color-gradient-primary'))
            ?? document.querySelector('[data-presentacion]');
    }

    function open() {
        const sel = getActiveSelector();
        if (sel) {
            if (modalImg) modalImg.src = sel.dataset.modalImagen;
            if (flavorEl) flavorEl.textContent = `Sabor ${sel.dataset.nombre}`;
        }

        modal.classList.remove('pointer-events-none');
        document.body.style.overflow = 'hidden';

        gsap.to(backdrop, { opacity: 1, duration: 0.3, ease: 'power2.out' });
        gsap.fromTo(panel,
            { opacity: 0, scale: 0.95, y: 20 },
            { opacity: 1, scale: 1, y: 0, duration: 0.4, ease: 'power3.out' }
        );
    }

    function close() {
        gsap.to(backdrop, { opacity: 0, duration: 0.25, ease: 'power2.in' });
        gsap.to(panel, {
            opacity: 0, scale: 0.95, y: 10, duration: 0.3, ease: 'power2.in',
            onComplete() {
                modal.classList.add('pointer-events-none');
                document.body.style.overflow = '';
                panel.scrollTop = 0;
            },
        });
    }

    ctaBtn.addEventListener('click', open);
    closeBtn.addEventListener('click', close);
    backdrop.addEventListener('click', close);
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && !modal.classList.contains('pointer-events-none')) close();
    });
})();

/* ── Slogan reveal ───────────────────────────────────────────── */
(function () {
    const text = document.getElementById('slogan-text');

    if (!text) return;

    gsap.registerPlugin(ScrollTrigger);

    const WIDTH = 40; // % del ancho del texto que ocupa el haz
    const SOFT  = 20; // suavidad de los bordes del haz

    function updateMask(progress) {
        const total  = 100 + WIDTH + SOFT * 2;
        const center = progress * total - (WIDTH / 2 + SOFT);

        // Cuatro puntos del degradado: fade-in, lleno, lleno, fade-out
        const a = center - WIDTH / 2 - SOFT;
        const b = center - WIDTH / 2;
        const c = center + WIDTH / 2;
        const d = center + WIDTH / 2 + SOFT;

        const mask = `linear-gradient(to right, transparent ${a}%, white ${b}%, white ${c}%, transparent ${d}%)`;

        text.style.webkitMaskImage = mask;
        text.style.maskImage       = mask;
    }

    ScrollTrigger.create({
        trigger: '#slogan-section',
        start: 'top 10%',
        end: 'bottom bottom',
        onUpdate: (self) => updateMask(self.progress),
        onLeaveBack: () => updateMask(0),
    });

    gsap.to(text, {
        scale: 1.2,
        ease: 'none',
        scrollTrigger: {
            trigger: '#slogan-section',
            start: 'top 30%',
            end: 'bottom bottom',
            scrub: true,
        },
    });
})();

/* ── Producto Cards ───────────────────────────────────────────── */
new Swiper('#swiper-productos', {
    direction: 'horizontal',
    effect: 'fade',
    loop: true,
    autoplay: { delay: 6000, disableOnInteraction: true },
    pagination: { el: '.swiper-pagination', clickable: true },
});


/* ── Product card entrance ───────────────────────────────────── */
(function () {
    const section = document.getElementById('product-card-section');
    if (!section) return;

    gsap.registerPlugin(ScrollTrigger);

    const firstSlide = section.querySelector('.swiper-slide');
    if (!firstSlide) return;

    const namePanel    = firstSlide.querySelector('div:nth-child(1)');
    const imgPanel     = firstSlide.querySelector('div:nth-child(2)');
    const cardPanel    = firstSlide.querySelector('div:nth-child(3)');
    const benefitItems = firstSlide.querySelectorAll('.benefit-item');

    gsap.set([namePanel, imgPanel, cardPanel, ...benefitItems], { autoAlpha: 0, y: 24 });

    ScrollTrigger.create({
        trigger: section,
        start: 'top 60%',
        once: true,
        onEnter() {
            const isDesktop = window.matchMedia('(min-width: 1024px)').matches;

            if (isDesktop) {
                gsap.set(namePanel, { x: -60, y: 0 });
                gsap.set(cardPanel, { x:  60, y: 0 });
            }

            gsap.to([namePanel, imgPanel, cardPanel], {
                autoAlpha: 1,
                x: 0,
                y: 0,
                duration: 0.8,
                ease: 'power3.out',
                stagger: 0.4,
            });
            gsap.to([...benefitItems], {
                autoAlpha: 1,
                y: 0,
                duration: 0.5,
                ease: 'power2.out',
                stagger: 0.08,
                delay: 0.5,
            });
        },
    });
})();

/* ── Aplicaciones tabs + Swiper ─────────────────────────────── */
(function () {
    const section = document.getElementById('aplicaciones');
    if (!section) return;

    // Swiper — horizontal en mobile, vertical en lg+
    let swiper;
    const mq = window.matchMedia('(min-width: 1024px)');

    function buildSwiper() {
        const isDesktop = mq.matches;
        if (swiper) swiper.destroy(true, true);
        swiper = new Swiper('#swiper-aplicaciones', {
            direction: isDesktop ? 'vertical' : 'horizontal',
            loop: false,
            grabCursor: true,
            keyboard: { enabled: true },
            ...(isDesktop 
                ? {
                    effect: 'creative',
                    creativeEffect: {
                        prev: { shadow: true, translate: [0, '-20%', -1] },
                        next: { translate: [0, '100%', 0] },
                    },
                } : {
                    effect: 'creative',
                    creativeEffect: {
                        prev: { shadow: true, translate: ['-20%', 0, -1] },
                        next: { translate: ['100%', 0, 0] },
                    },
                }),
        });
        swiper.on('slideChange', () => activateTab(swiper.activeIndex));
    }

    buildSwiper();
    mq.addEventListener('change', buildSwiper);

    // Tabs (declarado aquí para que las animaciones de abajo puedan usarlo)
    const tabs = section.querySelectorAll('.aplicacion-tab');

    // Animaciones de entrada
    gsap.registerPlugin(ScrollTrigger);

    const headerEl = section.querySelector('.text-center');
    const headerItems = headerEl
        ? [headerEl.querySelector('span'), headerEl.querySelector('h2'), headerEl.querySelector('p')].filter(Boolean)
        : [];

    const st = { trigger: section, start: 'top 78%', toggleActions: 'play none none none' };

    if (headerItems.length) {
        gsap.from(headerItems, {
            y: 30,
            opacity: 0,
            duration: 0.7,
            ease: 'power3.out',
            stagger: 0.12,
            scrollTrigger: st,
        });
    }

    if (tabs.length) {
        gsap.from(tabs, {
            y: 24,
            opacity: 0,
            scale: 0.92,
            duration: 0.55,
            ease: 'power3.out',
            stagger: 0.08,
            delay: headerItems.length ? 0.35 : 0,
            scrollTrigger: st,
        });
    }

    gsap.from('#swiper-aplicaciones', {
        y: 50,
        opacity: 0,
        duration: 0.9,
        ease: 'power3.out',
        delay: headerItems.length ? 0.6 : 0,
        scrollTrigger: st,
    });

    function activateTab(index) {
        tabs.forEach((tab, i) => {
            const isActive = i === index;
            const ring  = tab.querySelector('.tab-ring');
            const icon  = tab.querySelector('.tab-icon');
            const label = tab.querySelector('.tab-label');
            const bar   = tab.querySelector('.tab-bar');

            ring.classList.toggle('border-(--light-purple)', isActive);
            ring.classList.toggle('border-gray-200', !isActive);
            icon.classList.toggle('text-(--light-purple)', isActive);
            icon.classList.toggle('text-gray-400', !isActive);
            label.classList.toggle('text-(--light-purple)', isActive);
            label.classList.toggle('text-gray-500', !isActive);
            bar.classList.toggle('color-gradient-primary', isActive);
        });
    }

    activateTab(0);

    // Click en tab → navega al slide correspondiente
    tabs.forEach((tab, i) => {
        tab.addEventListener('click', () => swiper.slideTo(i));
    });

    // Cambio de slide → actualiza tab activo (registrado dentro de buildSwiper)
})();

/* ── Quiz entrance ───────────────────────────────────────────── */
(function () {
    const section = document.getElementById('quiz-section');
    if (!section) return;

    gsap.registerPlugin(ScrollTrigger);

    const picture = section.querySelector('picture');
    const card    = section.querySelector('#quiz-panel')?.parentElement;

    gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: 'top 60%',
            end: 'top 10%',
            scrub: 1,
        },
    })
    .fromTo(picture, { scale: 1.06, opacity: 0 }, { scale: 1, opacity: 1, duration: 1, ease: 'power2.out' })
    .fromTo(card,    { x: -50, opacity: 0 },       { x: 0, opacity: 1, duration: 0.8, ease: 'power3.out' }, '-=0.5');
})();

/* ── Quiz de salud muscular ──────────────────────────────────── */
(function () {
    const panel = document.getElementById('quiz-panel');
    if (!panel) return;

    const TOTAL = 6;
    const questions = [
        {
            q: '¿En qué rango de edad te encuentras?',
            o: ['Menos de 40 años', '40 a 59 años', '60 años o más'],
        },
        {
            q: '¿Has notado dificultad para levantarte de una silla sin usar los brazos?',
            o: ['No, puedo hacerlo sin dificultad', 'A veces me cuesta', 'Sí, tengo dificultad frecuente'],
        },
        {
            q: '¿Cómo percibes tu fuerza para realizar actividades cotidianas?',
            o: ['Conservo mi fuerza habitual', 'He notado una ligera disminución', 'He notado una disminución importante'],
        },
        {
            q: '¿Con qué frecuencia realizas ejercicios de fuerza?',
            o: ['Dos o más veces por semana', 'Una vez por semana', 'Rara vez o nunca'],
        },
        {
            q: '¿Cómo describirías tu alimentación?',
            o: ['Incluyo fuentes de proteína regularmente', 'No siempre consumo suficiente proteína', 'Mi alimentación es irregular o limitada'],
        },
        {
            q: 'Prueba sencilla de movilidad',
            desc: 'Si puedes hacerlo con seguridad, intenta levantarte cinco veces de una silla estable sin usar los brazos. Omítela si tienes dolor o riesgo de caída.',
            o: ['Pude hacerlo sin dificultad', 'Me costó completar los movimientos', 'No pude completarlos', 'Prefiero omitir esta prueba'],
        },
    ];

    let step = 0;
    let answers = Array(TOTAL).fill(null);

    function start() {
        step = 0;
        answers = Array(TOTAL).fill(null);
        panel.innerHTML = `
            <p class="text-md lg:text-lg font-semibold text-(--light-purple) mb-2.5">
                ¿Cómo está tu salud muscular?
            </p>
            <h2 class="text-4xl lg:text-5xl font-black text-(--night-blue) leading-[1.1] mb-3.5">
                Tu movimiento tiene mucho que contarte.
            </h2>
            <p class="text-md lg:text-xl leading-[1.65] mb-7 text-(--night-blue)/50">
                Haz una pausa para conocer tus hábitos y descubrir cómo cuidar tu salud muscular.
            </p>
            <button class="text-xl color-gradient-primary w-full py-[13px] px-5 border-0 rounded-full text-white text-sm font-bold cursor-pointer tracking-[0.04em] transition-opacity duration-200 hover:opacity-[0.88]" id="quiz-start">
                Comienza contigo &nbsp;→
            </button>
            <p class="text-sm lg:text-md text-(--night-blue)/40 leading-[1.6] text-center mt-2.5">
                Orientación educativa. No sustituye una evaludación médica.
            </p>
        `;
        document.getElementById('quiz-start').onclick = render;
    }

    function render() {
        const q   = questions[step];
        const pct = ((step + 1) / TOTAL * 100).toFixed(0);

        panel.innerHTML = `
            <div class="text-sm lg:text-md font-bold tracking-[0.12em] text-(--deep-purple) uppercase">ELONGAL® · SALUD MUSCULAR</div>
            <div class="text-sm lg:text-md text-gray-400 my-1">Paso ${step + 1} de ${TOTAL}</div>
            <div class="h-2 bg-[#e8e8e8] rounded mt-2 mb-[22px]">
                <div class="h-full color-gradient-primary rounded transition-[width] duration-[350ms]" style="width:${pct}%;"></div>
            </div>
            <h3 class="text-2xl lg:text-3xl font-bold text-(--night-blue) leading-[1.3] mb-1.5">${q.q}</h3>
            ${q.desc ? `<p class="text-sm lg:text-md text-(--night-blue)/50 leading-[1.55] mb-3.5">${q.desc}</p>` : ''}
            <div id="quiz-opts"></div>
            <div class="flex gap-2.5 mt-[18px]">
                <button class="py-3 px-4 border-[1.5px] border-[#ddd] rounded-full bg-white text-[#666] text-base cursor-pointer transition-[border-color,color] duration-200 hover:border-(--deep-purple) hover:text-(--deep-purple)" id="quiz-back">← Anterior</button>
                <button class="flex-1 py-[13px] px-5 border-0 rounded-full bg-(--deep-purple) text-white text-base font-bold cursor-pointer tracking-[0.04em] transition-opacity duration-200 disabled:opacity-35 disabled:cursor-not-allowed enabled:hover:opacity-[0.88]" id="quiz-next" ${answers[step] === null ? 'disabled' : ''}>
                    ${step === TOTAL - 1 ? 'Ver mi resultado' : 'Continuar'} →
                </button>
            </div>
        `;

        const opts = document.getElementById('quiz-opts');
        q.o.forEach((label, i) => {
            const btn      = document.createElement('button');
            const selected = answers[step] === i;
            btn.className  = 'quiz-option flex items-center gap-3 w-full py-3 px-[15px] my-[7px] border-[1.5px] border-[#e0e0e0] rounded-[10px] bg-white text-left cursor-pointer text-md text-[#2a2a2a] transition-[border-color,background] duration-200 hover:border-(--deep-purple)' + (selected ? ' selected' : '');
            btn.innerHTML  = `<span class="quiz-radio size-[18px] rounded-full border-2 border-[#ccc] shrink-0 flex items-center justify-center transition-[border-color,background] duration-200"></span>${label}`;
            btn.onclick    = () => { answers[step] = i; render(); };
            opts.appendChild(btn);
        });

        document.getElementById('quiz-back').onclick = () => {
            if (step === 0) start(); else { step--; render(); }
        };
        document.getElementById('quiz-next').onclick = () => {
            if (answers[step] === null) return;
            if (step === TOTAL - 1) result(); else { step++; render(); }
        };
    }

    function result() {
        const high   = answers[1] === 2 || answers[2] === 2 || answers[5] === 2;
        const medium = answers.slice(1, 5).some(v => v > 0) || answers[5] === 1;
        const r      = high ? 2 : medium ? 1 : 0;

        const [title, desc, bgColor, textColor] = [
            [
                'Buen punto de partida',
                'Tus respuestas no muestran dificultades relevantes en las áreas consultadas. Continúa cuidando tu salud muscular.',
                '#e6f4eb', '#286746',
            ],
            [
                'Conviene prestar atención',
                'Identificamos algunos factores relacionados con la salud muscular. Considera revisar tus hábitos y buscar orientación profesional.',
                '#fff2d9', '#8c6118',
            ],
            [
                'Consulta recomendada',
                'Tus respuestas sugieren que sería conveniente solicitar una evaluación profesional de tu fuerza y función muscular.',
                '#fce9ec', '#a72e48',
            ],
        ][r];

        panel.innerHTML = `
            <div class="text-sm lg:text-md font-bold tracking-[0.12em] text-(--deep-purple) uppercase">TU ORIENTACIÓN PERSONALIZADA</div>
            <div class="py-[18px] px-5 rounded-xl my-3.5" style="background-color:${bgColor}">
                <h3 class="text-xl lg:text-2xl font-bold mb-1.5" style="color:${textColor}">${title}</h3>
                <p class="text-sm lg:text-md text-[#555] leading-[1.55] m-0">${desc}</p>
            </div>
            <div class="text-sm sm:text-md lg:text-base text-(--night-blue)/80 py-[9px] border-b border-[#f0f0f0] leading-[1.5]">💪 Ejercicios de fuerza adaptados a tus capacidades.</div>
            <div class="text-sm sm:text-md lg:text-base text-(--night-blue)/80 py-[9px] border-b border-[#f0f0f0] leading-[1.5]">🥗 Alimentación equilibrada con suficiente proteína.</div>
            <div class="text-sm sm:text-md lg:text-base text-(--night-blue)/80 py-[9px] border-b border-[#f0f0f0] leading-[1.5]">☀️ Consulta sobre vitamina D y micronutrientes.</div>
            <div class="text-sm sm:text-md lg:text-base text-(--night-blue)/80 py-[9px] border-b border-[#f0f0f0] leading-[1.5]">🩺 Evaluación profesional si notas cambios en tu fuerza.</div>
            <div class="mt-5">
                <a href="#" class="block text-center py-3 px-4 color-gradient-primary text-white font-bold rounded-full no-underline text-md lg:text-lg tracking-[0.05em] hover:brightness-115 transition-brightness duration-300 ease-in-out">
                    CONOCE MÁS SOBRE ELONGAL® →
                </a>
            </div>
            <button class="py-3 px-4 border-[1.5px] border-[#ddd] rounded-full bg-white text-[#666] text-md lg:text-lg cursor-pointer transition-[border-color,color] duration-300 hover:border-(--deep-purple) hover:text-(--deep-purple) w-full mt-2.5 text-center" id="quiz-again">
                Realizar nuevamente
            </button>
            <p class="text-sm lg:text-md text-(--night-blue)/40 leading-[1.6] mt-3.5">
                Orientación educativa. No sustituye una evaludación médica.
            </p>
        `;
        document.getElementById('quiz-again').onclick = start;
    }

    start();
})();

/* ── Categories scroll ───────────────────────────────────────── */
(function () {
    const section = document.getElementById('categories-section');
    const imgWrap = document.getElementById('cat-images');
    if (!section || !imgWrap) return;

    gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

    const items = [...imgWrap.querySelectorAll('.cat-img-item')];
    const tabs  = [...document.querySelectorAll('#cat-tabs .cat-tab')];
    const descs = [...document.querySelectorAll('.cat-desc')];
    const N     = items.length;

    const GAP            = 2;
    const MARGIN         = 15;  // espacio libre arriba y abajo del stack
    const SCALE_ACTIVE   = 1;
    const SCALE_INACTIVE = 0.72;
    const COLOR_ACTIVE   = '#702082';
    const COLOR_INACTIVE = 'rgba(23,19,78,0.35)';

    // Calcula dimensiones en base al contenedor real
    function computeLayout() {
        const h     = imgWrap.offsetHeight;
        const itemH = (h - MARGIN * 2 - GAP * (N - 1)) / N;
        const step  = itemH + GAP;
        const halfH = h / 2;
        return { h, itemH, step, halfH };
    }

    let ly = computeLayout();

    // Posiciona cada item según el progreso del scroll (0 → 1)
    function renderCarousel(p) {
        const { itemH, step, halfH } = ly;
        const totalMove  = (N - 1) * step;
        const centerTop  = halfH - itemH / 2;

        items.forEach((item, i) => {
            const y          = centerTop + i * step - p * totalMove;
            const itemCenter = y + itemH / 2;
            const dist       = Math.abs(itemCenter - halfH);
            const nd         = Math.min(dist / step, 1); // 0 = activo, 1 = una posición fuera
            const sc         = gsap.utils.interpolate(SCALE_ACTIVE, SCALE_INACTIVE, nd);
            const lbl        = item.querySelector('.cat-img-label');

            gsap.set(item, {
                y,
                height:          itemH,
                scale:           sc,
                opacity:         gsap.utils.interpolate(1, 0.55, nd),
                zIndex:          Math.round(10 - nd * 10),
                transformOrigin: 'center center',
            });

            if (lbl) {
                gsap.set(lbl, {
                    fontSize: gsap.utils.interpolate(1.2, 0.8125, nd) + 'rem',
                });
            }
        });
    }

    // Actualiza tabs y descripción cuando cambia la categoría activa
    const CAT_NAV_KEYS = ['ciencia', 'bienestar', 'profesionales'];

    function activateMeta(idx, animated) {
        if (animated && window.setActiveNav) window.setActiveNav(CAT_NAV_KEYS[idx]);

        const dur = animated ? 0.45 : 0;

        tabs.forEach((tab, i) => {
            const isAct = i === idx;
            const c    = isAct ? COLOR_ACTIVE : COLOR_INACTIVE;
            const size = isAct ? '1.25rem' : '1.125rem';
            const lbl  = tab.querySelector('.cat-tab-label');
            const icon = tab.querySelector('.cat-tab-icon');
            if (animated) {
                gsap.to([icon, lbl], { color: c, duration: dur, ease: 'power2.out' });
                gsap.to(lbl, { fontSize: size, duration: dur, ease: 'power2.out' });
            } else {
                gsap.set([icon, lbl], { color: c });
                gsap.set(lbl, { fontSize: size });
            }
        });

        descs.forEach((desc, i) => {
            const isAct = i === idx;
            const props = { autoAlpha: isAct ? 1 : 0, y: isAct ? 0 : (i < idx ? -8 : 8) };
            if (animated) {
                gsap.to(desc, { ...props, duration: dur * 0.8, ease: 'power2.inOut' });
            } else {
                gsap.set(desc, props);
            }
        });
    }

    // Estado inicial
    gsap.set(descs, { autoAlpha: 0, y: 8 });
    renderCarousel(0);
    activateMeta(0, false);

    // Animaciones de entrada scrub-driven (se revierten al hacer scroll hacia arriba)
    const entranceST = {
        trigger: section,
        start:   'top 60%',
        end:     'top 10%',
        scrub:   0.8,
    };

    const h2  = section.querySelector('h2');
    const cta = section.querySelector('a[href]');

    gsap.from(h2,  { x: -60, autoAlpha: 0, ease: 'power2.out', scrollTrigger: entranceST });
    gsap.from(document.getElementById('cat-tabs'), { x: -50, autoAlpha: 0, ease: 'power2.out', scrollTrigger: entranceST, delay: 0.08 });
    gsap.from(cta, { x: -40, autoAlpha: 0, ease: 'power2.out', scrollTrigger: entranceST, delay: 0.14 });
    gsap.from(imgWrap, { x: 70, autoAlpha: 0, ease: 'power2.out', scrollTrigger: entranceST });

    let current = 0;

    // Mapea el progreso raw del scroll a la animación con pausas por categoría.
    // Cada categoría ocupa `DWELL` del scroll total; las transiciones se comprimen entre medias.
    const DWELL = 0.10;                           // 25 % del scroll = pausa en cada categoría
    const TRANS = (1 - N * DWELL) / (N - 1);     // fracción restante para cada transición

    function mapProgress(raw) {
        let rawPos = 0, animPos = 0;
        for (let i = 0; i < N; i++) {
            const dwellEnd = rawPos + DWELL;
            if (raw <= dwellEnd) return animPos;              // zona de pausa
            rawPos = dwellEnd;
            if (i < N - 1) {
                const transEnd = rawPos + TRANS;
                const animNext = (i + 1) / (N - 1);
                if (raw <= transEnd)
                    return animPos + (animNext - animPos) * (raw - rawPos) / TRANS;
                rawPos  = transEnd;
                animPos = animNext;
            }
        }
        return 1;
    }

    // Proxy para suavizar el scrub (scrub: 1.5 s de lag)
    const proxy = { p: 0 };

    gsap.to(proxy, {
        p: 1,
        ease: 'none',
        onUpdate() {
            const mapped = mapProgress(proxy.p);
            renderCarousel(mapped);
            const idx = Math.round(mapped * (N - 1));
            if (idx !== current) {
                current = idx;
                activateMeta(idx, true);
            }
        },
        scrollTrigger: {
            trigger: section,
            start:   'top top',
            end:     'bottom bottom',
            scrub:   1.5,
        },
    });

    function scrollToCategory(i) {
        const raw         = i * (DWELL + TRANS) + DWELL / 2;
        const scrollRange = section.offsetHeight - window.innerHeight;
        const targetY     = section.getBoundingClientRect().top + window.scrollY + raw * scrollRange;
        gsap.to(window, { scrollTo: targetY, duration: 0.8, ease: 'power3.out' });
    }

    tabs.forEach((tab, i) => {
        tab.addEventListener('click', () => scrollToCategory(i));
    });

    items.forEach((item, i) => {
        item.addEventListener('click', () => scrollToCategory(i));
    });

    window.addEventListener('resize', () => {
        ly = computeLayout();
        renderCarousel(proxy.p);
    });
})();

/* ── Blog cards hover ────────────────────────────────────────── */
(function () {
    const cards = document.querySelectorAll('.blog-card');
    if (!cards.length) return;

    const mm = gsap.matchMedia();

    // Solo en dispositivos con hover real; en touch la caja de info queda visible
    mm.add('(hover: hover)', () => {
        const handlers = [];

        cards.forEach((card) => {
            const media = card.querySelector('.blog-card-media');
            const img   = card.querySelector('.blog-card-img');
            const info  = card.querySelector('.blog-card-info');
            const texts = card.querySelectorAll('.blog-card-text');
            const caption = card.querySelector('.blog-card-caption');

            gsap.set(media, { clipPath: 'inset(0% 0% 0% 0%)' });
            gsap.set(info,  { clipPath: 'inset(0% 0% 0% 100%)' });
            gsap.set(texts, { y: 12, opacity: 0 });

            const tl = gsap.timeline({ paused: true, defaults: { ease: 'power3.out' } })
                .to(caption, { y: 12, opacity: 0, duration: 0.3 }, 0)
                .to(media, { clipPath: 'inset(28px 0px 0px 28px)', duration: 0.6 }, 0)
                .to(img,   { scale: 1.08, duration: 0.8 }, 0)
                .to(info,  { clipPath: 'inset(0% 0% 0% 0%)', duration: 0.5 }, 0.1)
                .to(texts, { y: 0, opacity: 1, duration: 0.4, stagger: 0.06 }, 0.25);

            const enter = () => tl.timeScale(1).play();
            const leave = () => tl.timeScale(1.8).reverse();

            card.addEventListener('mouseenter', enter);
            card.addEventListener('mouseleave', leave);
            handlers.push({ card, enter, leave });
        });

        return () => {
            handlers.forEach(({ card, enter, leave }) => {
                card.removeEventListener('mouseenter', enter);
                card.removeEventListener('mouseleave', leave);
            });
        };
    });
})();

/* ── Information cards entrance + hover ─────────────────────── */
(function () {
    const grid = document.getElementById('information-cards');
    if (!grid) return;

    gsap.registerPlugin(ScrollTrigger);

    const [card1, card2] = grid.children;

    // Entrance
    gsap.set(card1, { x: -60, opacity: 0 });
    gsap.set(card2, { x:  60, opacity: 0 });

    ScrollTrigger.create({
        trigger: grid,
        start: 'top 80%',
        once: true,
        onEnter: () => {
            gsap.to(card1, { x: 0, opacity: 1, duration: 0.7, ease: 'power3.out' });
            gsap.to(card2, { x: 0, opacity: 1, duration: 0.7, ease: 'power3.out', delay: 0.1 });
        },
    });

    // Hover — solo dispositivos con puntero real
    gsap.matchMedia().add('(hover: hover)', () => {
        const icon = card1.querySelector('svg');
        const img  = card2.querySelector('img');

        [card1, card2].forEach((card) => {
            const isCard2 = card === card2;

            const tl = gsap.timeline({ paused: true, defaults: { ease: 'power2.out', duration: 0.3 } })
                .to(card, { y: -4, boxShadow: '0 4px 10px rgba(0,0,0,0.22)' }, 0);

            if (!isCard2 && icon) tl.to(icon, { scale: 1.15, duration: 0.4 }, 0);
            if (isCard2  && img)  tl.to(img,  { scale: 1.04, duration: 0.5 }, 0);

            card.addEventListener('mouseenter', () => tl.play());
            card.addEventListener('mouseleave', () => tl.reverse());
        });
    });
})();

/* ── Categories nav links from header ───────────────────────── */
// (function () {
//     gsap.registerPlugin(ScrollToPlugin);

//     const N     = 3;
//     const DWELL = 0.10;
//     const TRANS = (1 - N * DWELL) / (N - 1);

//     document.querySelectorAll('[data-cat-index]').forEach(link => {
//         link.addEventListener('click', (e) => {
//             const section = document.getElementById('categories-section');
//             if (!section || getComputedStyle(section).display === 'none') return;

//             e.preventDefault();

//             const i           = +link.dataset.catIndex;
//             const raw         = i * (DWELL + TRANS) + DWELL / 2;
//             const scrollRange = section.offsetHeight - window.innerHeight;
//             const targetY     = section.getBoundingClientRect().top + window.scrollY + raw * scrollRange;

//             gsap.to(window, { scrollTo: { y: targetY }, duration: 0.8, ease: 'power3.out' });
//         });
//     });
// })();

/* ── Active nav on scroll (home) ─────────────────────────────── */
(function () {
    if (!window.setActiveNav) return;

    gsap.registerPlugin(ScrollTrigger);

    [
        { id: 'hero',                 key: 'inicio' },
        { id: 'product-card-section', key: 'conoce-elongal' },
        { id: 'aplicaciones',         key: 'salud-muscular' },
        { id: 'categories-section',   key: 'ciencia' },
    ].forEach(function ({ id, key }) {
        const el = document.getElementById(id);
        if (!el) return;
        ScrollTrigger.create({
            trigger:     el,
            start:       'top 50%',
            onEnter:     () => window.setActiveNav(key),
            onEnterBack: () => window.setActiveNav(key),
        });
    });
})();