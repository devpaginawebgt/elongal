<?php
if (session_status() === PHP_SESSION_NONE) session_start();
header('Content-Type: application/json');

require __DIR__ . '/config.php';

function log_contact_error(string $context, string $message): void {
    $entry = sprintf(
        "[%s] [%s] [%s] %s\n",
        date('Y-m-d H:i:s'),
        $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        $context,
        $message
    );
    file_put_contents(__DIR__ . '/contact-errors.log', $entry, FILE_APPEND | LOCK_EX);
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/lib/phpmailer/Exception.php';
require __DIR__ . '/lib/phpmailer/PHPMailer.php';
require __DIR__ . '/lib/phpmailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit(json_encode(['ok' => false, 'error' => 'Método no permitido']));
}

// ── Verificar Turnstile ───────────────────────────────────────
$token = $_POST['cf-turnstile-response'] ?? '';

if (!$token) {
    http_response_code(400);
    exit(json_encode(['ok' => false, 'error' => 'Por favor completa la verificación de seguridad.']));
}

$verify = file_get_contents(
    'https://challenges.cloudflare.com/turnstile/v0/siteverify',
    false,
    stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => http_build_query([
            'secret'   => TURNSTILE_SECRET,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
        ]),
    ]])
);

if ($verify === false) {
    log_contact_error('turnstile', 'file_get_contents falló al contactar la API de Cloudflare');
    http_response_code(500);
    exit(json_encode(['ok' => false, 'error' => 'No se pudo verificar el captcha. Intenta de nuevo.']));
}

$cf = json_decode($verify, true);

if (!($cf['success'] ?? false)) {
    $codes = implode(', ', $cf['error-codes'] ?? []);
    log_contact_error('turnstile', "Verificación fallida. Códigos: $codes");
    http_response_code(400);
    exit(json_encode(['ok' => false, 'error' => 'Verificación de seguridad fallida. Intenta de nuevo.']));
}

// ── Sanitizar campos ─────────────────────────────────────────
$name    = htmlspecialchars(trim($_POST['name']    ?? ''), ENT_QUOTES, 'UTF-8');
$email   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$country = htmlspecialchars(trim($_POST['country'] ?? ''), ENT_QUOTES, 'UTF-8');
$reason  = htmlspecialchars(trim($_POST['reason']  ?? ''), ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars(trim($_POST['message'] ?? ''), ENT_QUOTES, 'UTF-8');

if (!$name || !$email || !$message || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit(json_encode(['ok' => false, 'error' => 'Datos del formulario incompletos o inválidos.']));
}

// ── Enviar correo ─────────────────────────────────────────────
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    $mail->SMTPSecure = SMTP_ENC;
    $mail->Port       = SMTP_PORT;
    $mail->CharSet    = 'UTF-8';

    $mail->setFrom(SMTP_USER, 'Elongal — Formulario de contacto');
    $mail->addAddress(MAIL_TO);
    $mail->addReplyTo($email, $name);

    $mail->Subject = "Consulta de $name — Elongal";
    $mail->Body    = implode("\n", [
        "Nombre:  $name",
        "Correo:  $email",
        "País:    $country",
        "Motivo:  $reason",
        "",
        $message,
    ]);

    $mail->send();
    echo json_encode(['ok' => true]);

} catch (Exception $e) {
    log_contact_error('smtp', $mail->ErrorInfo ?: $e->getMessage());
    http_response_code(500);
    exit(json_encode(['ok' => false, 'error' => 'No se pudo enviar el mensaje. Intenta de nuevo más tarde.']));
}
