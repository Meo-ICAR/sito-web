<?php
/**
 * Carica SMTP_USER / SMTP_PASS da variabili d'ambiente o da .env locale.
 * Il file .env non va pubblicato in chiaro e resta fuori dal repository.
 */
function unico_load_dotenv(string $path): void
{
    if (!is_readable($path)) {
        return;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return;
    }

    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#' || strpos($line, '=') === false) {
            continue;
        }

        [$name, $value] = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        if ($value !== '' && ($value[0] === '"' || $value[0] === "'")) {
            $value = trim($value, "\"'");
        }

        if ($name === '') {
            continue;
        }

        $existing = getenv($name);
        if ($existing === false || $existing === '') {
            putenv($name . '=' . $value);
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}

unico_load_dotenv(__DIR__ . DIRECTORY_SEPARATOR . '.env');

$smtp_host = getenv('SMTP_HOST') ?: 'ssl0.ovh.net';
$smtp_port = (int) (getenv('SMTP_PORT') ?: 465);
$smtp_user = getenv('SMTP_USER') ?: '';
$smtp_pass = getenv('SMTP_PASS') ?: '';
$smtp_admin = getenv('SMTP_ADMIN') ?: 'info@hassisto.com';
