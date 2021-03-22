<?php
$decodedData = json_decode(file_get_contents('php://input'), true);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');

$mail = new PHPMailer(true);

$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', '../local/templates/snt/phpMailer/language/');


$mail->isSMTP();
$mail->Host = 'smtp.mail.ru';
$mail->SMTPAuth = true;
$mail->Username = 'sntsunny@mail.ru';                                             /*Заполнить*/
$mail->Password = '**';                                                           /*Заполнить*/
$mail->SMTPSecure = 'ssl';
$mail->Port = '465';


$mail->setFrom('sntsunny@mail.ru', 'Обращение в правление');
$mail->addAddress('snt.solnechnyi-92@mail.ru');
$mail->IsHTML(true);


$mail->Subject = $decodedData['theme'];
$body = '';
if (trim(!empty($decodedData['name']))) {
    $body = '<p>ФИО:' . $decodedData['name'] . '</p>';
}
if (trim(!empty($decodedData['email']))) {
    $body .= '<p>E-mail:' . $decodedData['name'] . '</p>';
}
if (trim(!empty($decodedData['telNum']))) {
    $body .= '<p>Телефон:' . $decodedData['telNum'] . '</p>';
}
if (trim(!empty($decodedData['message']))) {
    $body .= '<p>Сообщение:' . $decodedData['message'] . '</p>';
}

$mail->Body = $body;

if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Ваше сообщение отправлено отправлены';
}

$response = ['message' => $message];

header('Content-Type: application/json');
echo json_encode($response)
?>
