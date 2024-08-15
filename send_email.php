<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // E-posta ayarları
    $to = "your-email@example.com"; // Buraya kendi e-posta adresinizi yazın
    $subject = "Yeni İletişim Formu Mesajı";
    $headers = "From: " . $email . "\r\n" .
    "Reply-To: " . $email . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

    // Mesajın gövdesi
    $mailBody = "Ad: $name\nE-posta: $email\n\nMesaj:\n$message";

    // E-posta gönderimi
    if (mail($to, $subject, $mailBody, $headers)) {
        echo "<p>Mesajınız başarıyla gönderildi.</p>";
    } else {
        echo "<p>Mesaj gönderilirken bir hata oluştu. Lütfen tekrar deneyin.</p>";
    }
} else {
    echo "<p>Geçersiz istek.</p>";
}
?>
