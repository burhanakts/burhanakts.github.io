<?php
// PHP Mailler dosyaları
use PHPMailer\PHPMailer\PHPMailer; #1
use PHPMailer\PHPMailer\Exception; #2
require 'phpmailer/src/Exception.php'; #3
require 'phpmailer/src/PHPMailer.php'; #4
require 'phpmailer/src/SMTP.php'; #5 

if ($_POST['mailGonder']) {
	$mail = new PHPMailer(true);
	$mail -> CharSet = 'utf-8';
	$mail->SMTPDebug = 0;
	$mail->isSMTP();
	$mail->Host = 'burhanaktas.com'; //Host adını girin(ör: burhanaktas.com)
	$mail->Username = 'info@burhanaktas.com'; // mail adresinizi girin(ör: info@burhanaktas.com)
	$mail->Password = 'B.aktas631491'; //Mail adresinizin şifresini girin(ör:şifre123)
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls"; // SMTP güvenliği ssl & tls (default olarak tls kalsın)
	$mail->Port = 587; // Host sağlayıcınızın önerdiği port numarasını girin - 587 & 465

	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	$mail->setFrom($mail->Username,'Web Sitenden Mail');
	$mail->addAddress("aktasburhan@outlook.com");
	$mail->isHTML(true);
	$mail->Subject = $_POST['konu'];
	$mail->Body = "Konu: {$_POST['konu']} <br> İsim Soyisim: {$_POST['isim']}<br>Mail: {$_POST['mailadresi']}<br>Telefon: {$_POST['telefon']}<br><br>İçerik: {$_POST['ileti']}";
	if ($mail -> send()) {
		echo "ok";
	}else{
		echo "hata";
	}
}

?>