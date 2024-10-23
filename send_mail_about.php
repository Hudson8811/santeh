<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Убедись, что PHPMailer загружен

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $name = $_POST['aboutname'];
    $phone = $_POST['aboutphone'];
    $comment = $_POST['aboutcomment'];

    // Настраиваем PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Настройки сервера
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP-сервер
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com'; // SMTP-логин
        $mail->Password = 'your-email-password';   // SMTP-пароль
        $mail->SMTPSecure = 'ssl';  // Шифрование
        $mail->Port = 465;          // Порт

        // Отправитель и получатель
        $mail->setFrom('your-email@gmail.com', 'Your Website');
        $mail->addAddress('recipient@gmail.com'); // Адрес получателя

        // Содержание письма
        $mail->isHTML(true);
        $mail->Subject = 'Новая заявка с сайта';
        $mail->Body    = '<b>Имя:</b> ' . $aboutname . '<br><b>Телефон:</b> ' . $aboutphone . '<br><b>Комментарий:</b> ' . $aboutcomment;

        // Отправляем письмо
        $mail->send();
        echo 'success';
    } catch (Exception $e) {
        echo 'Ошибка: ', $mail->ErrorInfo;
    }
} else {
    echo 'Неправильный метод запроса';
}
?>
