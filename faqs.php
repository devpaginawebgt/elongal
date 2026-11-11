<?php
if (session_status() === PHP_SESSION_NONE) session_start();
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'));

$faqs = [
    [
        'q' => '¿Qué es Elongal® y para qué sirve?',
        'a' => 'Elongal® es una formulación de apoyo nutricional para la salud muscular que combina CaHMB, vitamina D3 y magnesio. Puede acompañar las necesidades asociadas con el envejecimiento, la pérdida de masa muscular y los períodos de baja o intensa actividad física, según evaluación médica.',
    ],
    [
        'q' => '¿Qué contiene cada sobre de Elongal®?',
        'a' => 'Cada sobre contiene CaHMB 3 g, equivalente a 2.4 g de hidroximetilbutirato —HMB—; vitamina D3 2,000 UI y magnesio base 400 mg. Su presentación es en polvo para solución oral.',
    ],
    [
        'q' => '¿Qué es el HMB y qué relación tiene con la salud muscular?',
        'a' => 'El HMB es una sustancia que el organismo produce a partir de la leucina, un aminoácido presente en las proteínas. Se ha investigado por su participación en los procesos de síntesis y degradación de proteínas musculares. Sus efectos dependen de factores como la edad, la alimentación y la actividad física.',
    ],
    [
        'q' => '¿Por qué se pierde masa muscular con la edad?',
        'a' => 'Durante el envejecimiento ocurren cambios que pueden reducir la masa y la fuerza muscular. La poca actividad física y una alimentación insuficiente también pueden contribuir. Cuando la pérdida afecta la fuerza y la función física, puede estar relacionada con sarcopenia y requiere evaluación profesional.',
    ],
    [
        'q' => '¿Cómo puedo cuidar la masa muscular durante el envejecimiento?',
        'a' => 'El cuidado muscular combina ejercicios de fuerza adaptados a cada persona, una alimentación suficiente y equilibrada, y un aporte adecuado de proteínas. La orientación profesional permite ajustar estos hábitos al estado de salud y mantener actividades importantes para la movilidad y la independencia.',
    ],
    [
        'q' => '¿Elongal® puede acompañar el cuidado muscular en adultos mayores?',
        'a' => 'Elongal® está indicado como apoyo nutricional en la pérdida de masa muscular asociada con la edad. Su uso debe considerar las necesidades individuales y formar parte de un cuidado integral que incluya alimentación y actividad física adaptada.',
    ],
    [
        'q' => '¿Qué aportan la vitamina D3 y el magnesio a los músculos?',
        'a' => 'La vitamina D participa en la función muscular y ayuda al organismo a absorber el calcio. El magnesio interviene en el funcionamiento de los músculos y los nervios, así como en procesos relacionados con la producción de proteínas y la salud ósea.',
    ],
    [
        'q' => '¿El HMB sustituye las proteínas de la alimentación o el ejercicio?',
        'a' => 'El HMB no reemplaza una alimentación con suficientes proteínas ni la actividad física. El ejercicio de fuerza y una nutrición adecuada siguen siendo pilares del cuidado muscular. El apoyo nutricional debe valorarse según las necesidades de cada persona.',
    ],
    [
        'q' => '¿Cómo se prepara y se toma Elongal®?',
        'a' => 'La información del fabricante indica un sobre al día, disuelto en agua. Vacía el contenido en un vaso con agua, mezcla hasta disolver e ingiere. No lo prepares en bebidas alcohólicas ni gasificadas. Sigue las instrucciones del empaque y la indicación de tu médico.',
    ],
    [
        'q' => '¿En cuánto tiempo pueden notarse los beneficios de Elongal®?',
        'a' => 'Estudios en adultos mayores sobre sus ingredientes reportan mejoras en algunos indicadores de fuerza y rendimiento físico a las 8 semanas con HMB (Berton et al., 2015) y de función muscular a los 3 meses con CaHMB + vitamina D3 (Rathmacher et al., 2020). Los resultados pueden variar. Acompaña su uso con actividad física y una alimentación adecuada, rica en proteínas.',
    ],
    [
        'q' => '¿Qué debo consultar antes de tomar Elongal®?',
        'a' => 'Informa a tu médico sobre tus enfermedades, medicamentos y otros suplementos. Elongal® no debe utilizarse en personas con insuficiencia renal grave, niveles elevados de calcio o magnesio, o alergia a sus componentes. Consulta también las indicaciones específicas para embarazo, lactancia y población pediátrica.',
    ],
    [
        'q' => '¿Elongal® puede causar efectos secundarios?',
        'a' => 'Durante su consumo pueden presentarse molestias como náuseas, diarrea, estreñimiento o flatulencia, entre otros efectos. Si experimentas una reacción o malestar, consulta a tu médico y revisa la información de seguridad del producto.',
    ],
    [
        'q' => '¿En qué sabores está disponible Elongal®?',
        'a' => 'Elongal® cuenta con las opciones Cítrico y Frutos Rojos. Consulta la disponibilidad de cada presentación en las farmacias de tu país.',
    ],
    [
        'q' => '¿Dónde puedo comprar Elongal®?',
        'a' => 'En la sección «Dónde encontrarlo» puedes seleccionar tu país y consultar las farmacias publicadas. Desde allí podrás acceder al sitio de cada establecimiento para revisar disponibilidad y precio.',
    ],
    [
        'q' => '¿Cómo debo conservar Elongal®?',
        'a' => 'Consérvalo en su envase original, en un lugar seco, protegido de la luz y a una temperatura no mayor de 30 °C. Mantenlo fuera del alcance de los niños y no lo utilices después de su fecha de vencimiento.',
    ],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs y Contacto — Elongal</title>
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>/assets/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen w-full m-0 p-0 overflow-x-hidden bg-(--light)">

    <?php $active_page = 'faqs'; include_once './components/header.php'; ?>

    <!-- ═══════════════════════════════════════════════════════
         SECCIÓN 1: Hero
    ════════════════════════════════════════════════════════ -->
    <section class="relative w-full overflow-hidden min-h-[360px] md:min-h-[450px] lg:min-h-[460px]">

        <img src="<?= BASE_URL ?>/assets/images/banners/diseño-morado.png"
             alt="" aria-hidden="true"
             class="hidden md:block absolute inset-0 w-full h-full object-cover 2xl:object-contain object-right-bottom">

        <div class="absolute inset-0 pt-40 md:pt-36 md:pt-44 pb-10 md:pb-14 flex flex-col justify-center">
            <div class="px-6 md:px-10 lg:px-16 2xl:max-w-360 2xl:mx-auto w-full">

                <nav id="faq-breadcrumb" aria-label="Breadcrumb" class="mb-6">
                    <ol class="flex items-center gap-2 text-sm text-gray-400">
                        <li>
                            <a href="<?= BASE_URL ?>/"
                               class="hover:text-(--deep-purple) transition-colors duration-200">
                                Inicio
                            </a>
                        </li>
                        <li aria-hidden="true">/</li>
                        <li class="text-(--night-blue) font-medium" aria-current="page">FAQs y contacto</li>
                    </ol>
                </nav>

                <h1 id="faq-hero-title"
                    class="text-5xl md:text-6xl lg:text-7xl font-black text-(--night-blue) leading-[1.05] mb-6">
                    Resolvemos<br>tus dudas<span class="text-(--strong-red)">.</span>
                </h1>

                <p id="faq-hero-subtitle" class="text-lg text-gray-500 max-w-md leading-relaxed">
                    Encuentra respuestas sobre Elongal y escríbenos si necesitas más información.
                </p>

            </div>
        </div>

    </section>

    <!-- ═══════════════════════════════════════════════════════
         SECCIÓN 2: Preguntas frecuentes
    ════════════════════════════════════════════════════════ -->
    <section id="faq-questions" class="w-full bg-(--light) py-12">
        <div class="px-6 md:px-10 lg:px-16 2xl:max-w-360 2xl:mx-auto">
            <div class="grid md:grid-cols-[260px_auto] gap-12 lg:gap-16 items-start">

                <!-- Columna izquierda -->
                <div id="faq-left-col">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-(--night-blue) leading-tight mb-3">
                        Preguntas<br class="hidden md:block"> frecuentes
                    </h2>
                    <p class="text-gray-500 leading-relaxed">
                        Todo lo que necesitas saber, en un solo lugar.
                    </p>

                    <!-- Card -->
                    <div class="bg-(--deep-purple)/10 rounded-2xl p-6 mt-10 flex flex-col items-center text-center">
                        <div class="w-14 h-14 rounded-full bg-white flex items-center justify-center mb-4 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                 viewBox="0 0 24 24" fill="none"
                                 stroke="var(--deep-purple)" stroke-width="1.6"
                                 stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-(--night-blue) mb-2 leading-snug">
                            ¿No encontraste<br>tu respuesta?
                        </h3>
                        <p class="text-sm text-gray-500 mb-5">Estamos aquí para ayudarte.</p>
                        <a href="#faq-contact"
                           class="inline-flex items-center gap-2 border-2 border-(--deep-purple) text-(--deep-purple) text-sm font-semibold px-5 py-2.5 rounded-full hover:bg-(--deep-purple) hover:text-white transition-all duration-300">
                            Escríbenos
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 5v14M5 12l7 7 7-7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Columna derecha: búsqueda + acordeón -->
                <div id="faq-right-col">

                    <!-- Input de búsqueda -->
                    <div class="relative mb-5">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"
                             xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                        </svg>
                        <input id="faq-search"
                               type="search"
                               placeholder="Busca una pregunta"
                               class="w-full border border-gray-200 rounded-xl pl-11 pr-4 py-3.5 text-sm text-gray-700 bg-white shadow-sm"
                               aria-label="Buscar pregunta frecuente">
                    </div>

                    <!-- Acordeón -->
                    <div id="faq-list" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <?php foreach ($faqs as $i => $faq): ?>
                            <div class="faq-item<?= $i > 0 ? ' border-t border-gray-100' : '' ?>"
                                 data-question="<?= strtolower(htmlspecialchars($faq['q'], ENT_QUOTES, 'UTF-8')) ?>">

                                <button class="faq-trigger w-full text-left flex justify-between items-center px-6 py-5 gap-4 cursor-pointer"
                                        aria-expanded="false">
                                    <span class="font-medium text-(--night-blue) text-sm md:text-base leading-snug">
                                        <?= htmlspecialchars($faq['q'], ENT_QUOTES, 'UTF-8') ?>
                                    </span>
                                    <svg class="faq-chevron shrink-0 text-gray-400"
                                         xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                         aria-hidden="true">
                                        <path d="M6 9l6 6 6-6"/>
                                    </svg>
                                </button>

                                <div class="faq-answer overflow-hidden" style="height: 0">
                                    <p class="px-6 pb-5 text-sm text-gray-500 leading-relaxed">
                                        <?= htmlspecialchars($faq['a'], ENT_QUOTES, 'UTF-8') ?>
                                    </p>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Sin resultados -->
                    <p id="faq-no-results" class="hidden text-center text-sm text-gray-400 mt-6 py-4">
                        No se encontraron preguntas para tu búsqueda.
                    </p>

                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════
         SECCIÓN 3: Conversemos
    ════════════════════════════════════════════════════════ -->
    <section id="faq-contact" class="w-full pt-8 pb-16">
        <div class="px-6 md:px-10 lg:px-16 2xl:max-w-360 2xl:mx-auto">

            <!-- Encabezado -->
            <div id="faq-contact-header" class="mb-8 lg:mb-12">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-(--night-blue) leading-tight mb-3">
                    Conversemos<span class="text-(--strong-red)">.</span>
                </h2>
                <p class="text-lg text-gray-500 max-w-lg">Cuéntanos cómo podemos ayudarte.</p>
            </div>

            <div class="grid md:grid-cols-[auto_280px] lg:grid-cols-[auto_320px] gap-10">

                <!-- Formulario -->
                <div id="faq-form-panel" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                    <h3 class="text-xl font-bold text-(--night-blue) mb-6">Envíanos tu consulta</h3>
                    <form id="contact-form" data-action="<?= BASE_URL ?>/contact-submit.php" novalidate class="space-y-4">

                        <!-- Nombre + Correo -->
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label for="cf-name"
                                       class="block text-xs font-semibold text-gray-500 mb-1.5 uppercase tracking-wide">
                                    Nombre
                                </label>
                                <input id="cf-name" name="name" type="text" placeholder="Tu nombre"
                                       class="border border-gray-200 rounded-lg px-4 py-2.5 w-full text-sm text-gray-700 bg-white">
                            </div>
                            <div>
                                <label for="cf-email"
                                       class="block text-xs font-semibold text-gray-500 mb-1.5 uppercase tracking-wide">
                                    Correo electrónico
                                </label>
                                <input id="cf-email" name="email" type="email" placeholder="Tu correo electrónico"
                                       class="border border-gray-200 rounded-lg px-4 py-2.5 w-full text-sm text-gray-700 bg-white">
                            </div>
                        </div>

                        <!-- País + Motivo -->
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label for="cf-country"
                                       class="block text-xs font-semibold text-gray-500 mb-1.5 uppercase tracking-wide">
                                    País
                                </label>
                                <select id="cf-country" name="country"
                                        class="border border-gray-200 rounded-lg px-4 py-2.5 w-full text-sm text-gray-700 bg-white appearance-none cursor-pointer">
                                    <?php foreach ($countries as $c): ?>
                                        <option value="<?= $c['code'] ?>"
                                            <?= $c['code'] === $active_country ? 'selected' : '' ?>>
                                            <?= $c['name'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label for="cf-reason"
                                       class="block text-xs font-semibold text-gray-500 mb-1.5 uppercase tracking-wide">
                                    Motivo de consulta
                                </label>
                                <select id="cf-reason" name="reason"
                                        class="border border-gray-200 rounded-lg px-4 py-2.5 w-full text-sm text-gray-700 bg-white appearance-none cursor-pointer">
                                    <option value="">Selecciona una opción</option>
                                    <option>Información del producto</option>
                                    <option>Puntos de venta</option>
                                    <option>Para profesionales</option>
                                    <option>Otro</option>
                                </select>
                            </div>
                        </div>

                        <!-- Mensaje -->
                        <div>
                            <label for="cf-message"
                                   class="block text-xs font-semibold text-gray-500 mb-1.5 uppercase tracking-wide">
                                Consulta
                            </label>
                            <textarea id="cf-message" name="message" rows="5"
                                      placeholder="Aquí escribe tu pregunta..."
                                      class="border border-gray-200 rounded-lg px-4 py-2.5 w-full text-sm text-gray-700 bg-white resize-none"></textarea>
                        </div>

                        <!-- Checkbox política -->
                        <!-- <label class="flex items-start gap-3 text-sm text-gray-500 cursor-pointer select-none">
                            <input type="checkbox" id="cf-privacy" name="privacy"
                                   class="mt-0.5 w-4 h-4 shrink-0 cursor-pointer accent-(--deep-purple)">
                            <span>
                                He leído y acepto la
                                <a href="#" class="text-(--deep-purple) underline underline-offset-2 hover:opacity-70 transition-opacity">
                                    política de privacidad
                                </a>.
                            </span>
                        </label> -->

                        <!-- Turnstile -->
                        <div class="cf-turnstile" data-sitekey="0x4AAAAAAF2ibdZ8dNuTfBti"></div>

                        <!-- Botón enviar -->
                        <div class="pt-2">
                            <button type="submit"
                                    class="color-gradient-primary text-white rounded-full px-8 py-3 font-semibold text-sm flex items-center gap-2 hover:brightness-110 transition-all cursor-pointer w-full md:w-auto justify-center">
                                Enviar mensaje
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </div>

                    </form>

                    <!-- Mensaje de estado del formulario -->
                    <div id="cf-status" class="hidden" role="alert" aria-live="polite"></div>
                </div>

                <!-- Panel contacto alternativo -->
                <div id="faq-contact-panel">
                    <h3 class="text-2xl font-bold text-(--night-blue) mb-2 leading-snug">
                        También puedes<br>contactarnos
                    </h3>
                    <p class="text-sm text-gray-500 leading-relaxed mb-7">
                        Si prefieres, puedes comunicarte con nosotros a través de los siguientes canales.
                    </p>

                    <!-- Card correo -->
                    <a href="mailto:informacion@lab-lafage.com"
                       class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 hover:border-(--deep-purple) hover:shadow-sm transition-all duration-300 group">
                        <div class="w-11 h-11 rounded-full bg-[#ede8f5] flex items-center justify-center shrink-0 group-hover:bg-(--deep-purple) transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                 viewBox="0 0 24 24" fill="none"
                                 stroke="var(--deep-purple)" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="group-hover:stroke-white transition-colors duration-300" aria-hidden="true">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-(--night-blue) text-sm">Correo electrónico</p>
                            <p class="text-xs text-gray-400 mt-0.5">informacion@lab-lafage.com</p>
                        </div>
                    </a>

                    <!-- Card teléfono -->
                    <a href="tel:50222370100"
                       class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 hover:border-(--deep-purple) hover:shadow-sm transition-all duration-300 group mt-3">
                        <div class="w-11 h-11 rounded-full bg-[#ede8f5] flex items-center justify-center shrink-0 group-hover:bg-(--deep-purple) transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                 viewBox="0 0 24 24" fill="none"
                                 stroke="var(--deep-purple)" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="group-hover:stroke-white transition-colors duration-300" aria-hidden="true">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.57 3.38 2 2 0 0 1 3.54 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.6a16 16 0 0 0 6 6l.86-.86a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.58 16l.34.92z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-(--night-blue) text-sm">Teléfono</p>
                            <p class="text-xs text-gray-400 mt-0.5">(502) 2237-0100</p>
                        </div>
                    </a>

                    <!-- Redes sociales -->
                    <p class="mt-8 font-semibold text-(--night-blue) text-sm text-center md:text-start">Síguenos en nuestras redes</p>
                    <div class="flex justify-center md:justify-start gap-3 mt-3">
                        <a href="https://www.facebook.com/profile.php?id=100083142948078" target="_blank" aria-label="Facebook"
                           class="w-11 h-11 rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-200"
                           style="background-color: #1877F2;">
                            <svg class="w-5 h-5" fill="white" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/elongal_ca/" target="_blank" aria-label="Instagram"
                           class="w-11 h-11 rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-200"
                           style="background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);">
                            <svg class="w-5 h-5 fill-none" stroke="white" stroke-width="2.2"
                                 viewBox="0 0 24 24" aria-hidden="true">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include_once './components/footer.php'; ?>

    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollTrigger.min.js"></script>
    <script src="<?= BASE_URL ?>/js/layout.js"></script>
    <script src="<?= BASE_URL ?>/js/faqs.js"></script>

</body>
</html>
