<?php
if (session_status() === PHP_SESSION_NONE) session_start();
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'));

$countries = [
    'GT' => ['id' => 1, 'code' => 'GT', 'name' => 'Guatemala'],
    'HN' => ['id' => 2, 'code' => 'HN', 'name' => 'Honduras'],
    'NI' => ['id' => 3, 'code' => 'NI', 'name' => 'Nicaragua'],
    'CR' => ['id' => 4, 'code' => 'CR', 'name' => 'Costa Rica'],
    'PA' => ['id' => 5, 'code' => 'PA', 'name' => 'Panamá'],
    'DO' => ['id' => 6, 'code' => 'DO', 'name' => 'Rep. Dominicana'],
];

// 1. URL param: ?pais=GT  — máxima prioridad, sobreescribe sesión
if (!empty($_GET['pais']) && isset($countries[$_GET['pais']])) {
    $country = $countries[$_GET['pais']] ?? $countries['GT'];
    $_SESSION['pais'] = $country['code'];

// 2. Sesión guardada
} elseif (!empty($_SESSION['pais']) && isset($countries[$_SESSION['pais']])) {
    $country = $countries[$_SESSION['pais']] ?? $countries['GT'];

// 3. Detección por IP
} else {
    // $ip = '45.164.150.249'; // GT
    // $ip = '190.181.222.119'; // HN
    // $ip = '190.62.80.251'; // SV
    // $ip = '152.231.33.166'; // NI
    $ip     = urlencode($_SERVER['REMOTE_ADDR']);
    $apiKey = "3e80bae421b20b";
    $data   = json_decode(file_get_contents("http://api.ipinfo.io/lite/{$ip}?token={$apiKey}"));

    $fetched = $data->country_code ?? '';
    $country = isset($countries[$fetched]) ? $countries[$fetched] : $countries['GT'];
    $_SESSION['pais'] = $country['code'];
}

$active_country = $country['code'];

$hide_footer_pharmacies = true;

$pharmacies = [
    'GT' => [
        [
            'name' => 'Farmacias Batres',
            'url'  => 'https://farmaciasbatres.com/',
            'img'  => 'assets/images/farmacias/gt/Logotipo Farmacias Batres con franja amarilla.png',
        ],
        [
            'name' => 'Farmacias Galeno',
            'url'  => 'https://www.farmaciasgaleno.com.gt/',
            'img'  => 'assets/images/farmacias/gt/Logotipo azul de Farmacias Galeno.png',
        ],
        [
            'name' => 'Farmacias Cruz Verde',
            'url'  => 'https://cruzverde.com.gt/',
            'img'  => 'assets/images/farmacias/gt/Logotipo verde de Farmacias Cruz Verde.png',
        ],
        [
            'name' => 'Farmacias Meykos',
            'url'  => 'https://meykos.com/',
            'img'  => 'assets/images/farmacias/gt/Logotipo MEYKOS con ondas coloridas.png',
        ],
        [
            'name' => 'Farmacias Fayco',
            'url'  => 'https://www.farmaciafayco.com.gt/',
            'img'  => 'assets/images/farmacias/gt/Logotipo azul de Farmacias FAYCO.png',
        ],
        [
            'name' => 'Farmatodo',
            'url'  => 'https://farmatodo.gt/',
            'img'  => 'assets/images/farmacias/gt/Logotipo Farmatodo sobre tarjeta blanca.png',
        ],
        [
            'name' => 'Herdez',
            'url'  => 'https://www.facebook.com/HerdezFarmacias/about',
            'img'  => 'assets/images/farmacias/gt/Logotipo minimalista de Herdez Farmacias.png',
        ],
        [
            'name' => 'Farmacia y Droguería Vanessa',
            'url'  => 'https://www.facebook.com/farmaciaydrogueriavanessa/?locale=es_LA',
            'img'  => 'assets/images/farmacias/gt/Logotipo de Farmacia Vanessa.png',
        ],
        [
            'name' => 'Farmacias del Occidente',
            'url'  => 'https://www.farmacasdeoccidente.com.gt/',
            'img'  => 'assets/images/farmacias/gt/Logotipo moderno de Farmacias de Occidente.png',
        ],
        [
            'name' => 'Rapifarma',
            'url'  => 'https://www.facebook.com/FarmaciasRapifarma/?locale=es_LA',
            'img'  => 'assets/images/farmacias/gt/Logotipo Rapifarma en rojo y azul.png',
        ],
        [
            'name' => 'Pricesmart',
            'url'  => 'https://www.pricesmart.com/es-gt/categoria/Salud-y-belleza-H20D09/Medicamentos-H20D09012/H20D09012',
            'img'  => 'assets/images/farmacias/gt/Logotipo PriceSmart con sol rojo.png',
        ],
        [
            'name' => 'Farmacias Acevedo',
            'url'  => 'https://www.facebook.com/farmacia.acevedo2/',
            'img'  => 'assets/images/farmacias/gt/Logotipo Farmacias Acevedo.png',
        ],
        [
            'name' => 'Farmacias Medina',
            'url'  => 'https://www.facebook.com/fmedinajalapa',
            'img'  => 'assets/images/farmacias/gt/Logotipo Farmacias Medina.png',
        ],
        [
            'name' => 'Blue Medica',
            'url'  => 'https://mibluemedical.com/',
            'img'  => 'assets/images/farmacias/gt/Logotipo médico Blue Medical.png',
        ],
    ],
    'HN' => [
        [
            'name' => 'Farmacias Kielsa',
            'url'  => 'https://kielsa.com/',
            'img'  => 'assets/images/farmacias/hn/Logotipo Kielsa en azul y amarillo.png',
        ],
        [
            'name' => 'Farmacia Simán',
            'url'  => 'https://farmaciasiman.com/',
            'img'  => 'assets/images/farmacias/hn/Logo de Farmacia Simán con Swoosh Rojo.png',
        ],
        [
            'name' => 'Farmacias Punto Farma',
            'url'  => 'https://www.puntofarma.hn/',
            'img'  => 'assets/images/farmacias/hn/Logotipo farmacéutico Punto Farma.png',
        ],
        [
            'name' => 'Farmacias del Ahorro',
            'url'  => 'https://www.farmaciasdelahorro.hn/hn/home',
            'img'  => 'assets/images/farmacias/hn/Logotipo de Farmacias del Ahorro.png',
        ],
        [
            'name' => 'FarmaCity',
            'url'  => 'https://www.facebook.com/farmacityhn/?locale=es_LA',
            'img'  => 'assets/images/farmacias/hn/Logo FarmaCity con farmacéutica caricaturizada.png',
        ],
        [
            'name' => 'FarmaFácil',
            'url'  => 'https://farmafacilhn.com/',
            'img'  => 'assets/images/farmacias/hn/Logotipo FarmaFácil en tarjeta blanca.png',
        ],
    ],
    'NI' => [
        [
            'name' => 'Farma Costo',
            'url'  => 'https://farmacosto.com/',
            'img'  => 'assets/images/farmacias/ni/Logotipo Farma Costo con Cruz Médica.png',
        ],
        [
            'name' => 'Farmacia Oziris',
            'url'  => 'https://www.facebook.com/farm.oziris/?locale=ka_GE',
            'img'  => 'assets/images/farmacias/ni/Logotipo de farmacia Oziris.png',
        ],
        [
            'name' => 'Medco / Farmacias Xolotlán',
            'url'  => 'https://medco.online.com.ni/',
            'img'  => 'assets/images/farmacias/ni/Logotipo brillante de farmacias Medco Olotlan.png',
        ],
        [
            'name' => 'Farmacia Viera',
            'url'  => 'https://farmaciaviera.com.ni/Default.aspx',
            'img'  => 'assets/images/farmacias/ni/Logotipo Farmacia Viera Bicolor.png',
        ],
        [
            'name' => 'Farmacia Bustillo Pereira',
            'url'  => 'https://www.facebook.com/FarmaciaBustilloPereira/?locale=es_LA',
            'img'  => 'assets/images/farmacias/ni/Logotipo Farmacia Bustillo Pereira.png',
        ],
        [
            'name' => 'Farmacia San Sebastián (FSS)',
            'url'  => 'https://www.facebook.com/FSSEsteli/',
            'img'  => 'assets/images/farmacias/ni/Logo de Farmacia San Sebastián.png',
        ],
        [
            'name' => 'Farma Value',
            'url'  => 'https://www.farmavalue.com/#/',
            'img'  => 'assets/images/farmacias/ni/Logotipo de farmacia Farma Value.png',
        ],
        [
            'name' => 'Farmacia Saba',
            'url'  => 'https://www.farmacia-saba.com/',
            'img'  => 'assets/images/farmacias/ni/Farmacia Saba_ Salud que sonríe.png',
        ],
        [
            'name' => 'Farmacias Estrella Roja',
            'url'  => 'https://www.facebook.com/FarmaciasEstrellaRoja',
            'img'  => 'assets/images/farmacias/ni/Logotipo Farmacias Estrella Roja.png',
        ],
        [
            'name' => 'Farmacias Meridional',
            'url'  => 'https://www.facebook.com/www.farmaciasmeridional.com.ni',
            'img'  => 'assets/images/farmacias/ni/Logotipo Farmacias Meridional.png',
        ],
        [
            'name' => 'Farma Descuento',
            'url'  => 'https://farmadescuento.com.ni/index.html',
            'img'  => 'assets/images/farmacias/ni/Logotipo Farma Descuento Minimalista.png',
        ],
        [
            'name' => 'Farmacias Samaria',
            'url'  => 'http://farmaciasamaria.com/',
            'img'  => 'assets/images/farmacias/ni/Logo de Farmacias Samaria con ahorro.png',
        ],
        [
            'name' => 'Farmacias La Económica',
            'url'  => 'https://www.facebook.com/farmaslaeconomica/?locale=es_LA',
            'img'  => 'assets/images/farmacias/ni/Logotipo Farmacias La Económica.png',
        ],
        [
            'name' => 'Farmacias Praga',
            'url'  => 'https://www.farmaciaspraga.com/',
            'img'  => 'assets/images/farmacias/ni/Logotipo moderno de Farmacias Praga.png',
        ],
        [
            'name' => 'Farmacias Kielsa',
            'url'  => 'https://kielsa.com/',
            'img'  => 'assets/images/farmacias/ni/Logotipo de Farmacias Kielsa con emblema brillante.png',
        ],
    ],
    'CR' => [
        [
            'name' => 'Farma Value',
            'url'  => 'https://www.farmavalue.com/cr/home',
            'img'  => 'assets/images/farmacias/cr/Logotipo Farma Value con Cruz Roja.png',
        ],
        [
            'name' => 'PriceSmart',
            'url'  => 'https://www.pricesmart.com/es-CR',
            'img'  => 'assets/images/farmacias/cr/Logotipo PriceSmart con sol rojo.png',
        ],
        [
            'name' => 'La Bomba Farmacia',
            'url'  => 'https://www.farmacialabomba.com/',
            'img'  => 'assets/images/farmacias/cr/Logo de Farmacia La Bomba.png',
        ],
        [
            'name' => 'Farmacia CV',
            'url'  => 'https://www.facebook.com/farmaciacv/',
            'img'  => 'assets/images/farmacias/cr/Logotipo moderno de farmacia CV.png',
        ],
        [
            'name' => 'FP',
            'url'  => 'https://www.facebook.com/fpuntarenas/',
            'img'  => 'assets/images/farmacias/cr/Logotipo circular azul sobre tarjeta blanca.png',
        ],
        [
            'name' => 'Farmacias Fischel',
            'url'  => 'https://fischelenlinea.com/',
            'img'  => 'assets/images/farmacias/cr/Logotipo Fischel Farmacias.png',
        ],
        [
            'name' => 'Farmacia Saba',
            'url'  => 'https://www.facebook.com/FarmaciaSaba.CostaRica/',
            'img'  => 'assets/images/farmacias/cr/Farmacia Saba_ Salud que sonríe.png',
        ],
    ],
    'PA' => [
        [
            'name' => 'Farma Value',
            'url'  => 'https://www.farmavalue.com/pa/home',
            'img'  => 'assets/images/farmacias/pa/Logotipo de farmacia Farma Value.png',
        ],
        [
            'name' => 'Farmacia El Javillo',
            'url'  => 'https://www.facebook.com/FarmaciaElJavillo/?locale=ta_IN',
            'img'  => 'assets/images/farmacias/pa/Emblema circular de Farmacia El Javillo.png',
        ],
        [
            'name' => 'Super 99',
            'url'  => 'https://www.super99.com/farmacia',
            'img'  => 'assets/images/farmacias/pa/Logotipo rojo super99 estilizado.png',
        ],
        [
            'name' => 'Farmacias Lee',
            'url'  => 'https://www.facebook.com/p/Farmacias-Lee-61569937425787/?locale=es_LA',
            'img'  => 'assets/images/farmacias/pa/Logotipo rojo de Farmacias Lee.png',
        ],
        [
            'name' => 'Farmanet',
            'url'  => 'https://www.facebook.com/farmanetpanama/?locale=es_LA',
            'img'  => 'assets/images/farmacias/pa/Logotipo Farmanet en verde y turquesa.png',
        ],
    ],
    'DO' => [
        [
            'name' => 'Carol',
            'url'  => 'https://www.farmaciacarol.com/',
            'img'  => 'assets/images/farmacias/rd/carol.png',
        ],
        [
            'name' => 'Hidalgos',
            'url'  => 'https://farmaciasloshidalgos.com.do/',
            'img'  => 'assets/images/farmacias/rd/los-hidalgos-las-terrenas.png',
        ],
    ],
];

$active_list = $pharmacies[$active_country] ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Dónde encontrar Elongal? — Elongal</title>
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>/assets/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen w-full m-0 p-0 overflow-x-hidden bg-(--light)">

    <?php include_once './components/header.php'; ?>

    <main>

        <!-- ── S1: Hero de búsqueda ───────────────────────────────── -->
        <section id="ph-hero" class="ph-hero-bg relative pt-28 pb-24 overflow-hidden">
            <div class="max-w-[90rem] mx-auto px-6">

                <!-- Breadcrumb -->
                <nav aria-label="Breadcrumb" id="ph-breadcrumb" class="mb-10">
                    <ol class="flex items-center gap-2 text-sm text-gray-500">
                        <li><a href="/" class="transition-colors duration-200 hover:text-(--deep-purple)">Inicio</a></li>
                        <li aria-hidden="true" class="select-none">/</li>
                        <li class="font-medium text-(--deep-purple)" aria-current="page">Dónde encontrarlo</li>
                    </ol>
                </nav>

                <!-- Sección: Dónde encontrar Elongal -->
                <div id="info-search-text" class="flex flex-col lg:flex-row items-center lg:items-start lg:justify-center gap-4 group">
                    <div class="shrink-0 gradient-icon group-hover:-translate-y-2 ease-in-out duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-20 h-20 lg:w-32 lg:h-32">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path fill="currentColor" d="M12 2c-4.41 0-8 3.59-8 8c-.03 6.44 7.12 11.6 7.42 11.82c.17.12.38.19.58.19s.41-.06.58-.19c.3-.22 7.45-5.37 7.42-11.82c0-4.41-3.59-8-8-8m0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4s4 1.79 4 4s-1.79 4-4 4" />
                        </svg>
                    </div>
                    <div class="text-center lg:text-left">
                        <h3 class="text-3xl lg:text-5xl font-bold text-(--night-blue) mb-3">¿Dónde encontrar <span class="font-extrabold">Elongal</span>?</h3>
                        <p class="text-(--night-blue)/60 text-sm lg:text-lg leading-snug mb-4">Consulta los puntos de venta y farmacias disponibles en tu país.</p>
                        <form id="ph-search" method="GET" class="flex items-center justify-center lg:justify-start gap-3 w-full sm:w-auto">
                            <div class="border border-gray-200 rounded-full bg-white overflow-hidden pr-2 focus-within:ring-2 focus-within:ring-purple-400">
                                <select name="pais" class="px-4 w-40 lg:w-100 py-2 text-(--night-blue) text-sm lg:text-lg focus:outline-none">
                                    <?php foreach ($countries as $c): ?>
                                        <option
                                            value="<?= $c['code'] ?>"
                                            <?= $c['code'] === $active_country ? 'selected' : '' ?>>
                                            <?= $c['name'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="color-gradient-primary text-white px-6 py-2 rounded-full font-semibold text-sm lg:text-lg flex items-center gap-2 hover:brightness-115 cursor-pointer transition-all whitespace-nowrap">
                                Buscar &rarr;
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Wave divider -->
            <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none" aria-hidden="true">
                <svg viewBox="0 0 1440 64" preserveAspectRatio="none" class="block h-16 w-full">
                    <path d="M0,32 C240,64 480,0 720,32 C960,64 1200,0 1440,32 L1440,64 L0,64 Z" fill="var(--light)"/>
                </svg>
            </div>
        </section>

        <!-- ── S2: Grid de farmacias ──────────────────────────────── -->
        <section id="ph-grid-section" class="bg-(--light) py-20">
            <div class="max-w-[90rem] mx-auto px-6">

                <div class="mb-14 text-center">
                    <h2 id="ph-grid-title" class="mb-3 text-3xl font-extrabold text-(--night-blue) md:text-4xl">
                        Farmacias en <?= htmlspecialchars($countries[$active_country]['name']) ?>
                    </h2>
                    <p id="ph-grid-subtitle" class="mx-auto max-w-lg text-lg text-gray-500">
                        Selecciona una farmacia para consultar Elongal en su tienda en línea.
                    </p>
                </div>

                <?php if (empty($active_list)): ?>
                    <p id="ph-empty" class="py-20 text-center text-lg italic text-gray-400">
                        Próximamente disponible en este país.
                    </p>
                <?php else: ?>
                    <ul id="ph-grid" role="list" class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">
                        <?php foreach ($active_list as $p): ?>
                            <li>
                                <article class="ph-pharmacy-card flex h-full flex-col items-center gap-4 rounded-2xl bg-white p-5 shadow-sm">
                                    <div class="flex h-full w-full items-center justify-center">
                                        <img
                                            src="<?= BASE_URL ?>/<?= htmlspecialchars($p['img']) ?>"
                                            alt="<?= htmlspecialchars($p['name']) ?>"
                                            class="object-contain w-full aspect-square"
                                            draggable="false"
                                        >
                                    </div>
                                    <?php if ($p['url']): ?>
                                        <a href="<?= htmlspecialchars($p['url']) ?>" target="_blank" rel="noopener noreferrer"
                                           class="ph-pharmacy-btn flex items-center gap-2 justify-center w-full rounded-full border-2 border-(--light-purple) px-3 py-2 text-center text-sm font-semibold text-(--light-purple) cursor-pointer">
                                            Ir a comprar <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 10.5L21 3m-5 0h5v5m0 6v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5"/></svg>
                                        </a>
                                    <?php else: ?>
                                        <span class="ph-pharmacy-btn flex items-center gap-2 justify-center w-full rounded-full border-2 border-(--light-purple) px-3 py-2 text-center text-sm font-semibold text-(--light-purple) pointer-events-none cursor-default opacity-40"
                                              aria-disabled="true">
                                            Ir a comprar <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 10.5L21 3m-5 0h5v5m0 6v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5"/></svg>
                                        </span>
                                    <?php endif; ?>
                                </article>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <p id="ph-disclaimer" class="mx-auto mt-12 max-w-2xl text-center text-sm text-gray-400">
                    La disponibilidad y el precio pueden variar según la farmacia. La compra se realiza en el sitio de cada establecimiento.
                </p>
            </div>
        </section>

        <!-- ── S3: CTA Preguntas frecuentes ──────────────────────── -->
        <section id="ph-faq-cta" class="pb-20">
            <div class="flex flex-col items-start justify-between gap-6 rounded-2xl md:flex-row md:items-center px-6 lg:px-12">
                <div id="ph-faq-text">
                    <h2 class="mb-3 text-xl lg:text-4xl font-bold text-(--night-blue)">¿Tienes alguna duda?</h2>
                    <p class="text-gray-500 lg:text-xl">Consulta nuestras preguntas frecuentes o escríbenos.</p>
                </div>
                <a href="<?= BASE_URL ?>/faqs.php" id="ph-faq-btn" class="inline-flex shrink-0 items-center gap-2 whitespace-nowrap rounded-full border-2 border-(--light-purple) px-6 py-3 font-semibold text-(--light-purple) hover:bg-(--light-purple) hover:text-white transitions-colors  duration-300 ease-in-out">
                    Preguntas frecuentes
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 8h10M9 4l4 4-4 4"/>
                    </svg>
                </a>
            </div>
        </section>

    </main>

    <?php include_once './components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollTrigger.min.js"></script>
    <script src="<?= BASE_URL ?>/js/layout.js"></script>
    <script src="<?= BASE_URL ?>/js/pharmacies.js"></script>

</body>
</html>
