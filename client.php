<?php
if(isset($_POST['to_name'])){
$to_name = $_POST["to_name"];
$to_name = stripslashes($to_name);
$to_name = htmlspecialchars($to_name);
$to_name = trim($to_name);
}else{
$to_name = '';
}

if(isset($_POST['to_phone'])){
$to_phone = $_POST["to_phone"];
$to_phone = stripslashes($to_phone);
$to_phone = htmlspecialchars($to_phone);
$to_phone = trim($to_phone);
}else{
$to_phone = '';
}
if(isset($_POST['to_country'])){
$to_country = $_POST["to_country"];
$to_country = stripslashes($to_country);
$to_country = htmlspecialchars($to_country);
$to_country = trim($to_country);
}else{
$to_country = '';
}
if(isset($_POST['to_region'])){
$to_region = $_POST["to_region"];
$to_region = stripslashes($to_region);
$to_region = htmlspecialchars($to_region);
$to_region = trim($to_region);
}else{
$to_region = '';
}
if(isset($_POST['to_сity'])){
$to_сity = $_POST["to_сity"];
$to_сity = stripslashes($to_сity);
$to_сity = htmlspecialchars($to_сity);
$to_сity = trim($to_сity);
}else{
$to_сity = '';
}
if(isset($_POST['to_adr'])){
$to_adr = $_POST["to_adr"];
$to_adr = stripslashes($to_adr);
$to_adr = htmlspecialchars($to_adr);
$to_adr = trim($to_adr);
}else{
$to_adr = '';
}
if(isset($_POST['to_track'])){
$to_track = $_POST["to_track"];
$to_track = stripslashes($to_track);
$to_track = htmlspecialchars($to_track);
$to_track = trim($to_track);
}else{
$to_track = '';
}

if(isset($_POST['to_mail'])){
$to_mail = $_POST["to_mail"];
$to_mail = stripslashes($to_mail);
$to_mail = htmlspecialchars($to_mail);
$to_mail = trim($to_mail);
if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $to_mail)){
$to_mail = '';
}
}else{
$to_mail = '';
}

if(isset($_POST['from_name'])){
$from_name = $_POST["from_name"];
$from_name = stripslashes($from_name);
$from_name = htmlspecialchars($from_name);
$from_name = trim($from_name);
}else{
$from_name = '';
}

if(isset($_POST['from_phone'])){
$from_phone = $_POST["from_phone"];
$from_phone = stripslashes($from_phone);
$from_phone = htmlspecialchars($from_phone);
$from_phone = trim($from_phone);
}else{
$from_phone = '';
}
if(isset($_POST['from_country'])){
$from_country = $_POST["from_country"];
$from_country = stripslashes($from_country);
$from_country = htmlspecialchars($from_country);
$from_country = trim($from_country);
}else{
$from_country = '';
}
if(isset($_POST['from_сity'])){
$from_сity = $_POST["from_сity"];
$from_сity = stripslashes($from_сity);
$from_сity = htmlspecialchars($from_сity);
$from_сity = trim($from_сity);
}else{
$from_сity = '';
}
if(isset($_POST['from_adr'])){
$from_adr = $_POST["from_adr"];
$from_adr = stripslashes($from_adr);
$from_adr = htmlspecialchars($from_adr);
$from_adr = trim($from_adr);
}else{
$from_adr = '';
}

if(isset($_POST['from_mail'])){
$from_mail = $_POST["from_mail"];
$from_mail = stripslashes($from_mail);
$from_mail = htmlspecialchars($from_mail);
$from_mail = trim($from_mail);
if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $from_mail)){
$from_mail = '';
}
}else{
$from_mail = '';
}


if(isset($_POST['more'])){
$more = $_POST["more"];
$more = stripslashes($more);
$more = htmlspecialchars($more);
$more = trim($more);
}else{
$more = '';
}
if(isset($_POST['money'])){
$money = $_POST["money"];
$money = stripslashes($money);
$money = htmlspecialchars($money);
$money = trim($money);
}else{
$money = '';
}

if(isset($_POST['input-price'])){
$price = $_POST["input-price"];
$price = stripslashes($price);
$price = htmlspecialchars($price);
$price = trim($price);
}else{
$price = '';
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
$mail->FromName = 'dw.express';

$mail->addAddress('delivery@dealwd.com', 'dw.express'); // Add a recipient

//$mail->isHTML(TRUE);
$mail->CharSet = "UTF-8";
$mail->Subject = 'dw.express - Новое отправление на сайте';
$mail->Body = '
Откуда

ФИО: '.($from_name?$from_name:'Не указано').'
E-mail: '.($from_mail?$from_mail:'Не указан').'
Телефон: '.($from_phone?$from_phone:'Не указан').'
Страна: '.($from_country?$from_country:'Не указана').'
Город: '.($from_сity?$from_сity:'Не указан').'
Адрес: '.($from_adr?$from_adr:'Не указан').'


Куда

ФИО: '.($to_name?$to_name:'Не указано').'
E-mail: '.($to_mail?$to_mail:'Не указан').'
Телефон: '.($to_phone?$to_phone:'Не указан').'
Страна: '.($to_country?$to_country:'Не указана').'
Область: '.($to_region?$to_region:'Не указан').'
Город: '.($to_сity?$to_сity:'Не указан').'
Адрес: '.($to_adr?$to_adr:'Не указан').'
Номер Kuaidi: '.($to_track?$to_track:'Не указана').'


Примечания: '.($more?$more:'Не указано').'
Стоимость: '.($price?$price:'Не указано').'
Валюта: '.($money?$money:'Не указана').'
';

if(!$mail->send()){
echo 'Ошибка отправки письма.';
echo 'Mailer Error: '.$mail->ErrorInfo;
}else{
echo "<p>Спасибо, Ваша заявка принята, мы с Вами свяжемся в ближайшее время.</p>";
}
