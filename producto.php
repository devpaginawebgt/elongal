<?php
if (session_status() === PHP_SESSION_NONE) session_start();
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'));

$componentes = [
    [
        'nombre'  => 'CaHMB',
        'subtitulo' => 'CaHMB 3 gramos, equivalente a 2.4 g de hidroximetilbutirato',
        'svg'     => '<circle cx="12" cy="5" r="2.5" fill="none" stroke="currentColor" stroke-width="1.6"/>
                      <circle cx="5"  cy="17" r="2.5" fill="none" stroke="currentColor" stroke-width="1.6"/>
                      <circle cx="19" cy="17" r="2.5" fill="none" stroke="currentColor" stroke-width="1.6"/>
                      <line x1="12" y1="7.5" x2="5"  y2="14.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                      <line x1="12" y1="7.5" x2="19" y2="14.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                      <line x1="5"  y1="17"  x2="19" y2="17"   stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
    ],
    [
        'nombre'  => 'Vitamina D<sub>3</sub>',
        'subtitulo' => '2,000 UI',
        'svg'     => '<circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="1.6"/>
                      <line x1="12" y1="2"    x2="12" y2="4.5"  stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                      <line x1="12" y1="19.5" x2="12" y2="22"   stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                      <line x1="2"    y1="12" x2="4.5"  y2="12" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                      <line x1="19.5" y1="12" x2="22"   y2="12" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                      <line x1="4.93" y1="4.93" x2="6.76" y2="6.76" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                      <line x1="17.24" y1="17.24" x2="19.07" y2="19.07" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                      <line x1="4.93" y1="19.07" x2="6.76" y2="17.24" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                      <line x1="17.24" y1="6.76" x2="19.07" y2="4.93" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
    ],
    [
        'nombre'  => 'Magnesio',
        'subtitulo' => '400 mg',
        'svg'     => '<polygon points="12,2 20,7 20,17 12,22 4,17 4,7" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
                      <polygon points="12,7 16.5,9.5 16.5,14.5 12,17 7.5,14.5 7.5,9.5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
                      <line x1="12" y1="2"  x2="12" y2="7"  stroke="currentColor" stroke-width="1.6"/>
                      <line x1="20" y1="7"  x2="16.5" y2="9.5" stroke="currentColor" stroke-width="1.6"/>
                      <line x1="20" y1="17" x2="16.5" y2="14.5" stroke="currentColor" stroke-width="1.6"/>
                      <line x1="12" y1="22" x2="12" y2="17" stroke="currentColor" stroke-width="1.6"/>
                      <line x1="4"  y1="17" x2="7.5" y2="14.5" stroke="currentColor" stroke-width="1.6"/>
                      <line x1="4"  y1="7"  x2="7.5" y2="9.5"  stroke="currentColor" stroke-width="1.6"/>',
    ],
];

$detalles_labels = [
    'descripcion'  => 'Descripción',
    'beneficios'   => 'Beneficios',
    'presentacion' => 'Presentación',
];

$presentaciones = [
    'citrico' => [
        'nombre'       => 'Cítrico',
        'descripcion'  => 'Elongal® está indicado como apoyo nutricional en: cuidado y fortalecimiento de la salud muscular. Pérdida de masa muscular asociada con la edad o sarcopenia. Estados relacionados con falta o exceso de actividad física. Condiciones en las que exista una mayor necesidad de soporte para la salud muscular, según evaluación médica.',
        'imagen'       => BASE_URL . '/assets/images/producto/sobre-frutas-citricos.png',
        'icon_img'     => BASE_URL . '/assets/images/decoracion/citricos.png',
        'beneficios'   => "Elongal® puede contribuir a:<br>
            - Mantener la masa muscular.<br>
            - Apoyar la fuerza y el funcionamiento de los músculos.<br>
            - Complementar las necesidades nutricionales durante el envejecimiento.<br>
            - Brindar apoyo nutricional en períodos de baja o alta actividad física.<br>
            - Favorecer la salud ósea.<br>
            - Contribuir al aprovechamiento del calcio gracias a la vitamina D3.",
        'presentacion' => 'Caja x 30 sobres.',
    ],
    'frutos-rojos' => [
        'nombre'       => 'Frutos Rojos',
        'descripcion'  => 'Elongal® está indicado como apoyo nutricional en: cuidado y fortalecimiento de la salud muscular. Pérdida de masa muscular asociada con la edad o sarcopenia. Estados relacionados con falta o exceso de actividad física. Condiciones en las que exista una mayor necesidad de soporte para la salud muscular, según evaluación médica.',
        'imagen'       => BASE_URL . '/assets/images/producto/sobre-frutas-frutos-rojos.png',
        'icon_img'     => BASE_URL . '/assets/images/decoracion/frutos-rojos.png',
        'beneficios'   => "Elongal® puede contribuir a:<br>
            - Mantener la masa muscular.<br>
            - Apoyar la fuerza y el funcionamiento de los músculos.<br>
            - Complementar las necesidades nutricionales durante el envejecimiento.<br>
            - Brindar apoyo nutricional en períodos de baja o alta actividad física.<br>
            - Favorecer la salud ósea.<br>
            - Contribuir al aprovechamiento del calcio gracias a la vitamina D3.",
        'presentacion' => 'Caja x 30 sobres.',
    ],
];

$primera_key = array_key_first($presentaciones);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto — Elongal</title>
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>/assets/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen w-full m-0 p-0 overflow-x-hidden bg-(--light)">

    <?php include_once './components/header.php'; ?>

    <!-- ═══════════════════════════════════════════════════════
         SECCIÓN 1: Hero
    ════════════════════════════════════════════════════════ -->
    <section id="producto-hero" class="relative w-full overflow-hidden min-h-[360px] md:min-h-[450px] lg:min-h-[460px] 2xl:max-w-360 2xl:mx-auto">

        <img src="<?= BASE_URL ?>/assets/images/banners/banner-producto.png"
             alt="Personas activas con Elongal"
             class="hidden md:block absolute inset-0 w-full h-full object-contain object-right">

        <div class="absolute inset-0 pt-40 md:pt-36 pb-10 md:pb-14 flex flex-col justify-center">
            <div class="px-6 md:px-10 lg:px-16 w-full md:max-w-120 xl:max-w-220">

                <nav id="producto-breadcrumb" aria-label="Ruta de navegación"
                     class="flex items-center gap-1.5 text-sm text-gray-400 mb-5">
                    <a href="<?= BASE_URL ?>/"
                       class="hover:text-(--deep-purple) transition-colors duration-200">Inicio</a>
                    <span>/</span>
                    <span class="text-(--night-blue) font-medium" aria-current="page">Producto</span>
                </nav>

                <h1 id="producto-hero-title"
                    class="text-4xl md:text-4xl xl:text-6xl font-extrabold text-(--night-blue) leading-tight mb-5">
                    Tu fuerza,<br>todos los días<span class="text-(--strong-red)">.</span>
                </h1>

            </div>
        </div>

    </section>

    <!-- ═══════════════════════════════════════════════════════
         SECCIÓN 2: Fórmula
    ════════════════════════════════════════════════════════ -->
    <section id="formula" class="w-full py-16">
        <div class="px-6 md:px-10 lg:px-16 2xl:max-w-360 2xl:mx-auto">

            <!-- Encabezado -->
            <div id="formula-header" class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-(--night-blue) mb-4">
                    Conoce su fórmula
                </h2>
                <hr class="border-0 h-px bg-gray-200 max-w-xs mx-auto">
            </div>

            <!-- Grid de componentes -->
            <ul id="formula-items" class="grid grid-cols-1 sm:grid-cols-3 gap-8 md:gap-12 lg:gap-16 list-none p-0 m-0">
                <?php foreach ($componentes as $comp): ?>
                <li class="flex flex-row sm:flex-col items-center sm:text-center gap-5 sm:gap-4
                           hover:scale-105 transition-transform duration-300 cursor-default">

                    <!-- Icono SVG -->
                    <div class="shrink-0 w-16 h-16 sm:w-20 sm:h-20 rounded-full border-2 border-(--light-purple)/30
                                flex items-center justify-center bg-(--light-purple)/5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                             class="w-8 h-8 sm:w-10 sm:h-10 text-(--light-purple)">
                            <?= $comp['svg'] ?>
                        </svg>
                    </div>

                    <!-- Texto -->
                    <div>
                        <h3 class="text-xl sm:text-2xl font-bold text-(--night-blue) leading-snug mb-1">
                            <?= $comp['nombre'] ?>
                        </h3>
                        <p class="text-sm sm:text-base text-(--light-purple) leading-relaxed">
                            <?= $comp['subtitulo'] ?>
                        </p>
                    </div>

                </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════
         SECCIÓN 3: Detalle del producto
    ════════════════════════════════════════════════════════ -->
    <?php 
        if (($active_country ?? '') === 'PA') {
            unset($presentaciones['frutos-rojos']);
        }
    ?>
    <section id="detalle-producto" class="w-full bg-(--light) pt-4 pb-16">
        <div class="px-6 md:px-10 lg:px-16 2xl:max-w-360 2xl:mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">

                <!-- Imagen del producto (order-2 en mobile: va entre título+tabs y acordeón) -->
                <div id="producto-img-col" class="order-2 lg:order-none flex items-center justify-center">
                    <img id="producto-imagen"
                         src="<?= $presentaciones[$primera_key]['imagen'] ?>"
                         alt="Elongal <?= $presentaciones[$primera_key]['nombre'] ?>"
                         class="w-full max-w-lg lg:max-w-none object-contain select-none"
                         draggable="false">
                </div>

                <!-- Columna info: título + tabs + acordeón -->
                <div id="producto-info-col" class="order-1 lg:order-none flex flex-col gap-6">

                    <!-- Título -->
                    <h2 class="text-5xl md:text-6xl lg:text-7xl font-black text-(--night-blue) leading-none">
                        Elongal<sup class="text-3xl md:text-4xl align-super font-black">®</sup>
                    </h2>

                    <!-- Tabs de presentaciones -->
                    <nav aria-label="Presentaciones" class="flex flex-wrap gap-3">
                        <?php foreach ($presentaciones as $key => $p): ?>
                        <button
                            class="producto-tab flex items-center gap-1.5 px-4 py-1.5 rounded-full
                                   text-sm font-semibold border-2 transition-all duration-300 cursor-pointer
                                   <?= $key === $primera_key
                                       ? 'color-gradient-primary text-white border-transparent'
                                       : 'border-(--deep-purple) text-(--deep-purple) hover:bg-(--light-purple)/10' ?>"
                            data-key="<?= $key ?>"
                            data-imagen="<?= $p['imagen'] ?>"
                            data-nombre="<?= htmlspecialchars($p['nombre'], ENT_QUOTES) ?>">
                            <img src="<?= $p['icon_img'] ?>"
                                 alt="<?= htmlspecialchars($p['nombre'], ENT_QUOTES) ?>"
                                 class="w-12 h-12 -my-1 object-contain">
                            <?= $p['nombre'] ?>
                        </button>
                        <?php endforeach; ?>
                    </nav>

                    <!-- Detalles del producto -->
                    <dl class="flex flex-col gap-4">
                        <?php foreach ($detalles_labels as $field => $label): ?>
                        <div>
                            <dt class="font-semibold text-(--night-blue) text-sm md:text-base leading-snug mb-1">
                                <?= $label ?>
                            </dt>
                            <?php foreach ($presentaciones as $key => $p): ?>
                            <dd class="producto-detalle-text text-sm text-gray-500 leading-relaxed
                                       <?= $key === $primera_key ? '' : 'hidden' ?>"
                                data-key="<?= $key ?>">
                                <?= html_entity_decode($p[$field], ENT_QUOTES, 'UTF-8') ?>
                            </dd>
                            <?php endforeach; ?>
                        </div>
                        <?php endforeach; ?>
                    </dl>

                    <!-- Orden mobile: imagen del producto aquí (order-2) -->
                    <!-- (El div de imagen tiene order-2 lg:order-none, se reordena por CSS grid) -->

                </div><!-- /producto-info-col -->

            </div>
        </div>
    </section>

    <?php include_once './components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollTrigger.min.js"></script>
    <script src="<?= BASE_URL ?>/js/layout.js"></script>
    <script src="<?= BASE_URL ?>/js/producto.js"></script>

</body>
</html>
