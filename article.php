<?php
if (session_status() === PHP_SESSION_NONE) session_start();
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'));

$refs = [
    ['num' => 1, 'title' => 'Estudio sobre HMB y salud muscular',          'meta' => 'Autoría · Revista · Año · DOI'],
    ['num' => 2, 'title' => 'Revisión sobre nutrición y función muscular',  'meta' => 'Autoría · Revista · Año · DOI'],
    ['num' => 3, 'title' => 'Documento sobre movimiento y envejecimiento',  'meta' => 'Institución · Año · Documento de referencia'],
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMB: una mirada desde la ciencia — Blog Elongal</title>
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>/assets/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen w-full m-0 p-0 overflow-x-hidden bg-(--light)">

    <?php include_once './components/header.php'; ?>

    <main id="article-page">

        <!-- ① HERO ──────────────────────────────────────────────────── -->
        <section id="article-hero" class="relative w-full overflow-hidden min-h-[360px] md:min-h-[450px] lg:min-h-[460px] 2xl:max-w-360 2xl:mx-auto">

            <img src="<?= BASE_URL ?>/assets/images/banners/banner-blog.png"
                 alt=""
                 aria-hidden="true"
                 class="hidden md:block absolute inset-0 w-full h-full object-contain object-right">

            <div class="absolute inset-0 pt-40 md:pt-36 pb-10 md:pb-14 flex flex-col justify-center">
                <div class="px-6 md:px-10 lg:px-16 w-full md:max-w-120 xl:max-w-220">

                    <!-- ② BREADCRUMB ─────────────────────────────────────────────── -->
                    <nav aria-label="Ruta de navegación">
                        <ol class="flex items-center flex-wrap gap-1.5 text-sm text-gray-400 mb-5">
                            <li>
                                <a href="<?= BASE_URL ?>/"
                                class="hover:text-(--deep-purple) transition-colors duration-200">Inicio</a>
                            </li>
                            <li><span class="text-gray-200 select-none">/</span></li>
                            <li>
                                <a href="<?= BASE_URL ?>/blog.php"
                                class="hover:text-(--deep-purple) transition-colors duration-200">Blog</a>
                            </li>
                            <li><span class="text-gray-200 select-none">/</span></li>
                            <li class="text-(--deep-purple) font-semibold">Ciencia y evidencia</li>
                        </ol>
                    </nav>

                    <p id="article-hero-badge"
                       class="text-xs font-bold uppercase tracking-widest text-(--light-purple) mb-3">
                        Blog Elongal®
                    </p>

                    <h1 id="article-hero-title"
                        class="text-4xl md:text-5xl lg:text-6xl font-black text-(--night-blue) leading-tight mb-4">
                        Conocimiento que te mueve<span class="text-(--strong-red)">.</span>
                    </h1>

                    <p id="article-hero-subtitle"
                       class="text-sm md:text-base text-gray-500 leading-relaxed max-w-sm">
                        Ciencia, bienestar y recursos para cuidar tu salud muscular.
                    </p>

                </div>
            </div>

        </section>

        <!-- ③ ARTÍCULO + SIDEBAR ─────────────────────────────────────── -->
        <div class="2xl:max-w-360 mx-auto px-5 md:px-10 py-10 pb-20">
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12 xl:gap-16 items-start">

                <!-- SIDEBAR ──────────────────────────────────────────── -->
                <aside id="article-sidebar"
                       class="w-full lg:w-64 xl:w-72 shrink-0 lg:sticky lg:top-28 lg:self-start flex flex-col gap-4">

                    <!-- TOC Card -->
                    <div class="border border-gray-200 rounded-2xl p-5 bg-white">
                        <h2 class="text-sm font-bold text-(--night-blue) mb-3">En este artículo</h2>
                        <ul class="flex flex-col">
                            <li><a href="#introduccion" class="toc-link">Introducción</a></li>
                            <li><a href="#hmb"          class="toc-link">¿Qué es el HMB?</a></li>
                            <li><a href="#evidencia"    class="toc-link">Cómo leer la evidencia</a></li>
                            <li><a href="#habitos"      class="toc-link">Salud muscular y hábitos</a></li>
                        </ul>
                    </div>

                    <!-- References Card -->
                    <div class="bg-(--deep-purple) text-white rounded-2xl p-5">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="shrink-0 w-9 h-9 rounded-lg bg-white/15 flex items-center justify-center mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     fill="none" stroke="white" stroke-width="1.7"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="w-5 h-5">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                    <line x1="16" y1="13" x2="8" y2="13"/>
                                    <line x1="16" y1="17" x2="8" y2="17"/>
                                    <polyline points="10 9 9 9 8 9"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-base mb-1">Referencias</h3>
                                <p class="text-xs text-white/75 leading-snug">
                                    Consulta las fuentes utilizadas en este artículo.
                                </p>
                            </div>
                        </div>
                        <a href="#referencias"
                           class="block w-full text-center color-gradient-primary text-white text-sm font-semibold py-2.5 rounded-full hover:brightness-110 transition-all duration-200 cursor-pointer">
                            Consultar referencias ↓
                        </a>
                    </div>

                </aside>

                <!-- ARTÍCULO PRINCIPAL ───────────────────────────────── -->
                <article class="flex-1 min-w-0">

                    <!-- Header del artículo -->
                    <header id="article-header" class="border-b border-gray-100 pb-8 mb-10">

                        <p class="text-xs font-bold uppercase tracking-widest text-gradient-primary mb-3">
                            Ciencia y Evidencia
                        </p>

                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-(--night-blue) leading-tight mb-5">
                            HMB: una mirada desde la ciencia
                        </h1>

                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <time datetime="2026-10-22" class="text-sm text-gray-400">
                                Publicado el 22 de octubre de 2026
                            </time>
                            <div class="flex items-center gap-2">
                                <!-- Facebook -->
                                <a href="#" aria-label="Compartir en Facebook"
                                   class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-(--deep-purple) hover:text-(--deep-purple) transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                                    </svg>
                                </a>
                                <!-- WhatsApp -->
                                <a href="#" aria-label="Compartir en WhatsApp"
                                   class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#25D366] hover:text-[#25D366] transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                                    </svg>
                                </a>
                                <!-- LinkedIn -->
                                <a href="#" aria-label="Compartir en LinkedIn"
                                   class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#0A66C2] hover:text-[#0A66C2] transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                                        <rect x="2" y="9" width="4" height="12"/>
                                        <circle cx="4" cy="4" r="2"/>
                                    </svg>
                                </a>
                                <!-- Copiar enlace -->
                                <button id="share-link" aria-label="Copiar enlace"
                                        class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-(--deep-purple) hover:text-(--deep-purple) transition-colors duration-200 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </header>

                    <!-- Cuerpo del artículo -->
                    <div class="article-body">

                        <section id="introduccion" class="article-section mb-10">
                            <h2 class="article-h2">Introducción</h2>
                            <p class="article-p">
                                Una lectura para comprender cómo se presenta y se interpreta la información
                                científica sobre el HMB.
                            </p>
                        </section>

                        <section id="hmb" class="article-section mb-10">
                            <h2 class="article-h2">¿Qué es el HMB?</h2>
                            <p class="article-p">
                                Contenido del artículo por completar con información y fuentes verificadas.
                            </p>
                        </section>

                        <section id="evidencia" class="article-section mb-10">
                            <h2 class="article-h2">Cómo leer la evidencia</h2>
                            <h3 class="article-h3">Del estudio a su interpretación</h3>
                            <p class="article-p">
                                Comprender una investigación implica mirar más allá de su título. La población
                                estudiada, el diseño y la duración ayudan a poner los resultados en contexto.
                            </p>
                            <p class="article-p">
                                También es importante distinguir los hallazgos sobre un ingrediente de la evidencia
                                específica de una formulación. Esta lectura permite valorar el alcance y las
                                limitaciones de cada estudio.
                            </p>
                        </section>

                        <section id="habitos" class="article-section mb-10">
                            <h2 class="article-h2">Salud muscular y hábitos</h2>
                            <p class="article-p">
                                El movimiento, la alimentación y el acompañamiento profesional forman parte del
                                cuidado de la salud muscular.
                            </p>
                            <!-- Placeholder — reemplazar con foto de científica con microscopio -->
                            <figure class="mt-6 rounded-xl overflow-hidden">
                                <img
                                    src="<?= BASE_URL ?>/assets/images/decoracion/science.jpg"
                                    alt="Científica mirando por microscopio en laboratorio"
                                    class="w-full h-64 md:h-80 object-cover"
                                >
                            </figure>
                        </section>

                        <!-- Referencias ───────────────────────────────── -->
                        <section id="referencias" class="article-section mt-12 pt-10 border-t border-gray-200">

                            <h2 class="article-h2 !mt-0">Referencias</h2>
                            <p class="article-p">
                                Consulta las fuentes citadas y accede a los documentos disponibles.
                            </p>
                            <p class="text-xs text-(--deep-purple) mb-6">
                                Vista de ejemplo · referencias por completar
                            </p>

                            <ol class="flex flex-col gap-3">
                                <?php foreach ($refs as $ref): ?>
                                <li class="reference-item flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 rounded-xl border border-gray-200 transition-all duration-200">

                                    <div class="shrink-0 w-9 h-9 rounded-lg bg-purple-50 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                             fill="none" stroke="var(--deep-purple)" stroke-width="1.7"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="w-5 h-5">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                            <polyline points="14 2 14 8 20 8"/>
                                            <line x1="16" y1="13" x2="8" y2="13"/>
                                            <line x1="16" y1="17" x2="8" y2="17"/>
                                            <polyline points="10 9 9 9 8 9"/>
                                        </svg>
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <span class="text-xs text-gray-400 font-mono">[<?= $ref['num'] ?>]</span>
                                        <h4 class="font-bold text-(--night-blue) text-sm leading-snug mb-0.5">
                                            <?= htmlspecialchars($ref['title']) ?>
                                        </h4>
                                        <p class="text-xs text-gray-400 mb-1.5">
                                            <?= htmlspecialchars($ref['meta']) ?>
                                        </p>
                                        <a href="#"
                                           class="text-xs text-(--deep-purple) font-semibold hover:underline transition-colors duration-200">
                                            Consultar fuente ↗
                                        </a>
                                    </div>

                                    <a href="#"
                                       class="shrink-0 self-start sm:self-auto px-4 py-1.5 rounded-full border border-gray-200 text-xs font-semibold text-(--night-blue) hover:border-(--deep-purple) hover:text-(--deep-purple) transition-all duration-200 whitespace-nowrap flex items-center gap-1.5">
                                        Descargar PDF ↓
                                    </a>

                                </li>
                                <?php endforeach; ?>
                            </ol>

                        </section>

                    </div><!-- /.article-body -->

                </article>

            </div>
        </div>

    </main>

    <?php include_once './components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollTrigger.min.js"></script>
    <script src="<?= BASE_URL ?>/js/layout.js"></script>
    <script src="<?= BASE_URL ?>/js/article.js"></script>

</body>
</html>
