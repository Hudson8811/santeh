<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['sendname'];
    $phone = $_POST['sendphone'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com';
        $mail->Password = 'your-email-password';  
        $mail->SMTPSecure = 'ssl'; 
        $mail->Port = 465;     

        $mail->setFrom('your-email@gmail.com', 'Your Website');
        $mail->addAddress('recipient@gmail.com'); 

        $mail->isHTML(true);
        $mail->Subject = 'Новый запрос на обратный звонок';
        $mail->Body    = '<b>Имя:</b> ' . $sendname . '<br><b>Телефон:</b> ' . $sendphone;

        $mail->send();
        echo 'success';
    } catch (Exception $e) {
        echo 'Ошибка: ', $mail->ErrorInfo;
    }
} else {
    echo 'Неправильный метод запроса';
}
?>
