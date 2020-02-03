<?php
    session_start();
    
    if(!empty($_SESSION['order'])) {
        echo '<div class="modal">';
            echo $_SESSION['order'];
        echo '</div>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @keyframes showModal {
            0% {
                left: -100%;
            }
            100% {
                left: 15%;
            }
        }
        .modal {
            position: absolute;
            top: 20%;
            left: 15%;
            width: 70%;
            height: 60%;
            border: 3px solid black;
            background-color: white;
            padding: 2em 2em;
            animation: showModal 1s linear;
        }
    </style>
</head>
<body>
    <form action="../app/tracking.php" method="POST">
        <input type="text" name="numberTracking" placeholder="Трек номер">
        <input type="submit" name="sendTracking" value="Запросить">
    </form>
    <br>
    <hr>
    <br>
    <form action="../app/calc.php" method="POST">
        <p>
            <input type="text" name="townfrom" placeholder="Город отправитель">*
        </p>
        <p>
            <input type="text" name="townto" placeholder="Город получатель">*
        </p>
        <p>
            <input type="text" name="mass" placeholder="Масса в кг">*
        </p>
        <p>
            <input type="text" name="length" placeholder="Длинна в см">
        </p>
        <p>
            <input type="text" name="weight" placeholder="Ширина в см">
        </p>
        <p>
            <input type="text" name="height" placeholder="Высота в см">
        </p>
        <p>
            <input type="text" name="service" placeholder="Режим доставки">*
        </p>
        <input type="submit" name="sendCalc" value="Посчитать">
    </form>

    <script>
        let modal = document.querySelector('.modal');
        
        console.log(modal);
    </script>
</body>
</html>