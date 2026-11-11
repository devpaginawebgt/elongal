<?php
$active_page = $active_page ?? 'inicio';

// desktop: 'always' = lg+, 'xl' = solo xl+, 'lg' = solo lg (oculto en xl+)
// mobile: true = aparece en el menú hamburguesa
$nav_links = [
    ['label' => 'Inicio',              'key' => 'inicio',         'href' => BASE_URL . '/#hero',                 'active' => $active_page === 'inicio',        'desktop' => 'always', 'mobile' => true],
    ['label' => 'Conoce Elongal',      'key' => 'conoce-elongal', 'href' => BASE_URL . '/#product-card-section', 'active' => $active_page === 'conoce-elongal', 'desktop' => 'always', 'mobile' => true],
    ['label' => 'Salud muscular',      'key' => 'salud-muscular', 'href' => BASE_URL . '/#aplicaciones',         'active' => $active_page === 'salud-muscular', 'desktop' => 'always', 'mobile' => true],
    ['label' => 'Ciencia y Evidencia', 'key' => 'ciencia',        'href' => BASE_URL . '/#categories-section',   'active' => $active_page === 'ciencia',        'desktop' => 'xl',     'mobile' => true],
    ['label' => 'Bienestar',           'key' => 'bienestar',      'href' => BASE_URL . '/#categories-section',   'active' => $active_page === 'bienestar',      'desktop' => 'xl',     'mobile' => true],
    ['label' => 'Profesionales',       'key' => 'profesionales',  'href' => BASE_URL . '/#categories-section',   'active' => $active_page === 'profesionales',  'desktop' => 'xl',     'mobile' => true],
    ['label' => 'Blog',                'key' => 'blog',           'href' => BASE_URL . '/#categories-section',   'active' => $active_page === 'blog',           'desktop' => 'lg',     'mobile' => false],
    ['label' => 'FAQs',                'key' => 'faqs',           'href' => BASE_URL . '/faqs.php',              'active' => $active_page === 'faqs',           'desktop' => 'always', 'mobile' => true],
    ['label' => 'Contacto',            'key' => 'contacto',       'href' => BASE_URL . '/faqs.php#faq-contact',  'active' => $active_page === 'contacto',       'desktop' => 'always', 'mobile' => true],
];

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
    $country = $countries[$_SESSION['pais']] ?? $countries['GT'];;

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


?>

<!-- NAVBAR -->
<header class="fixed top-0 left-0 right-0 z-50 w-full">

    <nav class="w-full px-4 py-3 flex items-start justify-between lg:gap-2">

        <!-- Logo + tagline -->
        <a href="<?= BASE_URL ?>/" class="flex flex-col items-start shrink-0 rounded-3xl overflow-hidden bg-white/75 backdrop-blur-md">
            <img src="./assets/images/logos/Elongal_color.png" alt="Elongal" class="w-full max-w-40 md:max-w-48">
        </a>

        <!-- Links desktop (pill container) -->
        <ul class="hidden lg:flex items-center bg-white/75 backdrop-blur-md rounded-full shadow-md px-2 py-1.5 gap-1.5">
            <?php foreach ($nav_links as $link):
                if ($link['desktop'] === 'xl') {
                    $li_class = 'hidden xl:block';
                } elseif ($link['desktop'] === 'lg') {
                    $li_class = 'block xl:hidden';
                } else {
                    $li_class = '';
                }
            ?>
                <li class="<?= $li_class ?>">
                    <a href="<?= $link['href'] ?>"
                       data-nav="<?= $link['key'] ?>"
                       <?= isset($link['cat_index']) ? 'data-cat-index="' . $link['cat_index'] . '"' : '' ?>
                       class="block py-[0.45rem] px-[1.1rem] rounded-full text-sm 2xl:text-base whitespace-nowrap transition-colors duration-300 ease-in-out
                              <?= $link['active']
                                  ? 'bg-(--deep-purple) text-white font-semibold'
                                  : 'font-medium text-gray-700 hover:bg-(--light-purple) hover:text-white' ?>">
                        <?= $link['label'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Derecha: select de país + hamburguesa -->
        <div class="flex items-center gap-3">

            <!-- Select de país -->
            <div class="hidden md:flex items-center bg-white/75 backdrop-blur-md rounded-full shadow-md px-4 py-3.5">
                <div class="relative flex items-center">
                    <select data-country-select class="appearance-none bg-transparent border-none outline-none text-sm font-medium text-gray-700 cursor-pointer pr-5">
                        <?php foreach ($countries as $country): ?>
                            <option
                                value="<?= $country['code'] ?>"
                                <?= $country['code'] === $active_country ? 'selected' : '' ?>>
                                <?= $country['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <svg class="absolute right-0 pointer-events-none"
                         xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                         viewBox="0 0 24 24" fill="none"
                         stroke="#374151" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </div>
            </div>

            <!-- Hamburguesa -->
            <button id="menu-toggle" aria-label="Menú" aria-expanded="false"
                    class="px-3.5 py-3.5 flex lg:hidden items-center justify-center bg-white rounded-full shadow-md text-gray-600 hover:text-gray-900 transition-colors cursor-pointer bg-white/75 backdrop-blur-md">
                <svg id="icon-open" xmlns="http://www.w3.org/2000/svg" width="1.15rem" height="1.15rem"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="icon-close" xmlns="http://www.w3.org/2000/svg" width="1.15rem" height="1.15rem"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

        </div>
    </nav>

    <!-- Menú mobile -->
    <div id="mobile-menu" class="hidden lg:hidden bg-white shadow-lg px-6 py-5">
        <ul class="flex flex-col gap-4">
            <?php foreach ($nav_links as $link): if (!$link['mobile']) continue; ?>
                <li>
                    <a href="<?= $link['href'] ?>"
                       data-nav="<?= $link['key'] ?>"
                       <?= isset($link['cat_index']) ? 'data-cat-index="' . $link['cat_index'] . '"' : '' ?>
                       class="block text-sm font-semibold <?= $link['active'] ? 'text-gradient-primary' : 'text-gray-700' ?>">
                        <?= $link['label'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <select data-country-select class="w-full text-sm font-medium text-gray-700 outline-none bg-transparent">
                <?php foreach ($countries as $country): ?>
                    <option value="<?= $country['code'] ?>"
                        <?= $country['code'] === $active_country ? 'selected' : '' ?>>
                        <?= $country['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

</header>
