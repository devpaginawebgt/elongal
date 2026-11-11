<?php
$contribuciones = [
    [
        'title' => 'Masa magra y función muscular',
        'text'  => 'Mejora la masa magra y la función de los músculos.',
        'icon'  => '<path d="M0 0h24v24H0z" fill="none"/>
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M12.409 13.017A5 5 0 0 1 22 15c0 3.866-4 7-9 7c-4.077 0-8.153-.82-10.371-2.462c-.426-.316-.631-.832-.62-1.362C2.118 12.723 2.627 2 10 2a3 3 0 0 1 3 3a2 2 0 0 1-2 2c-1.105 0-1.64-.444-2-1"/>
                        <path d="M15 14a5 5 0 0 0-7.584 2"/>
                        <path d="M9.964 6.825C8.019 7.977 9.5 13 8 15"/>
                    </g>',
    ],
    [
        'title' => 'Fuerza y movilidad',
        'text'  => 'Aumenta la fuerza muscular y mejora la movilidad.',
        'icon'  => '<path d="M0 0h24v24H0z" fill="none"/>
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M13 4a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"/>
                        <path d="M7 21l3 -4"/>
                        <path d="M16 21l-2 -4l-3 -3l1 -6"/>
                        <path d="M6 12l2 -3l4 -2l3 3l3 1"/>
                    </g>',
    ],
    [
        'title' => 'Protección muscular',
        'text'  => 'Disminuye la degradación de proteínas musculares.',
        'icon'  => '<path d="M0 0h24v24H0z" fill="none"/>
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3"/>
                        <path d="M10 12l2 2l4 -4"/>
                    </g>',
    ],
    [
        'title' => 'Síntesis de proteínas',
        'text'  => 'Aumenta la síntesis de proteínas musculares.',
        'icon'  => '<path d="M0 0h24v24H0z" fill="none"/>
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"/>
                        <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"/>
                        <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"/>
                        <path d="M8.7 10.7l6.6 -3.4"/>
                        <path d="M8.7 13.3l6.6 3.4"/>
                    </g>',
    ],
    [
        'title' => 'Salud ósea',
        'text'  => 'Fortalece los huesos para resistir la actividad, el ejercicio o el entrenamiento.',
        'icon'  => '<path d="M0 0h24v24H0z" fill="none"/>
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M15 3a3 3 0 0 1 2.995 2.824l.005 .176l-.005 .177a3.002 3.002 0 0 1 -1.995 2.654v8.338a3 3 0 1 1 -4 2.831a3 3 0 1 1 -4 -2.831v-8.338a3.002 3.002 0 0 1 -2 -2.654l-.005 -.177l.005 -.176a3 3 0 0 1 5.995 0v.177l.005 -.177a3 3 0 0 1 3 -3z"/>
                    </g>',
    ],
];

$productos = [
    'citricos' => [
        'nombre'         => 'Cítrico',
        'slug'           => 'citrico',
        'imagen'         => './assets/images/producto/card-citricos.png',
        'imagen_sm'      => './assets/images/producto/card-sm-citricos.png',
        'componentes'    => 'CaHMB + vitamina D<sub>3</sub> + magnesio',
        'contribuciones' => $contribuciones,
    ],
    'frutos-rojos' => [
        'nombre'         => 'Frutos Rojos',
        'slug'           => 'frutos-rojos',
        'imagen'         => './assets/images/producto/card-frutos.png',
        'imagen_sm'      => './assets/images/producto/card-sm-frutos.png',
        'componentes'    => 'CaHMB + vitamina D<sub>3</sub> + magnesio',
        'contribuciones' => $contribuciones,
    ],
];

if (($active_country ?? '') === 'PA') {
    unset($productos['frutos-rojos']);
}
?>

<section id="product-card-section" class="-mt-60 mb-20">

    <!-- Slider main container -->
    <div class="swiper w-full h-192 pt-20 lg:pt-0 sm:h-220 lg:h-screen overflow-hidden" id="swiper-productos">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php foreach($productos as $producto) : ?>
                <div class="swiper-slide bg-(--light) flex flex-col h-192 sm:h-220 lg:h-screen overflow-y-auto
                            lg:block lg:relative lg:overflow-hidden">

                    <!-- ── 1. Nombre + CTA (top on mobile / left on desktop) ── -->
                    <div class="px-6 pt-8 pb-2 flex flex-col gap-3 text-center
                                lg:absolute lg:left-0 lg:top-1/2 lg:-translate-y-1/2 lg:px-16 lg:text-left lg:gap-5 lg:max-w-lg lg:z-10 lg:pt-0 lg:pb-0">
                        <div>
                            <h2 class="text-3xl lg:text-4xl 2xl:text-5xl font-bold text-(--night-blue) leading-tight">
                                Elongal<sup class="text-xl lg:text-xl 2xl:text-2xl align-super">®</sup> <?= $producto['nombre'] ?>
                            </h2>
                            <p class="text-sm lg:text-xl 2xl:text-2xl text-(--night-blue) mt-1 opacity-70 font-medium">
                                <?= $producto['componentes'] ?>
                            </p>
                        </div>
                        <a href="<?= BASE_URL . '/producto.php?presentacion=' . $producto['slug'] ?>" class="color-gradient-primary text-white font-semibold px-6 py-3 rounded-full text-sm lg:text-base w-fit mx-auto lg:mx-0 inline-flex items-center gap-2 group transition-all duration-300 hover:brightness-[1.15]">
                            Encuentra tu sabor <span class="inline-block group-hover:translate-x-1 transition-transform duration-300">&rarr;</span>
                        </a>
                    </div>

                    <!-- ── 2. Imagen (middle on mobile / absolute background on desktop) ── -->
                    <div id="product-img" class="w-full flex-shrink-0 flex items-center justify-center select-none h-52 sm:h-64
                                                  lg:absolute lg:inset-0 lg:h-full lg:w-full">
                        <picture class="w-full h-full flex items-center justify-center">
                            <source media="(max-width: 1023px)" srcset="<?= $producto['imagen_sm'] ?>">
                            <img
                                src="<?= $producto['imagen'] ?>"
                                alt="Elongal <?= $producto['nombre'] ?>"
                                class="w-full h-full object-contain max-w-[95%] lg:max-w-[75vw] select-none"
                                tabindex="-1"
                            >
                        </picture>
                    </div>

                    <!-- ── 3. Contribuciones (3-col grid on mobile / right panel on desktop) ── -->
                    <div id="product-card" class="px-6 pb-8 flex flex-col gap-2
                                                   lg:absolute lg:right-0 lg:top-1/2 lg:-translate-y-1/2 lg:px-16 lg:gap-4 lg:max-w-sm 2xl:max-w-md lg:z-10 lg:pb-0">
                        <h3 id="product-title" class="text-center lg:text-start text-base md:text-xl lg:text-2xl font-bold text-(--night-blue) leading-snug mb-4 lg:mb-1">
                            Elongal<sup>®</sup> puede contribuir a:
                        </h3>

                        <div class="grid grid-cols-3 gap-3 lg:flex lg:flex-col lg:gap-4">
                            <?php foreach ($producto['contribuciones'] as $c): ?>
                            <div class="benefit-item flex flex-col items-center text-center gap-1.5
                                        lg:flex-row lg:items-start lg:text-left lg:gap-5
                                        transition-[gap] duration-200 ease-in-out lg:hover:gap-4 cursor-default">
                                <div class="shrink-0 w-9 h-9 lg:w-10 lg:h-10 rounded-full border-2 border-(--light-purple) flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4 md:w-5 md:h-5 text-(--light-purple)">
                                        <?= $c['icon'] ?>
                                    </svg>
                                </div>
                                <div class="text-(--deep-purple)">
                                    <h4 class="font-bold text-xs md:text-base leading-snug"><?= $c['title'] ?></h4>
                                    <p class="block text-xs md:text-base lg:text-sm leading-relaxed mt-0.5"><?= $c['text'] ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
