<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['sendname'];
    $phone = $_POST['sendphone'];

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
        $mail->Subject = 'Новый запрос на обратный звонок';
        $mail->Body    = '<b>Имя:</b> ' . $name . '<br><b>Телефон:</b> ' . $phone;

        $mail->send();
        echo 'success';
    } catch (Exception $e) {
        echo 'Ошибка: ', $mail->ErrorInfo;
    }
} else {
    echo 'Неправильный метод запроса';
}
?>
