<?php
$categories = [
    [
        'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18h8M3 22h18m-7 0a7 7 0 1 0 0-14h-1m-4 6h2m-2-2a2 2 0 0 1-2-2V6h6v4a2 2 0 0 1-2 2Zm3-6V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3"/></svg>',
        'title' => 'Ciencia y Evidencia',
        'desc'  => 'Elongal® está respaldado por investigación clínica y formulado con ingredientes activos de comprobada eficacia para apoyar la salud muscular y el envejecimiento activo.',
        'img'   => BASE_URL . '/assets/images/decoracion/science.jpg',
    ],
    [
        'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 10.42l4.8-5.07M19 18h3M9.5 22L21.414 9.415A2 2 0 0 0 21.2 6.4l-5.61-4.208A1 1 0 0 0 14 3v2a2 2 0 0 1-1.394 1.906L8.677 8.053A1 1 0 0 0 8 9c-.155 6.393-2.082 9-4 9a2 2 0 0 0 0 4h14"/></svg>',
        'title' => 'Bienestar y Movimiento',
        'desc'  => 'Mantener la fuerza y la movilidad es clave para una vida plena. Elongal® complementa tu rutina activa, ayudando a preservar la masa muscular y la vitalidad en cada etapa de vida.',
        'img'   => BASE_URL . '/assets/images/decoracion/health.jpg',
    ],
    [
        'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M11 2v2M5 2v2m0-1H4a2 2 0 0 0-2 2v4a6 6 0 0 0 12 0V5a2 2 0 0 0-2-2h-1"/><path d="M8 15a6 6 0 0 0 12 0v-3"/><circle cx="20" cy="10" r="2"/></g></svg>',
        'title' => 'Profesionales de la Salud',
        'desc'  => 'Una herramienta confiable para médicos, nutriólogos y fisioterapeutas que acompañan a sus pacientes en el cuidado de la salud muscular y la funcionalidad física.',
        'img'   => BASE_URL . '/assets/images/decoracion/profesional.jpg',
    ],
];

?>

<!-- ── Desktop: scroll-driven (lg+) ── -->
 <div id="categories-section">
     <section class="hidden lg:block relative bg-(--light)" style="height: 200vh;">
         <div class="sticky top-0 h-screen overflow-hidden flex items-center">
             <div class="w-full max-w-340 mx-auto px-12 pt-8 xl:px-16 grid grid-cols-[1fr_1.1fr] gap-16 xl:gap-20 items-center">
     
                 <!-- Left: title · tabs · description · CTA -->
                 <div>
                     <h2 class="text-5xl xl:text-6xl font-black text-(--night-blue) leading-[1.1] mb-10">
                         Conocimiento que<br>te mueve<span class="text-gradient-primary">.</span>
                     </h2>
     
                     <div id="cat-tabs" class="space-y-5 mb-8">
                         <?php foreach ($categories as $i => $cat): ?>
                         <button
                             class="cat-tab flex items-center gap-4 w-full text-left bg-transparent border-0 p-0 cursor-pointer transition-transform duration-200 hover:translate-x-1.5"
                             data-cat="<?= $i ?>"
                         >
                             <span
                                 class="cat-tab-icon flex-shrink-0 flex items-center justify-center"
                                 style="width:1.75rem; height:1.75rem; color:rgba(23,19,78,0.35);"
                             ><?= $cat['icon'] ?></span>
                             <span
                                 class="cat-tab-label text-xl font-bold"
                                 style="color:rgba(23,19,78,0.35);"
                             ><?= $cat['title'] ?></span>
                         </button>
                         <?php endforeach; ?>
                     </div>
     
                     <div class="relative h-32 overflow-hidden mb-8">
                         <?php foreach ($categories as $i => $cat): ?>
                         <p
                             class="cat-desc absolute top-0 left-0 right-0 text-lg text-gray-500 leading-relaxed m-0"
                             style="opacity:0;"
                             data-cat="<?= $i ?>"
                         ><?= $cat['desc'] ?></p>
                         <?php endforeach; ?>
                     </div>
     
                     <a href="<?= BASE_URL; ?>/blog.php" class="inline-flex items-center gap-2 color-gradient-primary text-white font-bold py-4 px-8 rounded-full text-base tracking-wide hover:brightness-[1.15] transition-all duration-300">
                         Explora los recursos &nbsp;→
                     </a>
                 </div>
     
                 <!-- Right: image stack carousel (posicionamiento y animación manejados por GSAP) -->
                 <div id="cat-images" class="relative overflow-hidden" style="height:88vh;">
                     <?php foreach ($categories as $i => $cat): ?>
                     <div
                         class="cat-img-item absolute inset-x-0 top-0 rounded-3xl overflow-hidden cursor-pointer group"
                         data-cat="<?= $i ?>"
                         style="opacity:0;"
                     >
                         <img
                             src="<?= $cat['img'] ?>"
                             alt="<?= htmlspecialchars($cat['title']) ?>"
                             class="w-full h-full object-cover group-hover:scale-110 transition-[scale] duration-300 ease-in-out"
                         >
                         <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent pointer-events-none"></div>
                         <span class="cat-img-label absolute bottom-5 left-5 text-white font-bold leading-snug max-w-[75%]"
                         ><?= htmlspecialchars($cat['title']) ?></span>
                     </div>
                     <?php endforeach; ?>
                 </div>
     
             </div>
         </div>
     </section>
     
     <!-- ── Mobile: stacked cards ── -->
     <section class="lg:hidden bg-(--light) py-16 px-5">
         <h2 class="text-4xl font-black text-(--night-blue) leading-tight mb-8">
             Conocimiento que te mueve<span class="text-gradient-primary">.</span>
         </h2>
         <div class="space-y-5 max-w-md mx-auto">
             <?php foreach ($categories as $cat): ?>
             <div class="rounded-2xl overflow-hidden bg-white shadow-sm">
                 <div class="relative h-44">
                     <img src="<?= $cat['img'] ?>" alt="<?= htmlspecialchars($cat['title']) ?>" class="w-full h-full object-cover">
                     <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent pointer-events-none"></div>
                 </div>
                 <div class="p-5">
                     <div class="flex items-center gap-3 mb-2">
                         <span class="flex-shrink-0 flex items-center" style="width:1.5rem; height:1.5rem; color:var(--light-purple);">
                             <?= $cat['icon'] ?>
                         </span>
                         <h3 class="font-bold text-(--night-blue) text-lg"><?= $cat['title'] ?></h3>
                     </div>
                     <p class="text-gray-500 text-base leading-relaxed m-0"><?= $cat['desc'] ?></p>
                 </div>
             </div>
             <?php endforeach; ?>
             <a href="<?= BASE_URL; ?>/blog.php" class="block text-center color-gradient-primary text-white font-bold py-4 px-8 rounded-full text-base tracking-wide hover:brightness-[1.15] transition-all duration-300 mt-2">
                 Explora los recursos →
             </a>
         </div>
     </section>
 </div>
