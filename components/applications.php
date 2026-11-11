<?php
$aplicaciones = [
    [
        'id'       => 'proteccion',
        'tab'      => 'Protección al músculo',
        'icon'     => '<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M12.409 13.017A5 5 0 0 1 22 15c0 3.866-4 7-9 7c-4.077 0-8.153-.82-10.371-2.462c-.426-.316-.631-.832-.62-1.362C2.118 12.723 2.627 2 10 2a3 3 0 0 1 3 3a2 2 0 0 1-2 2c-1.105 0-1.64-.444-2-1"/><path d="M15 14a5 5 0 0 0-7.584 2"/><path d="M9.964 6.825C8.019 7.977 9.5 13 8 15"/></g>',
        'title'    => 'Protección al músculo',
        'subtitle' => 'Envejecimiento saludable',
        'desc'     => 'Conserva la fuerza que acompaña tu independencia. Elongal® ofrece apoyo nutricional para acompañar el cuidado de tus músculos durante el envejecimiento, junto con una alimentación adecuada y actividad física adaptada a ti.',
        'enfoque'  => 'Mantenimiento de la masa y la función muscular durante el envejecimiento.',
        'img'      => './assets/images/decoracion/abuelos.jpg',
        'btn'      => 'Conoce su aporte',
    ],
    [
        'id'       => 'potencia',
        'tab'      => 'Aumenta la potencia muscular',
        'icon'     => '<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M3 3v18h18"/><path d="M7 16v-4"/><path d="M12 16v-8"/><path d="M17 16v-12"/></g>',
        'title'    => 'Aumenta la potencia muscular',
        'subtitle' => 'Atletas orientados al alto rendimiento',
        'desc'     => 'Tu entrenamiento también necesita nutrición. Elongal® puede complementar tus necesidades nutricionales durante períodos de actividad física exigente, como parte de una estrategia que integra entrenamiento, alimentación y descanso.',
        'enfoque'  => 'Apoyo a la salud muscular durante períodos de alta exigencia física.',
        'img'      => './assets/images/decoracion/mujer-gym.png',
        'btn'      => 'Conoce su aporte',
    ],
    [
        'id'       => 'metabolica',
        'tab'      => 'Funcionalidad metabólica y endocrina',
        'icon'     => '<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M12 3a12 12 0 0 0 8.5 3A12 12 0 0 1 12 21a12 12 0 0 1-8.5-15A12 12 0 0 0 12 3z"/><path d="M9 12l2 2l4-4"/></g>',
        'title'    => 'Funcionalidad metabólica y endocrina',
        'subtitle' => 'Adultos que buscan cuidar su función muscular y salud ósea',
        'desc'     => 'Cuida los procesos que acompañan tu movimiento. Elongal® combina CaHMB, vitamina D₃ y magnesio como apoyo nutricional para la salud muscular.',
        'enfoque'  => 'Apoyo a la función muscular y al cuidado de la salud ósea.',
        'img'      => './assets/images/decoracion/nutricion.png',
        'btn'      => 'Conoce su aporte',
    ],
    [
        'id'       => 'movilidad',
        'tab'      => 'Mejora la movilidad',
        'icon'     => '<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><circle cx="13" cy="4" r="1"/><path d="M7 21l3-4"/><path d="M16 21l-2-4l-3-3l1-6"/><path d="M6 12l2-3l4-2l3 3l3 1"/></g>',
        'title'    => 'Mejora la movilidad',
        'subtitle' => 'Personas con un estilo de vida activo',
        'desc'     => 'Muévete, explora y disfruta lo que te gusta. Elongal® puede acompañar el cuidado de tu salud muscular como complemento de una alimentación equilibrada, el ejercicio regular y el descanso.',
        'enfoque'  => 'Cuidado de la función muscular para acompañar una vida activa.',
        'img'      => './assets/images/decoracion/pareja-escalando.png',
        'btn'      => 'Conoce su aporte',
    ],
    [
        'id'       => 'edades',
        'tab'      => 'Para todas las edades',
        'icon'     => '<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path fill="currentColor" d="M5 8a3 3 0 1 0 6 0 3 3 0 1 0 -6 0" opacity=".2" stroke="none" /><path fill="currentColor" d="M15 10a2 2 0 1 0 4 0 2 2 0 1 0 -4 0" opacity=".2" stroke="none" /><path d="M5 8a3 3 0 1 0 6 0 3 3 0 1 0 -6 0" /><path d="M3 20a5 5 0 0 1 10 0" /><path d="M15 10a2 2 0 1 0 4 0 2 2 0 1 0 -4 0" /><path d="M13 20a4 4 0 0 1 8 0" /></g>',
        'title'    => 'Para todas las edades',
        'subtitle' => 'Adultos que requieren nutrición clínica y apoyo durante la recuperación',
        'desc'     => 'Acompaña tu recuperación. Cuida tu fuerza. Después de una enfermedad, lesión o cirugía, Elongal® puede formar parte de tu apoyo nutricional, según la valoración de tu profesional de salud.',
        'enfoque'  => 'Apoyo muscular durante períodos de convalecencia o menor actividad física.',
        'img'      => './assets/images/decoracion/hombre-ejercicio.png',
        'btn'      => 'Conoce su aporte',
    ],
];
?>

<section id="aplicaciones" class="w-full bg-(--light) pb-8 px-4 lg:px-8">
    <div class="w-full lg:px-8">

        <!-- Header -->
        <div class="text-center mb-8">
            <span class="text-xs font-bold tracking-[0.2em] text-(--deep-purple) uppercase">Aplicaciones</span>
            <h2 class="text-3xl md:text-4xl font-bold text-(--deep-purple) mt-3">Salud Muscular para todos</h2>
            <p class="text-(--night-blue) mt-4 text-base md:text-lg max-w-xl mx-auto">
                Apoyo nutricional para distintas necesidades de la salud muscular.
            </p>
        </div>

        <!-- Tabs -->
        <div class="place-items-center gap-2 mb-8 flex flex-wrap md:flex-nowrap justify-center md:gap-4 lg:gap-12 md:mb-12">
            <?php foreach ($aplicaciones as $i => $app): ?>
            <button class="aplicacion-tab flex flex-col items-center gap-3 group cursor-pointer transition-transform duration-200 hover:scale-105" data-index="<?= $i ?>">
                <div class="tab-ring w-12 h-12 md:w-16 md:h-16 rounded-full border-2 border-gray-200 flex items-center justify-center transition-colors duration-300 group-hover:border-(--light-purple) group-hover:bg-(--light-purple)/5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="tab-icon w-5 h-5 md:w-7 md:h-7 text-gray-400 transition-colors duration-300 group-hover:text-(--light-purple)">
                        <?= $app['icon'] ?>
                    </svg>
                </div>
                <div class="flex flex-col items-center gap-1.5 w-28 sm:w-32">
                    <span class="tab-label text-xs font-medium text-center leading-tight text-gray-500 transition-colors duration-300 group-hover:text-(--deep-purple)">
                        <?= htmlspecialchars($app['tab']) ?>
                    </span>
                    <div class="tab-bar h-0.5 w-full rounded-full"></div>
                </div>
            </button>
            <?php endforeach; ?>
        </div>

        <!-- Swiper -->
        <div class="swiper md:aspect-[6/4] lg:aspect-[8/3] rounded-3xl" id="swiper-aplicaciones">
            <div class="swiper-wrapper">
                <?php foreach ($aplicaciones as $i => $app): ?>
                <div class="swiper-slide h-full grow-1 flex flex-col items-stretch">
                    <div class="aplicacion-card w-full h-full grow-1 rounded-3xl overflow-hidden flex flex-col <?= $i % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' ?>">

                        <!-- Foto -->
                        <div class="md:w-[55%] aspect-[6/4] md:aspect-[4/3] md:aspect-auto">
                            <img
                                src="<?= $app['img'] ?>"
                                alt="<?= htmlspecialchars($app['title']) ?>"
                                class="aspect-[6/4] w-full md:h-full object-cover"
                            />
                        </div>

                        <!-- Contenido -->
                        <div class="md:w-[45%] p-8 md:p-10 bg-violet-50 flex flex-col justify-center">

                            <!-- Ícono + Título -->
                            <div class="flex items-center gap-4 mb-3">
                                <div class="w-12 h-12 rounded-full border-2 border-(--light-purple) flex items-center justify-center shrink-0 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 text-(--light-purple)">
                                        <?= $app['icon'] ?>
                                    </svg>
                                </div>
                                <h3 class="text-2xl lg:text-3xl min-[1500px]:text-4xl font-bold text-(--night-blue) leading-tight">
                                    <?= htmlspecialchars($app['title']) ?>
                                </h3>
                            </div>

                            <!-- Subtítulo -->
                            <p class="text-xl min-[1500px]:text-2xl font-semibold text-gradient-primary mb-5">
                                <?= htmlspecialchars($app['subtitle']) ?>
                            </p>

                            <!-- Descripción -->
                            <p class="text-gray-500 text-sm min-[1500px]:text-base leading-relaxed mb-5">
                                <?= htmlspecialchars($app['desc']) ?>
                            </p>

                            <!-- Divisor -->
                            <div class="w-full h-px bg-purple-100 mb-4"></div>

                            <!-- Enfoque nutricional -->
                            <span class="text-[11px] font-bold tracking-[0.18em] text-(--light-purple) mb-2">ENFOQUE NUTRICIONAL</span>
                            <p class="text-gray-500 text-sm min-[1500px]:text-base leading-relaxed mb-8">
                                <?= htmlspecialchars($app['enfoque']) ?>
                            </p>

                            <!-- Botón -->
                            <!-- <div>
                                <button class="inline-flex items-center gap-2 px-6 py-3 rounded-full border border-(--light-purple) text-(--light-purple) text-sm font-medium hover:bg-(--light-purple) hover:text-white transition-all duration-300">
                                    <?= htmlspecialchars($app['btn']) ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </button>
                            </div> -->

                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>
