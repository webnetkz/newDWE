<?php
session_start();
// Отображение ошибок при отладке
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Если кнопка запроса нажата
if( !empty($_POST['sendTracking']) ) {
    // Если значение трек номера заполнено
    if( !empty($_POST['numberTracking'])) {
        $tracking = htmlspecialchars($_POST['numberTracking']);
        $tracking = trim($tracking);
    } else {
        $tracking = null;
    }
}

// Настройка запроса на сервер
$url = curl_init('https://home.courierexe.ru/api/');
curl_setopt($url, CURLOPT_POST, 1);
curl_setopt($url, CURLOPT_RETURNTRANSFER, 1);

// Генерация XML запроса на сервер
$request = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<tracking>
  <extra>290</extra>
  <orderno>$tracking</orderno>
</tracking>
XML;

// Настройка заголовков и отправка сообщения
curl_setopt($url, CURLOPT_HTTPHEADER, 
        array('Content-Type: text/xml; charset=utf-8', 
              'Content-Length: '.strlen($request)));

curl_setopt($url, CURLOPT_POSTFIELDS, $request);

// Получение ответа в виде XML
$response = curl_exec($url);

$xml = simplexml_load_string($response);
if(!empty($xml->order)) {
    $_SESSION['tracking'] = (string)$xml->order['orderno'];
    $_SESSION['datefrom'] = (string)$xml->order->sender->date;
    $_SESSION['townfrom'] = (string)$xml->order->sender->town;
    $_SESSION['dateto'] = (string)$xml->order->receiver->town;
    $_SESSION['townto'] = (string)$xml->order->receiver->town;
    $_SESSION['mass'] = (string)$xml->order->weight;
    $_SESSION['mest'] = (string)$xml->order->quantity;
    $_SESSION['status'] = (string)$xml->order->status;
}
header('Location: ../tests/index.php');
/*
// Проверка на существующию посылку
if(!empty($xml->order)) {
    echo '<pre><hr>';
    echo '<b>Трек номер:</b> ' . $xml->order['orderno'] . '<br>';
    echo '<hr>';
    echo '<b>Дата отправки:</b> ' . $xml->order->sender->date . '<br>';
    echo '<b>Город отправки:</b> ' . $xml->order->sender->town . '<br>';
    echo '<hr>';
    echo '<b>Дата отправки:</b> ' . $xml->order->receiver->date . '<br>';
    echo '<b>Город прибытия:</b> ' . $xml->order->receiver->town . '<br>';
    echo '<b>Вес посылки:</b> ' . $xml->order->weight . ' кг.<br>';
    echo '<b>Мест в посылке:</b> ' . $xml->order->quantity . '<br>';
    echo '<b>Нахождение:</b> ' . $xml->order->status . '<br>';
    echo '<b>Кем создан:</b> ' . $xml->order->status['eventstore'] . '<br>';
    echo '<b>Время создания:</b> ' . $xml->order->status['eventtime'] . '<br>';
    echo '<b>Заголовок статуса:</b> ' . $xml->order->status['title'] . '<br>';
    echo '<hr>';
    var_dump($xml);
} else {
    echo 'Такого трек номера не существует!';
}
*/


// Завершения соединения через CURL
curl_close($url);

