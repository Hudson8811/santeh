<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['discussname'];
    $phone = $_POST['discussphone'];
    $comment = $_POST['discusscomment'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.yandex.ru'; 
		$mail->CharSet = "UTF-8";
        $mail->SMTPAuth = true;
        $mail->Username = 'mail@mail.ru';
        $mail->Password = 'password'; 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Port = 465;      

        $mail->setFrom('mail@mail.ru', 'Your Website'); 
        $mail->addAddress('mail@mail.ru');

        $mail->isHTML(true);
        $mail->Subject = 'Новая заявка на обсуждение';
        $mail->Body    = '<b>Имя:</b> ' . $name . '<br><b>Телефон:</b> ' . $phone . '<br><b>Комментарий:</b> ' . $comment;

        $mail->send();
        echo 'success';
    } catch (Exception $e) {
        echo 'Ошибка: ', $mail->ErrorInfo;
    }
} else {
    echo 'Неправильный метод запроса';
}
?>
