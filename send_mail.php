<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $introname = $_POST['introname'];
    $introphone = $_POST['introphone'];
    $introcomment = $_POST['introcomment'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = '@gmail.com';
        $mail->Password = 'password'; 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Port = 465;      

        $mail->setFrom('your-email@gmail.com', 'Your Website');
        $mail->addAddress('recipient@gmail.com');

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
