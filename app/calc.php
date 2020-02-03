<?php

// Отображение ошибок при отладке
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Если кнопка запроса нажата
if( !empty($_POST['sendCalc']) ) {
    if( !empty($_POST['townfrom']) && !empty($_POST['townto']) && !empty($_POST['mass'])) {
        
        // Обязательные значения для расчета калькулятора
        $townfrom = htmlspecialchars($_POST['townfrom']);
        $townfrom = trim($townfrom);

        $townto = htmlspecialchars($_POST['townto']);
        $townto = trim($townto);

        $mass = htmlspecialchars($_POST['mass']);
        $mass = trim($mass);

        $service = htmlspecialchars($_POST['service']);
        $service = trim($service);

    } else {
        $townfrom = 1;
        $townto = 1;
        $mass = 1;
        $service = 1;
    }

    // Необязательные значение расчетов калькулятора
    if( !empty($_POST['lenght']) && !empty($_POST['width']) && !empty($_POST['height'])) {

        $lenght = htmlspecialchars($_POST['lenght']);
        $lenght = trim($lenght);
        
        $width = htmlspecialchars($_POST['width']);
        $width = trim($width);
        
        $height = htmlspecialchars($_POST['height']);
        $height = trim($height);

    } else {
        $lenght = 1;
        $width = 1;
        $height = 1;
    }
}

// Настройка запроса на сервер
$url = curl_init('https://home.courierexe.ru/api/');
curl_setopt($url, CURLOPT_POST, 1);
curl_setopt($url, CURLOPT_RETURNTRANSFER, 1);

// Генерация XML запроса на сервер
$request = '<?xml version="1.0" encoding="UTF-8" ?>';
$request .= '<calculator>';
$request .= '  <auth extra="290"/>';
$request .= '  <calc townfrom="'.$townfrom.'" townto="'.$townto.'" l="'.$lenght.'" w="'.$width.'" h="'.$height.'" mass="'.$mass.'" service="'.$service.'" />';
$request .= '</calculator>';

// Настройка заголовков и отправка сообщения
curl_setopt($url, CURLOPT_HTTPHEADER, 
        array('Content-Type: text/xml; charset=utf-8', 
              'Content-Length: '.strlen($request)));

curl_setopt($url, CURLOPT_POSTFIELDS, $request);

// Получение ответа в виде XML
$response = curl_exec($url);

//var_dump($response);

$xml = simplexml_load_string($response);

// Проверка на верность работы калькулятора
if(!empty($xml->calc)) {
    echo '<pre><hr>';
    echo '<b>Город отправки:</b> ' . $xml->calc->townfrom . '<br>';
    echo '<b>Город прибытия:</b> ' . $xml->calc->townto . '<br>';
    echo '<hr>';
    echo '<b>Масса кг.:</b> ' . $xml->calc->mass . '<br>';
    echo '<b>Общаяя стоимость:</b> ' . $xml->calc->price . '$<br>';
    echo '<hr>';
    echo '<b>Мин. дней доставки:</b> ' . $xml->calc->mindeliverydays . '<br>';
    echo '<b>Макс. дней доставки:</b> ' . $xml->calc->maxdeliverydays . '<br>';
    echo '<hr>';
    var_dump($xml);
} else {
    echo 'Введите данные корректно!';
}



// Завершения соединения через CURL
curl_close($url);

