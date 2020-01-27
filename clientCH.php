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
$mail->addBCC('jawkz@yandex.kz', 'one-page.kz'); // Add a recipient

//$mail->isHTML(TRUE);
$mail->CharSet = "UTF-8";
$mail->Subject = 'ems.dealwd.com - 在网站上发布新内容';
$mail->Body = '
从那里<br>
全名: '.($from_name?$from_name:'未指定').'
E-mail: '.($from_mail?$from_mail:'未指定').'
电话号码: '.($from_phone?$from_phone:'未指定').'
国家: '.($from_country?$from_country:'未指定').'
城市: '.($from_сity?$from_сity:'未指定').'
地址: '.($from_adr?$from_adr:'未指定').'
<br><br>
Куда<br>
全名: '.($to_name?$to_name:'未指定').'
E-mail: '.($to_mail?$to_mail:'未指定').'
电话号码: '.($to_phone?$to_phone:'未指定').'
国家: '.($to_country?$to_country:'未指定').'
区域: '.($to_region?$to_region:'未指定').'
城市: '.($to_сity?$to_сity:'未指定').'
地址: '.($to_adr?$to_adr:'未指定').'
快车间: '.($to_track?$to_track:'未指定').'
<br><br>
笔记: '.($more?$more:'未指定').'
货币: '.($money?$money:'未指定').'
';

if(!$mail->send()){
echo '发送消息时出错.';
echo 'Mailer Error: '.$mail->ErrorInfo;
}else{
echo "<p>謝謝，您的申請已被接受，我們會盡快回复您。</p>";
}