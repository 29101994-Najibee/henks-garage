<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Definieer variabelen voor de ontvanger, onderwerp en bericht
    $to = 'klant@example.com'; // Vervang dit met het e-mailadres van de klant
    $subject = "Bevestiging van afspraak bij Henk's Autogarage";
    $message = "Beste klant,\n\nDit is een bevestiging van uw afspraak bij Henk's Autogarage.\n\nDatum afspraak: " . $AppointmentDate . "\nType aanvraag: " . $Problem . "\nKilometerstand: " . $Mileage . "\nOpmerkingen: " . $Notes . "\n\nMet vriendelijke groet,\nHenk's Autogarage";

    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'localhost'; // Gebruik de lokale MailHog SMTP-server
    $mail->SMTPAuth   = false; // Geen authenticatie nodig voor MailHog
    $mail->Port       = 1025; // Standaard poort voor MailHog

    // Recipients
    $mail->setFrom('from@example.com', 'Henk\'s Autogarage');
    $mail->addAddress($to);

    // Content
    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body    = $message;

    if ($mail->send()) {
        echo 'E-mail is verzonden!';
    } else {
        echo 'E-mail kon niet worden verzonden.';
    }
} catch (Exception $e) {
    echo "E-mail kon niet worden verzonden. Mailer Error: {$mail->ErrorInfo}";
}
?>
