<section id="quiz-section" class="w-full relative aspect-[2/4] md:aspect-[5/6] lg:aspect-5/3">

    <!-- Imagen de fondo: mobile → banner-quiz-sm, lg+ → banner-quiz -->
    <picture class="absolute inset-0 w-full h-full">
        <source media="(min-width: 1024px)" srcset="<?php echo BASE_URL ?>/assets/images/banners/banner-quiz.png">
        <img src="<?php echo BASE_URL ?>/assets/images/banners/banner-quiz-sm.png"
             alt="" class="w-full h-full object-cover object-bottom lg:object-top">
    </picture>

    <!-- Card del quiz: centrada en mobile, alineada a la izquierda en desktop -->
    <div class="relative z-10 flex h-full items-start lg:items-center justify-center lg:justify-start py-8 lg:py-12 px-5 lg:px-[6%]">
        <div class="mt-20 bg-white/90 rounded-[18px] py-7 px-6 lg:py-10 lg:px-9 w-full max-w-[500px] shadow-[0_24px_64px_rgba(0,0,0,0.22)]">
            <div id="quiz-panel" aria-live="polite"></div>
        </div>
    </div>

</section>
