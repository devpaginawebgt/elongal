<section id="hero" class="relative w-full h-screen overflow-hidden bg-(--light)">

    <?php
        $presentaciones = [
            'citricos' => [
                'id'       => 1,
                'fondo'    => BASE_URL . '/assets/images/banners/hero-citricos.png',
                'fondo-sm' => BASE_URL . '/assets/images/banners/hero-sm-citricos.png',
                'producto' => BASE_URL . '/assets/images/producto/sobre-frutas-citricos.png',
                'nombre'   => 'Cítrico',
                'modal-imagen' => BASE_URL . '/assets/images/producto/caja-citricos.png',
                'video'    => BASE_URL . '/assets/videos/video-hero-citricos.mp4',
                'activo'   => 1,
            ],
            'frutos-rojos' => [
                'id'       => 2,
                'fondo'    => BASE_URL . '/assets/images/banners/hero-frutos.png',
                'fondo-sm' => BASE_URL . '/assets/images/banners/hero-sm-frutos.png',
                'producto' => BASE_URL . '/assets/images/producto/sobre-frutas-frutos-rojos.png',
                'nombre'   => 'Frutos Rojos',
                'modal-imagen' => BASE_URL . '/assets/images/producto/caja-frutos-rojos.png',
                'video'    => BASE_URL . '/assets/videos/video-hero-frutos.mp4',
                'activo'   => 0,
            ]
        ];

        if (($active_country ?? '') === 'PA') {
            unset($presentaciones['frutos-rojos']);
        }

        $presentacion_activa = $presentaciones['citricos'];
    ?>

    <!-- ── Fondo (intercambiable vía JS, visible solo en mobile) ── -->
    <div id="hero-bg"
         class="absolute inset-0 w-full h-full bg-cover bg-top lg:bg-center z-0"
         style="background-image: url(<?= $presentacion_activa['fondo'] ?>);">
    </div>

    <!-- ── Video de fondo: solo desktop (lg+), opacidad gestionada por JS ── -->
    <video id="hero-bg-video"
           class="hidden lg:block absolute inset-0 w-full h-full object-cover z-[1]"
           autoplay muted loop playsinline
           style="opacity:0;">
        <source src="<?= $presentacion_activa['video'] ?>" type="video/mp4">
    </video>

    <!-- Degradado inferior hacia morado -->
    <div class="absolute bottom-0 left-0 right-0 h-48 z-10 bg-gradient-to-t from-(--deep-purple) via-(--deep-purple)/60 to-transparent"></div>

    <!-- ── Producto sachet: solo desktop (en mobile lo trae el fondo-sm) ── -->
    <div id="hero-product"
         class="lg:block absolute
            bg-contain bg-no-repeat bg-center z-20
            w-full max-w-200 aspect-5/2 rotate-310
            -bottom-8 -left-36
            lg:w-auto lg:max-w-none lg:aspect-auto lg:rotate-0
            lg:top-[2%] lg:left-[30%] lg:right-0 lg:bottom-[18%]"
         style="background-image: url(<?= $presentacion_activa['producto'] ?>);">
    </div>

    <!-- ── Texto izquierdo ── -->
    <div id="hero-text" class="absolute left-1/2 -translate-x-1/2 lg:left-16 lg:translate-x-0
                top-30 lg:top-1/2 lg:-translate-y-1/2
                z-30 w-full sm:max-w-md md:max-w-xl lg:max-w-sm
                flex flex-col items-center lg:items-start text-center lg:text-start gap-3 sm:gap-4 lg:gap-5">

        <!-- Titular -->
        <div>
            <h1 class="text-5xl md:text-5xl font-black text-(--night-blue) leading-[1.05] mt-1 max-w-[12ch] sm:max-w-none lg:max-w-none mx-auto sm:mx-none">
                Restaura y fortalece la
            </h1>
            <span class="block text-5xl md:text-6xl italic font-black leading-none text-gradient-secondary px-4 sm:px-0">
                Salud muscular
            </span>
            <p class="text-sm text-gray-700 mt-3">
                Descubre <strong>Elongal®</strong> y sus dos sabores.
            </p>
        </div>

        <!-- Selector de sabores -->
        <div class="flex gap-4">
            <div class="flex flex-col gap-2 lg:gap-3 flex-1">
                <?php foreach($presentaciones as $presentacion) : ?>
                    <div
                        class="flex items-center gap-2 hover:translate-x-2 transition-transform duration-200 cursor-pointer"
                        data-presentacion="1"
                        data-id="<?= $presentacion['id'] ?>"
                        data-fondo="<?= $presentacion['fondo'] ?>"
                        data-fondo-sm="<?= $presentacion['fondo-sm'] ?>"
                        data-producto="<?= $presentacion['producto'] ?>"
                        data-nombre="<?= $presentacion['nombre'] ?>"
                        data-modal-imagen="<?= $presentacion['modal-imagen'] ?>"
                        data-video="<?= $presentacion['video'] ?>"
                        data-activo="<?= $presentacion['activo'] ?>"
                    >
                        <div class="w-2 h-2 lg:w-2.5 lg:h-2.5 rounded-full bg-(--deep-purple)"></div>
                        <button type="button" class="px-3 py-1 border border-(--deep-purple) text-(--deep-purple) bg-white lg:bg-transparent text-xs sm:text-sm rounded-lg cursor-pointer">
                            <span class="italic"><?php echo sprintf('%02d', $presentacion['id']); ?></span>
                            <span class="ml-1 font-semibold"><?php echo $presentacion['nombre']; ?></span>
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- CTA -->
        <div class="flex flex-col text-(--deep-purple)">
            <span class="ml-2 -mb-1 text-xs">Un recorrido lleno de sabor</span>
            <button id="hero-cta-btn" class="mt-2 sm:mt-3 px-5 sm:px-6 py-2.5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold text-white bg-(--deep-purple) flex items-center gap-2 cursor-pointer transition-all hover:brightness-120 duration-300 ease-in-out group">
                Conoce Elongal
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round"
                     class="group-hover:translate-x-1 transition-transform duration-300">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- ── Panel "Explora los sabores" ── -->
    <div id="hero-flavor-panel" class="absolute bottom-4 right-3 sm:bottom-6 sm:right-5 lg:bottom-16 lg:right-4 z-30">
        <div class="bg-white/80 backdrop-blur-md rounded-2xl p-3 sm:p-4 shadow-lg w-44 sm:w-56 lg:w-60">
            <div class="flex items-center justify-between mb-2 sm:mb-3">
                <span class="text-[0.55rem] sm:text-[0.6rem] font-bold tracking-widest text-gray-500 uppercase">
                    Explora los sabores
                </span>
            </div>
            <div class="flex gap-2">
                <?php foreach ($presentaciones as $p): ?>
                    <div
                        data-presentacion-card="1"
                        data-id="<?= $p['id'] ?>"
                        data-active="<?= $p['activo'] ?>"
                        class="flex flex-col items-center gap-1 sm:gap-1.5 flex-1 transition-opacity duration-200 cursor-pointer hover:opacity-100 <?= $p['activo'] ? '' : 'opacity-60' ?>"
                    >
                        <div class="w-full aspect-6/4 rounded-lg overflow-hidden <?= $p['activo'] ? 'ring-2 ring-(--deep-purple)' : '' ?>">
                            <img src="<?= $p['fondo'] ?>"
                                 alt="<?= $p['nombre'] ?>"
                                 class="w-full h-full object-cover">
                        </div>
                        <span class="text-[0.6rem] sm:text-xs font-semibold <?= $p['activo'] ? 'text-(--deep-purple)' : 'text-gray-500' ?>">
                            <?= $p['nombre'] ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- ── Modal: Conoce Elongal ─────────────────────────────────── -->
    <div id="hero-modal"
         class="fixed inset-0 z-[100] pointer-events-none md:flex md:items-center md:justify-center md:p-6 lg:p-8"
         role="dialog" aria-modal="true">

        <!-- Backdrop -->
        <div id="hero-modal-backdrop"
             class="absolute inset-0 bg-black/50 backdrop-blur-sm opacity-0">
        </div>

        <!-- Panel -->
        <div id="hero-modal-panel"
             class="relative z-10 bg-white opacity-0
                    w-full h-full overflow-y-auto
                    md:h-auto md:max-h-[90vh] md:w-full md:max-w-2xl lg:max-w-5xl 2xl:max-w-6xl md:rounded-2xl lg:rounded-3xl">

            <!-- Botón cerrar: sticky en mobile, absoluto en desktop -->
            <div class="sticky top-0 z-10 flex justify-end px-4 pt-4 pb-2 bg-white/90 backdrop-blur-sm
                        md:absolute md:top-5 md:right-5 md:p-0 md:bg-transparent md:backdrop-blur-none">
                <button id="hero-modal-close"
                        class="w-10 h-10 rounded-full border-2 border-(--deep-purple)
                               flex items-center justify-center bg-white
                               text-(--deep-purple) cursor-pointer
                               transition-colors duration-200 hover:bg-(--deep-purple) hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6L6 18M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Cabecera -->
            <div class="px-6 lg:px-10 pt-2 md:pt-10 pb-4">
                <span class="text-[0.6rem] font-bold tracking-widest text-gray-400 uppercase">
                    Conoce Elongal®
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-(--night-blue) leading-tight mt-1">
                    Nutrición para la salud muscular
                </h2>
            </div>

            <!-- Divisor -->
            <div class="h-px bg-gradient-to-r from-gray-200 via-gray-100 to-transparent mx-6 lg:mx-10"></div>

            <!-- Fila de ingredientes -->
            <div class="grid grid-cols-3 gap-2 lg:gap-4 px-6 lg:px-10 py-5 lg:py-6">
                <div class="bg-purple-50 rounded-xl lg:rounded-2xl p-3 lg:p-5">
                    <div class="text-[0.6rem] lg:text-xs font-bold text-(--deep-purple) uppercase tracking-wider mb-1">CaHMB</div>
                    <div class="text-xl sm:text-2xl lg:text-3xl font-black text-(--night-blue)">3 gramos</div>
                    <div class="text-[0.55rem] lg:text-xs text-gray-500 mt-1 leading-snug">
                        Equivalente a 2.4 g de hidroximetilbutirato
                    </div>
                </div>
                <div class="bg-purple-50 rounded-xl lg:rounded-2xl p-3 lg:p-5">
                    <div class="text-[0.6rem] lg:text-xs font-bold text-(--deep-purple) uppercase tracking-wider mb-1">
                        Vitamina D<sub>3</sub>
                    </div>
                    <div class="text-xl sm:text-2xl lg:text-3xl font-black text-(--night-blue)">2,000 UI</div>
                </div>
                <div class="bg-purple-50 rounded-xl lg:rounded-2xl p-3 lg:p-5">
                    <div class="text-[0.6rem] lg:text-xs font-bold text-(--deep-purple) uppercase tracking-wider mb-1">Magnesio</div>
                    <div class="text-xl sm:text-2xl lg:text-3xl font-black text-(--night-blue)">400 mg</div>
                </div>
            </div>

            <!-- Cuerpo -->
            <div class="grid lg:grid-cols-2 gap-6 lg:gap-8 px-6 lg:px-10 pb-8">

                <!-- Izquierda: imagen + sabor -->
                <div class="relative bg-purple-50 rounded-2xl w-full flex items-center justify-center p-6">
                    <div class="absolute top-3 right-3 flex items-center bg-white border border-(--deep-purple)/20 rounded-full px-3 py-1 shadow-sm">
                        <span id="hero-modal-flavor" class="text-[0.65rem] font-semibold text-(--deep-purple)">
                            Sabor <?= $presentacion_activa['nombre'] ?>
                        </span>
                    </div>
                    <img id="hero-modal-img"
                         src="<?= $presentacion_activa['modal-imagen'] ?>"
                         alt="Elongal"
                         class="w-full max-w-xs lg:max-w-sm aspect-square object-contain">
                </div>

                <!-- Derecha: ficha técnica + contenido -->
                <div class="flex flex-col gap-5">

                    <!-- Forma, Presentación, Vía -->
                    <div class="grid grid-cols-3 gap-3 pb-5 border-b border-gray-100">
                        <div>
                            <div class="text-[0.5rem] lg:text-[0.55rem] font-bold tracking-widest uppercase text-gray-400 mb-1">
                                Forma farmacéutica
                            </div>
                            <div class="text-xs lg:text-sm font-semibold text-(--night-blue) leading-tight">
                                Polvo para solución oral
                            </div>
                        </div>
                        <div>
                            <div class="text-[0.5rem] lg:text-[0.55rem] font-bold tracking-widest uppercase text-gray-400 mb-1">
                                Presentación
                            </div>
                            <div class="text-xs lg:text-sm font-semibold text-(--night-blue) leading-tight">
                                Sobres monodosis
                            </div>
                        </div>
                        <div>
                            <div class="text-[0.5rem] lg:text-[0.55rem] font-bold tracking-widest uppercase text-gray-400 mb-1">
                                Vía de administración
                            </div>
                            <div class="text-xs lg:text-sm font-semibold text-(--night-blue) leading-tight">
                                Oral
                            </div>
                        </div>
                    </div>

                    <!-- Uso -->
                    <div>
                        <h3 class="text-xl lg:text-2xl font-black text-(--night-blue) mb-2">Uso</h3>
                        <p class="text-sm lg:text-base text-gray-600 leading-relaxed">
                            Apoyo nutricional para la salud muscular y para estados asociados con pérdida
                            de masa muscular debido a la edad, falta o exceso de actividad física u otras condiciones.
                        </p>
                    </div>

                    <!-- Apoyo nutricional -->
                    <div>
                        <h3 class="text-xl lg:text-2xl font-black text-(--night-blue) mb-1">Apoyo nutricional</h3>
                        <p class="text-xs lg:text-sm text-gray-500 mb-3">Elongal® puede contribuir a:</p>
                        <ul class="flex flex-col gap-2">
                            <?php
                            $beneficios_modal = [
                                'Apoyar el mantenimiento de la masa muscular.',
                                'Fortalecer la salud muscular.',
                                'Acompañar las necesidades nutricionales asociadas con el envejecimiento.',
                                'Brindar soporte nutricional en períodos de poca o excesiva actividad física.',
                                'Apoyar la función muscular y la salud ósea.',
                                'Favorecer el aprovechamiento del calcio por medio de la vitamina D₃.',
                            ];
                            foreach ($beneficios_modal as $b): ?>
                                <li class="flex items-start gap-2 text-xs lg:text-sm text-gray-700 leading-snug">
                                    <svg class="shrink-0 mt-0.5 text-(--deep-purple)"
                                         xmlns="http://www.w3.org/2000/svg"
                                         width="15" height="15" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2.5"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 6L9 17l-5-5"/>
                                    </svg>
                                    <?= $b ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Barra de gradiente inferior -->
            <div class="h-1.5 color-gradient-primary lg:rounded-b-3xl"></div>
        </div>
    </div>

</section>
