<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);






/* $mail->isSMTP();
$mail->Host = 'smtp.mail.ru';
$mail->SMTPAuth = true;
$mail->Username = 'up.stroke-clients@mail.ru';
$mail->Password = 'TaskAzim2022';
$mail->SMTPSecure = 'ssl';
$mail->Port = '465';
*/


/* $mail->isSMTP();
$mail->Host = 'mail.hosting.reg.ru';
$mail->SMTPAuth = true;
$mail->Username = 'send@dar.com';
$mail->Password = 'U6wTOZFHwmso005R';
$mail->SMTPSecure = 'ssl';
$mail->Port = '465'; */


/* $mail->isSMTP();
$mail->Host = 'da1.v.fozzy.com';
$mail->SMTPAuth = true;
$mail->Username = 'bekmirzo2@bekmirzo.com';
$mail->Password = '${8#O9gKeh';
$mail->SMTPSecure = 'ssl';
$mail->Port = '465'; */


// $mail->setFrom('bekmirzo2@bekmirzo.com', 'Посетитель сайта');
$mail->setFrom('send@dar.com', 'Посетитель сайта');
// $mail->addAddress('up.stroke-clients@mail.ru');
// $mail->addAddress('up.stroke-clients@mail.ru');
$mail->addAddress('dzen.me@mail.ru');
// $mail->addAddress('bekmirzo@bekmirzo.com');
// $mail->addAddress('azimovbekmirzo0@gmail.com');

$mail->Subject = 'Письмо от посетителя сайта';

$body = '<h1>Письмо от посетителя сайта!</h1>';

if (trim(!empty($_POST['name']))) {
	$body .= '<p><strong>Имя:</strong> ' . $_POST['name'] . '</p>';
} else {
	$message = 'Ошибка';
	$response = ['message' => $message];
	header('Content-type: application/json');
	echo json_encode($response);
	exit;
}
if (trim(!empty($_POST['email']))) {
	$body .= '<p><strong>E-mail:</strong> ' . $_POST['email'] . '</p>';
}
// else {
// 	$message = 'Ошибrf';
// 	$response = ['message' => $message];
// 	header('Content-type: application/json');
// 	echo json_encode($response);
// 	exit;
// }
if (trim(!empty($_POST['tel']))) {
	$body .= '<p><strong>Номер:</strong> ' . $_POST['tel'] . '</p>';
}
// if (trim(!empty($_POST['selectServ']))) {
// 	$body .= '<p><strong>Услуга(и):</strong> ' . $_POST['selectServ'] . '</p>';
// 	// foreach ($_POST['selectServ'] as $selectedOption) {
// 	// 	// $body.= $selectedOption;
// 	// 	$body.= 'dsads';
// 	// }
// }

// $values = $_POST['ary'];

if (!empty($_POST['selectServ'][0])) {
	$body .= '<p><strong>Услуга(и):</strong>' . implode(', ', $_POST['selectServ']) . '</p>';
}
if (trim(!empty($_POST['text']))) {
	$body .= '<p><strong>Текст:</strong> ' . $_POST['text'] . '</p>';
}

// if (!empty($_FILES['file']['tmp_name'])) {
// 	//путь загрузки файла
// 	$filePath = __DIR__ . "/tempfiles/" . $_FILES['file']['name'];
// 	// $filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['file']['name'];
// 	//грузим файл
// 	if (copy($_FILES['file']['tmp_name'], $filePath)) {
// 		$fileAttach = $filePath;
// 		$body .= '<p><strong>Файл в приложении</strong>';
// 		$mail->addAttachment($fileAttach);
// 	}
// }

$mail->Body = $body;

if (!$mail->send()) {
	$message = 'Ошибка';
} else {
	$message = 'Данные отправлены!';
}

$response = ['message' => $_POST];

header('Content-type: application/json');
echo json_encode($response);
