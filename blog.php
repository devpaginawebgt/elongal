<?php
if (session_status() === PHP_SESSION_NONE) session_start();
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'));

$all_articles = [
    // [
    //     'featured'     => false,
    //     'category'     => 'Ciencia y Evidencia',
    //     'category_key' => 'ciencia',
    //     'date'         => '22 Oct 2026',
    //     'title'        => 'HMB: una mirada desde la ciencia',
    //     'excerpt'      => 'Conoce cómo este compuesto ha sido estudiado y su potencial en la salud muscular.',
    //     'image'        => BASE_URL . '/assets/images/decoracion/science.jpg',
    //     'href'         => BASE_URL . '/article.php',
    // ],
    // [
    //     'featured'     => true,
    //     'category'     => 'Bienestar y Movimiento',
    //     'category_key' => 'bienestar',
    //     'date'         => '29 Oct 2026',
    //     'title'        => 'La fuerza de seguir haciendo lo que disfrutas',
    //     'excerpt'      => 'Conoce el papel del movimiento y la nutrición en el cuidado de tus músculos a lo largo de la vida.',
    //     'image'        => BASE_URL . '/assets/images/decoracion/ejercicio.jpg',
    //     'href'         => BASE_URL . '/article.php',
    // ],
    // [
    //     'featured'     => false,
    //     'category'     => 'Profesionales de la Salud',
    //     'category_key' => 'profesionales',
    //     'date'         => '15 Oct 2026',
    //     'title'        => 'La salud muscular en la consulta',
    //     'excerpt'      => 'Una conversación clave para un envejecimiento más activo y con mayor independencia.',
    //     'image'        => BASE_URL . '/assets/images/decoracion/profesional.jpg',
    //     'href'         => BASE_URL . '/article.php',
    // ],
    // [
    //     'featured'     => false,
    //     'category'     => 'Bienestar y Movimiento',
    //     'category_key' => 'bienestar',
    //     'date'         => '08 Oct 2026',
    //     'title'        => 'Pequeños hábitos, más movimiento',
    //     'excerpt'      => 'Descubre cómo integrar el movimiento en tu día a día y sentir la diferencia.',
    //     'image'        => BASE_URL . '/assets/images/decoracion/abuelos.jpg',
    //     'href'         => BASE_URL . '/article.php',
    // ],
    // [
    //     'featured'     => false,
    //     'category'     => 'Bienestar y Movimiento',
    //     'category_key' => 'bienestar',
    //     'date'         => '01 Oct 2026',
    //     'title'        => 'Músculos y bienestar con el paso del tiempo',
    //     'excerpt'      => 'Mantener la fuerza también es una forma de ganar calidad de vida.',
    //     'image'        => BASE_URL . '/assets/images/decoracion/pareja-escalando.png', /* TODO: reemplazar imagen */
    //     'href'         => BASE_URL . '/article.php',
    // ],
];

$category = isset($_GET['category']) ? $_GET['category'] : null;
$search   = isset($_GET['search'])   ? trim($_GET['search']) : null;

$articles = $all_articles;

if (!empty($category)) {
    $articles = array_values(array_filter($articles, fn($a) => $a['category_key'] === $category));
}

if (!empty($search)) {
    $needle   = mb_strtolower($search);
    $articles = array_values(array_filter($articles, function ($a) use ($needle) {
        return str_contains(mb_strtolower($a['title']),   $needle)
            || str_contains(mb_strtolower($a['excerpt']), $needle);
    }));
}

$featured      = $articles[0] ?? null;
$grid_articles = array_slice($articles, 1);

$sidebar_categories = [
    [
        'name' => 'Ciencia y evidencia',
        'href' => BASE_URL . '/blog.php?category=ciencia',
        'svg'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M10 2v7.31L5.72 16.5A2 2 0 0 0 7.5 19.5h9a2 2 0 0 0 1.78-2.9L14 9.31V2"/><path d="M8.5 2h7"/><path d="M7 15.5h10"/></svg>',
    ],
    [
        'name' => 'Bienestar y movimiento',
        'href' => BASE_URL . '/blog.php?category=bienestar',
        'svg'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
    ],
    [
        'name' => 'Profesionales de la Salud',
        'href' => BASE_URL . '/blog.php?category=profesionales',
        'svg'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><circle cx="12" cy="12" r="10"/><path d="M12 8v8M8 12h8"/></svg>',
    ],
];

$sidebar_related = [
    [
        'title' => 'Pequeños hábitos, más movimiento',
        'image' => BASE_URL . '/assets/images/decoracion/abuelos.jpg',
        'href'  => '#',
    ],
    [
        'title' => 'HMB: una mirada desde la ciencia',
        'image' => BASE_URL . '/assets/images/decoracion/science.jpg',
        'href'  => '#',
    ],
    [
        'title' => 'Músculos y bienestar con el paso del tiempo',
        'image' => BASE_URL . '/assets/images/decoracion/pareja-escalando.png',
        'href'  => '#',
    ],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog — Elongal</title>
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>/assets/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen w-full m-0 p-0 overflow-x-hidden bg-(--light)">

    <?php include_once './components/header.php'; ?>

    <main id="blog-page">

        <!-- ① HERO ──────────────────────────────────────────────── -->
        <section id="blog-hero" class="relative w-full overflow-hidden min-h-[360px] md:min-h-[450px] lg:min-h-[460px] 2xl:max-w-360 2xl:mx-auto">

            <img src="<?= BASE_URL ?>/assets/images/banners/banner-blog.png"
                 alt="Pareja activa disfrutando del movimiento al aire libre"
                 class="hidden md:block absolute inset-0 w-full h-full object-contain object-right">

            <div class="absolute inset-0 pt-40 md:pt-36 pb-10 md:pb-14 flex flex-col justify-center">
                <div class="px-6 md:px-10 lg:px-16 w-full md:max-w-120 xl:max-w-220">

                    <nav id="blog-breadcrumb" aria-label="Ruta de navegación"
                         class="flex items-center gap-1.5 text-sm text-gray-400 mb-5">
                        <a href="<?= BASE_URL ?>/"
                           class="hover:text-(--deep-purple) transition-colors duration-200">Inicio</a>
                        <span>/</span>
                        <span class="text-(--night-blue) font-medium">Blog</span>
                    </nav>

                    <p id="blog-hero-badge"
                       class="text-xs font-bold tracking-widest uppercase text-(--light-purple) mb-3">
                        Blog Elongal®
                    </p>

                    <h1 id="blog-hero-title"
                        class="text-4xl md:text-4xl xl:text-6xl font-extrabold text-(--night-blue) leading-tight mb-5">
                        Conocimiento que te mueve<span class="text-(--strong-red)">.</span>
                    </h1>

                    <p id="blog-hero-subtitle"
                       class="text-base md:text-lg text-gray-500 leading-relaxed max-w-sm">
                        Ciencia, bienestar y recursos para cuidar tu salud muscular.
                    </p>

                </div>
            </div>

        </section>

        <!-- ② CONTENIDO: artículos + sidebar ───────────────────── -->
        <section id="blog-content" class="bg-(--light) py-12 md:py-16">
            <div class="2xl:max-w-360 mx-auto px-5 md:px-10
                        flex flex-col lg:grid lg:grid-cols-[1fr_340px] gap-10 lg:gap-12 items-start">

                <!-- Columna principal -->
                <div id="blog-main">

                <?php if (empty($articles)): ?>

                    <!-- Estado vacío -->
                    <div class="flex flex-col items-center justify-center text-center py-20 px-6">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"
                             class="w-14 h-14 text-gray-300 mb-5">
                            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                        <h2 class="text-xl font-bold text-(--night-blue) mb-2">Sin resultados</h2>
                        <p class="text-gray-400 text-sm max-w-xs leading-relaxed">
                            No se encontraron artículos con los filtros aplicados. Intenta con otra búsqueda o categoría.
                        </p>
                        <a href="<?= BASE_URL ?>/blog.php"
                           class="mt-6 inline-flex items-center gap-2 border border-(--deep-purple) text-(--deep-purple)
                                  text-sm font-semibold px-5 py-2.5 rounded-full
                                  hover:bg-(--deep-purple) hover:text-white transition-all duration-300">
                            Ver todos los artículos
                        </a>
                    </div>

                <?php else: ?>

                    <!-- Artículo destacado -->
                    <article id="featured-article" class="mb-12 md:mb-14">
                        <a href="<?= htmlspecialchars($featured['href']) ?>" class="block group">

                            <div class="overflow-hidden rounded-2xl mb-6">
                                <img
                                    src="<?= htmlspecialchars($featured['image']) ?>"
                                    alt="<?= htmlspecialchars($featured['title']) ?>"
                                    class="w-full h-72 md:h-[460px] object-cover group-hover:scale-105 transition-transform duration-300"
                                >
                            </div>

                            <div class="article-meta flex items-center gap-2
                                        text-xs uppercase font-bold tracking-wider text-(--light-purple) mb-3">
                                <span><?= htmlspecialchars($featured['category']) ?></span>
                                <span class="text-gray-300 font-normal">·</span>
                                <span class="text-gray-400 font-semibold normal-case">
                                    <?= htmlspecialchars($featured['date']) ?>
                                </span>
                            </div>

                            <h2 class="text-2xl md:text-3xl font-bold text-(--night-blue) leading-snug mb-3
                                       group-hover:text-(--deep-purple) transition-colors duration-300">
                                <?= htmlspecialchars($featured['title']) ?>
                            </h2>

                            <p class="text-gray-500 leading-relaxed mb-5 max-w-2xl">
                                <?= htmlspecialchars($featured['excerpt']) ?>
                            </p>

                            <span class="article-cta inline-flex items-center gap-1.5
                                         text-sm font-semibold text-(--deep-purple)">
                                Continúa la lectura
                                <span class="group-hover:translate-x-1 transition-transform inline-block">→</span>
                            </span>

                        </a>
                    </article>

                    <!-- Grid 2×2 -->
                    <?php if (!empty($grid_articles)): ?>
                    <div id="articles-grid" class="grid grid-cols-1 sm:grid-cols-2 gap-6 md:gap-8">

                        <?php foreach ($grid_articles as $article): ?>
                        <article class="blog-grid-card group">
                            <a href="<?= htmlspecialchars($article['href']) ?>" class="block">

                                <div class="overflow-hidden rounded-xl mb-4">
                                    <img
                                        src="<?= htmlspecialchars($article['image']) ?>"
                                        alt="<?= htmlspecialchars($article['title']) ?>"
                                        class="w-full aspect-[4/3] object-cover
                                               group-hover:scale-105 transition-transform duration-200"
                                    >
                                </div>

                                <div class="flex items-center gap-2
                                            text-xs uppercase font-bold tracking-wider text-(--light-purple) mb-2">
                                    <span><?= htmlspecialchars($article['category']) ?></span>
                                    <span class="text-gray-300 font-normal">·</span>
                                    <span class="text-gray-400 font-semibold normal-case">
                                        <?= htmlspecialchars($article['date']) ?>
                                    </span>
                                </div>

                                <h3 class="text-lg font-bold text-(--night-blue) leading-snug mb-2
                                           group-hover:text-(--deep-purple) transition-colors duration-300">
                                    <?= htmlspecialchars($article['title']) ?>
                                </h3>

                                <p class="text-gray-500 text-sm leading-relaxed mb-3">
                                    <?= htmlspecialchars($article['excerpt']) ?>
                                </p>

                                <span class="inline-flex items-center gap-1
                                             text-sm font-semibold text-(--deep-purple)">
                                    Continúa la lectura
                                    <span class="group-hover:translate-x-1 transition-transform inline-block">→</span>
                                </span>

                            </a>
                        </article>
                        <?php endforeach; ?>

                    </div>
                    <?php endif; ?>

                <?php endif; ?>

                </div>

                <!-- SIDEBAR ──────────────────────────────────────── -->
                <aside id="blog-sidebar" class="lg:sticky lg:top-24 w-full flex flex-col gap-5">

                    <!-- Bloque 1: Buscar -->
                    <div id="blog-search-block" class="bg-(--deep-purple)/10 rounded-2xl p-5">
                        <h3 class="text-base font-bold text-(--night-blue) mb-3">Buscar</h3>
                        <form class="flex items-center gap-2" role="search" method="get">
                            <?php if (!empty($category)): ?>
                                <input type="hidden" name="category" value="<?= htmlspecialchars($category) ?>">
                            <?php endif; ?>
                            <input
                                type="search"
                                name="search"
                                value="<?= htmlspecialchars($search ?? '') ?>"
                                placeholder="¿Qué te gustaría descubrir?"
                                class="flex-1 rounded-md px-4 py-2.5
                                       bg-white text-sm text-(--night-blue) placeholder-gray-400
                                       outline-none focus:border-(--deep-purple) transition-colors duration-200"
                            >
                            <button
                                type="submit"
                                aria-label="Buscar"
                                class="rounded-md text-(--light) w-10 h-10 shrink-0
                                       flex items-center justify-center
                                       bg-(--deep-purple) hover:brightness-115 transition-all duration-300 cursor-pointer"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2.2"
                                     stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                                    <circle cx="11" cy="11" r="8"/>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <!-- Bloque 2: Explora por tema -->
                    <div id="blog-topics-block" class="bg-white rounded-2xl p-5 shadow-sm">
                        <h3 class="text-base font-bold text-(--night-blue) mb-1">Explora por tema</h3>
                        <ul>
                            <?php foreach ($sidebar_categories as $i => $cat): ?>
                            <li class="<?= $i < count($sidebar_categories) - 1 ? 'border-b border-gray-100' : '' ?>">
                                <a href="<?= htmlspecialchars($cat['href']) ?>"
                                   class="group flex items-center gap-3 py-3.5">
                                    <span class="gradient-icon shrink-0">
                                        <?= $cat['svg'] ?>
                                    </span>
                                    <span class="flex-1 text-sm font-semibold text-(--night-blue)
                                                 group-hover:text-(--deep-purple) transition-colors duration-200">
                                        <?= htmlspecialchars($cat['name']) ?>
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="w-4 h-4 text-gray-400 shrink-0
                                                group-hover:text-(--deep-purple)
                                                group-hover:translate-x-0.5
                                                transition-all duration-200">
                                        <path d="m9 18 6-6-6-6"/>
                                    </svg>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Bloque 3: Para seguir explorando -->
                    <!-- <div id="blog-related-block" class="bg-white rounded-2xl p-5 shadow-sm">
                        <h3 class="text-base font-bold text-(--night-blue) mb-1">Para seguir explorando</h3>
                        <ul>
                            <?php foreach ($sidebar_related as $i => $rel): ?>
                            <li class="<?= $i < count($sidebar_related) - 1 ? 'border-b border-gray-100' : '' ?>">
                                <a href="<?= htmlspecialchars($rel['href']) ?>"
                                   class="group flex items-center gap-3 py-3.5">
                                    <div class="w-16 h-16 rounded-lg overflow-hidden shrink-0">
                                        <img
                                            src="<?= htmlspecialchars($rel['image']) ?>"
                                            alt="<?= htmlspecialchars($rel['title']) ?>"
                                            class="w-full h-full object-cover
                                                   group-hover:scale-105 transition-transform duration-300"
                                        >
                                    </div>
                                    <span class="flex-1 text-sm font-medium text-(--night-blue) leading-snug
                                                 group-hover:text-(--deep-purple) transition-colors duration-200">
                                        <?= htmlspecialchars($rel['title']) ?>
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="w-4 h-4 text-gray-400 shrink-0
                                                group-hover:text-(--deep-purple) transition-colors duration-200">
                                        <path d="m9 18 6-6-6-6"/>
                                    </svg>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div> -->

                </aside>

            </div>
        </section>

        <!-- ③ PAGINACIÓN ─────────────────────────────────────────── -->
        <!-- <nav id="blog-pagination" aria-label="Páginas del blog"
             class="py-10 pb-16 flex justify-center bg-(--light)">
            <ul class="flex items-center gap-1.5">

                <li>
                    <a href="#"
                       class="flex items-center gap-1.5 px-3 py-2 rounded-full
                              text-sm font-semibold text-(--night-blue)
                              hover:text-(--deep-purple) transition-colors duration-200">
                        <span>←</span>
                        <span class="hidden sm:inline">Anterior</span>
                    </a>
                </li>

                <li>
                    <a href="#" aria-current="page"
                       class="color-gradient-primary text-white w-9 h-9
                              flex items-center justify-center rounded-full
                              text-sm font-semibold">
                        1
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="text-(--night-blue) w-9 h-9 flex items-center justify-center rounded-full
                              text-sm font-medium hover:bg-(--deep-purple) hover:text-white
                              transition-colors duration-200">
                        2
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="text-(--night-blue) w-9 h-9 flex items-center justify-center rounded-full
                              text-sm font-medium hover:bg-(--deep-purple) hover:text-white
                              transition-colors duration-200">
                        3
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="flex items-center gap-1.5 px-3 py-2 rounded-full
                              text-sm font-semibold text-(--night-blue)
                              hover:text-(--deep-purple) transition-colors duration-200">
                        <span class="hidden sm:inline">Siguiente</span>
                        <span>→</span>
                    </a>
                </li>

            </ul>
        </nav> -->

    </main>

    <?php include_once './components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollTrigger.min.js"></script>
    <script src="<?= BASE_URL ?>/js/layout.js"></script>
    <script src="<?= BASE_URL ?>/js/blog.js"></script>

</body>
</html>
