<?php
$posts = [
    [
        'category' => 'Nutrición',
        'title'    => 'Cómo la proteína acelera tu recuperación muscular',
        'img'      => BASE_URL . '/assets/images/decoracion/health.jpg',
        'span'     => '',
    ],
    [
        'category' => 'Ciencia',
        'title'    => 'La evidencia detrás de los aminoácidos esenciales',
        'img'      => BASE_URL . '/assets/images/decoracion/science.jpg',
        'span'     => '',
    ],
    [
        'category' => 'Rendimiento',
        'title'    => 'Suplementación para atletas de alto nivel',
        'img'      => BASE_URL . '/assets/images/decoracion/profesional.jpg',
        'span'     => 'lg:col-span-2',
    ],
    [
        'category' => 'Estilo de vida',
        'title'    => 'Hábitos que potencian tu entrenamiento diario',
        'img'      => BASE_URL . '/assets/images/decoracion/ejercicio.jpg',
        'span'     => 'lg:col-span-2',
    ],
    [
        'category' => 'Nutrición',
        'title'    => 'Carbohidratos: aliados, no enemigos',
        'img'      => BASE_URL . '/assets/images/decoracion/observando.jpg',
        'span'     => '',
    ],
    [
        'category' => 'Recuperación',
        'title'    => 'Sueño y músculo: la conexión que no sabías',
        'img'      => BASE_URL . '/assets/images/decoracion/abuelos.jpg',
        'span'     => '',
    ],
];
?>

<section id="blog" class="w-full bg-(--night-blue) pt-12">
    <div class="mx-auto">

        <div class="mb-10 px-4">
            <p class="text-xs font-bold uppercase tracking-widest text-gradient-primary mb-2">Blog</p>
            <h2 class="text-4xl lg:text-5xl font-bold text-white">Últimos artículos</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 lg:auto-rows-[320px]">
            <?php foreach ($posts as $post): ?>
            <article class="blog-card relative overflow-hidden cursor-pointer h-72 lg:h-auto <?= $post['span'] ?>">

                <!-- Imagen: en hover se recorta dejando un marco del color de la sección -->
                <div class="blog-card-media absolute inset-0 overflow-hidden">
                    <img
                        src="<?= htmlspecialchars($post['img']) ?>"
                        alt="<?= htmlspecialchars($post['title']) ?>"
                        class="blog-card-img w-full h-full object-cover"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent pointer-events-none"></div>

                    <!-- Título por defecto: se oculta en hover (en touch no se muestra porque la caja ya es visible) -->
                    <h3 class="blog-card-caption absolute left-6 right-6 bottom-6 text-white font-bold text-xl leading-snug [@media(hover:none)]:hidden lg:hidden">
                        <?= htmlspecialchars($post['title']) ?>
                    </h3>
                </div>

                <!-- Caja de info: entra desde la derecha en hover (visible siempre en touch) -->
                <div class="blog-card-info absolute left-[12%] right-0 top-1/2 -translate-y-1/2 bg-(--night-blue) p-4 flex items-center justify-between gap-4">
                    <div>
                        <p class="blog-card-text text-[11px] font-bold uppercase tracking-widest text-gradient-secondary mb-1">
                            <?= htmlspecialchars($post['category']) ?>
                        </p>
                        <h3 class="blog-card-text text-white font-bold text-lg leading-snug">
                            <?= htmlspecialchars($post['title']) ?>
                        </h3>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="blog-card-text shrink-0 w-7 h-7 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"/>
                    </svg>
                </div>

            </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>
