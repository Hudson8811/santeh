<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $introname = $_POST['introname'];
    $introphone = $_POST['introphone'];
    $introcomment = $_POST['introcomment'];

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
        $mail->Subject = 'Новая заявка с сайта';
        $mail->Body    = '<b>Имя:</b> ' . $introname . '<br><b>Телефон:</b> ' . $introphone . '<br><b>Комментарий:</b> ' . $introcomment;

        $mail->send();
        echo 'success';
    } catch (Exception $e) {
        echo 'Ошибка: ', $mail->ErrorInfo;
    }
} else {
    echo 'Неправильный метод запроса';
}
?>
