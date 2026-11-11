<?php
(function () {
    $path = __DIR__ . '/.env';
    if (!is_readable($path)) return;
    foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        [$k, $v] = explode('=', $line, 2);
        $_ENV[trim($k)] = trim($v);
    }
})();

define('SMTP_HOST',        $_ENV['SMTP_HOST']        ?? '');
define('SMTP_PORT',   (int)($_ENV['SMTP_PORT']        ?? 465));
define('SMTP_ENC',         $_ENV['SMTP_ENC']          ?? 'ssl');
define('SMTP_USER',        $_ENV['SMTP_USER']         ?? '');
define('SMTP_PASS',        $_ENV['SMTP_PASS']         ?? '');
define('MAIL_TO',          $_ENV['MAIL_TO']           ?? '');
define('TURNSTILE_SECRET', $_ENV['TURNSTILE_SECRET']  ?? '');
