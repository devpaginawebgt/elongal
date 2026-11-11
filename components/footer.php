<?php
$show_footer_pharmacies = !isset($hide_footer_pharmacies) || $hide_footer_pharmacies === false;
?>

<!-- Footer -->
<?php if ($show_footer_pharmacies) : ?>
    <div id="info-section" class="w-full bg-[#ede8f5] -mb-20">

        <!-- Card 1: Dónde encontrar Elongal -->
        <div class="lg:max-w-6xl xl:max-w-7xl 2xl:max-w-360 mx-auto px-4 pt-8 pb-16 flex flex-col">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8 md:gap-6">

                <!-- Sección: Dónde encontrar Elongal -->
                <div id="info-search-text" class="flex flex-col lg:flex-row items-center lg:items-start gap-4 group">
                    <div class="shrink-0 gradient-icon group-hover:-translate-y-2 ease-in-out duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-20 h-20 lg:w-24 lg:h-24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path fill="currentColor" d="M12 2c-4.41 0-8 3.59-8 8c-.03 6.44 7.12 11.6 7.42 11.82c.17.12.38.19.58.19s.41-.06.58-.19c.3-.22 7.45-5.37 7.42-11.82c0-4.41-3.59-8-8-8m0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4s4 1.79 4 4s-1.79 4-4 4" />
                        </svg>
                    </div>
                    <div class="text-center lg:text-left">
                        <h3 class="text-3xl lg:text-4xl font-bold text-(--night-blue) mb-3">¿Dónde encontrar <span class="font-extrabold">Elongal</span>?</h3>
                        <p class="text-(--night-blue)/60 text-sm lg:text-lg leading-snug mb-4">Consulta los puntos de venta y farmacias disponibles en tu país.</p>
                        <div id="info-search-controls" class="flex items-center justify-center lg:justify-start gap-3 w-full sm:w-auto">
                            <div class="border border-gray-200 rounded-full bg-white overflow-hidden pr-2 focus-within:ring-2 focus-within:ring-purple-400">
                                <select id="footer-country-select" class="px-4 w-40 lg:w-52 lg:w-80 py-2 text-(--night-blue) text-sm lg:text-lg focus:outline-none">
                                    <?php foreach ($countries as $c): ?>
                                        <option
                                            value="<?= $c['code'] ?>"
                                            <?= $c['code'] === $active_country ? 'selected' : '' ?>>
                                            <?= $c['name'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button id="footer-buscar-btn" data-href="<?= BASE_URL ?>/pharmacies.php" class="color-gradient-primary text-white px-6 py-2 rounded-full font-semibold text-sm lg:text-lg flex items-center gap-2 hover:brightness-115 cursor-pointer transition-all whitespace-nowrap">
                                Buscar &rarr;
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Divisor: horizontal en mobile, vertical en desktop -->
                <div class="w-full h-px lg:w-px lg:h-16 bg-gray-300 shrink-0"></div>

                <!-- Sección: Atulado -->
                <div id="info-atulado" class="flex flex-col items-center lg:items-start gap-3 text-center lg:text-left">
                    <div id="info-atulado-text">
                        <h3 class="text-xl lg:text-2xl font-bold text-(--night-blue) leading-snug">Más apoyo para seguir adelante.</h3>
                        <p class="text-(--night-blue)/60 text-sm lg:text-base mt-1 leading-snug">Descubre los beneficios del programa Atulado<sup>®</sup> para tu tratamiento.</p>
                    </div>
                    <div id="info-atulado-cta" class="flex items-center justify-center lg:justify-start gap-4 mt-1">
                        <img
                            src="<?= BASE_URL ?>/assets/images/logos/atulado.png"
                            alt="Atulado"
                            class="h-10 w-auto object-contain shrink-0">
                        <a href="https://atulado-ca.com/" target="_blank" rel="noopener noreferrer"
                        class="color-gradient-primary text-white font-semibold px-5 py-2 rounded-full text-sm lg:text-base whitespace-nowrap hover:brightness-110 transition-all">
                            Conoce los beneficios &rarr;
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
<?php endif; ?>

<footer id="footer" class="w-full text-white pb-16 pt-24 px-6 md:px-12 bg-[length:100%_100%] bg-[url('<?= BASE_URL ?>/assets/images/decoracion/footer-sm.png')] lg:bg-[url('<?= BASE_URL ?>/assets/images/decoracion/footer.png')]">
    <div id="footer-cols" class="flex flex-col lg:flex-row items-center justify-between gap-8 lg:gap-0 text-center lg:text-left">

        <!-- Col 1: Logo + tagline -->
        <div class="flex flex-col items-center lg:items-start">
            <img src="<?php echo BASE_URL ?>/assets/images/logos/Elongal_color_2.png" alt="Elongal" class="h-32 lg:h-24 xl:h-28 w-auto object-contain"
                style="filter: invert(1) hue-rotate(180deg);">
            <p class="text-md lg:text-lg text-white lg:-mt-4 lg:ml-4" style="font-family: 'Dancing Script', cursive;">Fuerza para lo que viene</p>
        </div>

        <!-- Separador 1|2 -->
        <div class="hidden lg:block h-10 w-px bg-white"></div>

        <!-- Col 2: Redes sociales -->
        <div class="flex items-center gap-3">
            <a href="https://www.facebook.com/profile.php?id=100083142948078" target="_blank" aria-label="Facebook"
                class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:opacity-80 transition-opacity">
                <svg class="w-6 h-6" fill="var(--deep-purple)" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                </svg>
            </a>
            <a href="https://www.instagram.com/elongal_ca/" target="_blank" aria-label="Instagram"
                class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:opacity-80 transition-opacity">
                <svg class="w-6 h-6 fill-none" stroke="var(--deep-purple)" stroke-width="2.2" viewBox="0 0 24 24">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                </svg>
            </a>
            <a href="https://www.youtube.com/@lafageca" target="_blank" aria-label="YouTube"
                class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:opacity-80 transition-opacity">
                <svg class="w-6 h-6" fill="var(--deep-purple)" viewBox="0 0 24 24">
                    <path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z" />
                    <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="white" />
                </svg>
            </a>
            <!-- <a href="https://lab-lafage.com/" target="_blank" aria-label="Sitio web"
                class="w-10 h-10 flex items-center justify-center hover:opacity-80 transition-opacity">
                <svg class="w-10 h-10 stroke-white fill-none" stroke-width="1.6" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="2" y1="12" x2="22" y2="12" />
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                </svg>
            </a> -->
        </div>

        <!-- Separador 2|3 -->
        <div class="hidden lg:block h-10 w-px bg-white"></div>

        <!-- Col 3: Contacto -->
        <a href="<?php echo BASE_URL ?>/faqs.php" class="flex items-center gap-4 hover:opacity-80 transition-opacity">
            <svg class="w-10 h-10 stroke-white fill-none shrink-0" stroke-width="1.3" viewBox="0 0 24 24">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                <polyline points="22,6 12,13 2,6" />
            </svg>
            <div class="text-left">
                <p class="font-semibold text-base leading-tight">¿Tienes preguntas?</p>
                <p class="text-sm text-white/90">Contáctanos, estamos para ayudarte.</p>
            </div>
        </a>

        <!-- Separador 3|4 -->
        <div class="hidden lg:block h-10 w-px bg-white"></div>

        <!-- Col 4: LAFAGE -->
        <a href="https://lab-lafage.com/" target="_blank" class="flex flex-col items-center lg:items-end">
            <img src="<?php echo BASE_URL ?>/assets/images/logos/logo-lafage.png" alt="LAFAGE" class="h-24 lg:h-20 w-auto object-contain">
        </a>

    </div>
</footer>