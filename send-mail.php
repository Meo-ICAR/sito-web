<?php
require __DIR__ . '/smtp-config.php';

$redirect_to = 'grazie.html';

function invia_email_smtp($to, $subject, $body_html, $reply_to = null)
{
    global $smtp_host, $smtp_port, $smtp_user, $smtp_pass;

    if (!is_string($smtp_user) || $smtp_user === '' || !is_string($smtp_pass) || $smtp_pass === '') {
        return false;
    }

    $socket = @fsockopen('ssl://' . $smtp_host, $smtp_port, $errno, $errstr, 15);
    if (!$socket) {
        return false;
    }

    $getResponse = function () use ($socket) {
        $response = '';
        while ($line = fgets($socket, 515)) {
            $response .= $line;
            if (substr($line, 3, 1) == ' ') {
                break;
            }
        }
        return $response;
    };

    $sendCommand = function ($cmd) use ($socket, $getResponse) {
        fputs($socket, $cmd . "\r\n");
        return $getResponse();
    };

    $getResponse();
    $sendCommand('EHLO ' . gethostname());
    $sendCommand('AUTH LOGIN');
    $sendCommand(base64_encode($smtp_user));
    $sendCommand(base64_encode($smtp_pass));
    $sendCommand('MAIL FROM: <' . $smtp_user . '>');
    $sendCommand('RCPT TO: <' . $to . '>');
    $sendCommand('DATA');

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= 'From: Suite UNICO <' . $smtp_user . ">\r\n";
    $headers .= 'To: <' . $to . ">\r\n";
    if ($reply_to) {
        $headers .= 'Reply-To: ' . $reply_to . "\r\n";
    }
    $headers .= 'Subject: =?UTF-8?B?' . base64_encode($subject) . "?=\r\n";

    $message = $headers . "\r\n" . $body_html . "\r\n.";
    $sendCommand($message);
    $sendCommand('QUIT');
    fclose($socket);

    return true;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contatti.html');
    exit;
}

if (!empty($_POST['website'])) {
    header('Location: ' . $redirect_to);
    exit;
}

$nome      = isset($_POST['nome']) ? htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8') : '';
$email     = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) : false;
$telefono  = isset($_POST['telefono']) ? htmlspecialchars(trim($_POST['telefono']), ENT_QUOTES, 'UTF-8') : '';
$azienda   = isset($_POST['azienda']) ? htmlspecialchars(trim($_POST['azienda']), ENT_QUOTES, 'UTF-8') : '';
$messaggio = isset($_POST['messaggio']) ? nl2br(htmlspecialchars(trim($_POST['messaggio']), ENT_QUOTES, 'UTF-8')) : '';

if ($nome === '' || !$email || $telefono === '' || $azienda === '' || $messaggio === '') {
    header('Location: contatti.html?error=campi_incompleti');
    exit;
}

$subject_admin = '[Suite UNICO] Contatto dal sito - ' . $azienda;
$body_admin = "
<html><body style='font-family: Arial, sans-serif; color: #333;'>
<h2>Nuovo messaggio dal form Contatti</h2>
<p><strong>Nome:</strong> $nome</p>
<p><strong>Email:</strong> <a href='mailto:$email'>$email</a></p>
<p><strong>Telefono:</strong> $telefono</p>
<p><strong>Azienda:</strong> $azienda</p>
<p><strong>Messaggio:</strong><br>$messaggio</p>
</body></html>";

invia_email_smtp($smtp_admin, $subject_admin, $body_admin, $email);

$subject_user = 'Abbiamo ricevuto il tuo messaggio - Suite UNICO';
$body_user = "
<html><body style='font-family: Arial, sans-serif; color: #333;'>
<h2>Gentile $nome,</h2>
<p>Grazie per averci contattato. Abbiamo ricevuto la tua richiesta e ti risponderemo al più presto.</p>
<p style='font-size: 0.85rem; color: #666;'>Hassisto S.r.l. — <a href='https://unicocompilance.it'>unicocompilance.it</a></p>
</body></html>";

invia_email_smtp($email, $subject_user, $body_user, $smtp_admin);

header('Location: ' . $redirect_to);
exit;
