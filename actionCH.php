<?php

if(isset($_POST['tel'])){
$tel = $_POST["tel"];
$tel = stripslashes($tel);
$tel = htmlspecialchars($tel);
$tel = trim($tel);
}else{
$tel = '';
}

if(isset($_POST['name'])){
$name = $_POST["name"];
$name = stripslashes($name);
$name = htmlspecialchars($name);
$name = trim($name);
}else{
$name = '';
}

if(isset($_POST['email'])){
$email = $_POST["email"];
$email = stripslashes($email);
$email = htmlspecialchars($email);
$email = trim($email);
if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $email)){
$email = '';
}
}else{
$email = '';
}

if(isset($_POST['quest-text'])){
$quest = $_POST["quest-text"];
$quest = stripslashes($quest);
$quest = htmlspecialchars($quest);
$quest = trim($quest);
}else{
$quest = '';
}

if(isset($_POST['info'])){
$info = $_POST["info"];
$info = stripslashes($info);
$info = htmlspecialchars($info);
$info = trim($info);
}else{
$info = '';
}

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
//$mail->SMTPDebug = 3; // Enable verbose debug output
$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru'; // Specify main and backup SMTP servers
$mail->SMTPAuth = TRUE; // Enable SMTP authentication
$mail->Username = 'mailer@dealwd.com'; // SMTP username
$mail->Password = 'Qazwsx321'; // SMTP password
$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to
$mail->From = 'mailer@dealwd.com';
if ($email) $mail->addReplyTo($email, $name);
$mail->FromName = 'ems.dealwd.com';

$mail->addAddress('delivery@dealwd.com', 'ems.dealwd.com'); // Add a recipient
$mail->addBCC('one-page.kz@mail.ru', 'one-page.kz'); // Add a recipient

//$mail->isHTML(TRUE);
$mail->CharSet = "UTF-8";
$mail->Subject = 'ems.dealwd.com - 網站上的新應用程序';
$mail->Body = '
電話號碼: '.($tel?$tel:'Не указан').'
名: '.(($name AND $name != 'Ваше имя')?$name:'Не указано').'
E-mail: '.($email?$email:'Не указан').'

你的問題: '.($quest?$quest:'Не указана').'

信息: '.($info?$info:'Не указана').'
';

if(!$mail->send()){
echo '发送消息时出错.';
echo 'Mailer Error: '.$mail->ErrorInfo;
}else{
echo "<p>謝謝，您的申請已被接受，我們會盡快回复您。</p>";
}