<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Убедись, что PHPMailer загружен

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $introname = $_POST['introname'];
    $introphone = $_POST['introphone'];
    $introcomment = $_POST['introcomment'];

    // Настраиваем PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Настройки сервера
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP-сервер
        $mail->SMTPAuth = true;
        $mail->Username = '@gmail.com'; // SMTP-логин
        $mail->Password = 'password';   // SMTP-пароль
        $mail->SMTPSecure = 'ssl';  // Шифрование
        $mail->Port = 465;          // Порт

        // Отправитель и получатель
        $mail->setFrom('your-email@gmail.com', 'Your Website');
        $mail->addAddress('recipient@gmail.com'); // Адрес получателя

        // Содержание письма
        $mail->isHTML(true);
        $mail->Subject = 'Новая заявка с сайта';
        $mail->Body    = '<b>Имя:</b> ' . $introname . '<br><b>Телефон:</b> ' . $introphone . '<br><b>Комментарий:</b> ' . $introcomment;

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
