<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/Users/berat/OneDrive/Masaüstü/CVwebsite/PHPMailer-master/Exception.php';
require 'C:/Users/berat/OneDrive/Masaüstü/CVwebsite/PHPMailer-master/PHPMailer.php';
require 'C:/Users/berat/OneDrive/Masaüstü/CVwebsite/PHPMailer-master/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $summary = htmlspecialchars($_POST['summary']);

    $mail = new PHPMailer(true);
    try {
        // Sunucu ayarları
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP sunucusu
        $mail->SMTPAuth = true;
        $mail->Username = 'beratbaylan123@gmail.com'; // SMTP kullanıcı adı
        $mail->Password = 'bERAT...4032'; // SMTP şifresi (Uygulama şifresi kullanmalısınız)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Genellikle 587 kullanılır

        // Alıcı ve gönderici ayarları
        $mail->setFrom('beratbaylan123@gmail.com', 'Web Formu'); // Gerçek gönderici e-posta adresi
        $mail->addAddress('beratbaylan123@gmail.com', 'Berat Baylan'); // Alıcı e-posta adresi

        // İçerik
        $mail->isHTML(true); // HTML e-posta
        $mail->Subject = 'Yeni iletişim formu gönderimi';
        $mail->Body = "<p>Ad: $name</p><p>Soyad: $surname</p><p>Özet: $summary</p>";

        $mail->send();
        echo 'Mesajınız başarıyla gönderildi.';
    } catch (Exception $e) {
        echo "Mesaj gönderilirken bir hata oluştu: {$mail->ErrorInfo}";
    }
} else {
    echo "Geçersiz istek.";
}
?>
