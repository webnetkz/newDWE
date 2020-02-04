<?php
    session_start();
    
    if(!empty($_SESSION['tracking'])) {
        echo '<div class="modal">';
            echo '<img src="close.svg" alt="close icon" class="closeBtn">';
            echo '<p class="trackNumber">Трек номер: ' . $_SESSION['tracking'] . '</p>';
            unset($_SESSION['tracking']);
                echo '<p class="headModalLine">Дата отправки — </p> ';
                echo '<p>' . $_SESSION['datefrom'] . ';</p><br>';

            echo '<p class="headModalLine">Город отправки — </p> ';
            echo '<p>' . $_SESSION['townfrom'] . ';</p><br>';

            echo '<p class="headModalLine">Дата доставки — </p> ';
            echo '<p>' . $_SESSION['dateto'] . ';</p><br>';

            echo '<p class="headModalLine">Город доставки — </p> ';
            echo '<p>' . $_SESSION['townto'] . ';</p><br>';

            echo '<p class="headModalLine">Общий вес — </p> ';
            echo '<p>' . $_SESSION['mass'] . ' кг.;</p><br>';

            echo '<p class="headModalLine">Количество мест — </p> ';
            echo '<p>' . $_SESSION['mest'] . ' мест-a;</p><br>';

            echo '<p class="headModalLine">Статус — </p> ';
            echo '<p>' . $_SESSION['status'] . ';</p><br>';
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
                top: -120%;
                opacity: 0;
            }
            100% {
                top: 20%;
                opacity: 1;
            }
        }
        .modal {
            font-family: sans-serif;
            color: rgb(40, 40, 50);
            position: absolute;
            box-sizing: border-box;
            top: 20%;
            left: 15%;
            width: 70%;
            height: 65%;
            transition-duration: 500ms;
            border: 1px solid rgb(194, 194, 194);
            box-shadow: 0 0 10px rgb(0, 0, 0);
            border-radius: 10px;
            background-image: linear-gradient(rgb(255, 255, 240), rgb(5, 171, 255));
            padding: 2% 5%;
            animation: showModal 500ms linear;
        }
        .closeBtn {
            position: relative;
            float: right;
            height: 40px;
            transition-duration: 700ms;
            box-sizing: border-box;
        }
        .closeBtn:focus, .closeBtn:hover {
            cursor: pointer;
            box-shadow: 0 0 10px rgb(255, 255, 255);
            border-radius: 50%;
            border: 2px solid rgb(255, 255, 255);
        }
        .trackNumber {
            padding-left: 35%;
            padding-right: 35%;
            width: 100%;
            text-align: center;
            border-radius: 10px;    
            padding: 5px;
            box-shadow: 0 0 5px rgb(0, 0, 0);
            font-weight: 700;
            color: rgb(255, 255, 255);
            background-color: rgb(5, 171, 255);
            transition-duration: 500ms;
            font-size: 1em;
        }
        .trackNumber:hover {
            box-shadow: none;
            cursor: pointer;
            background-color: rgb(255, 255, 255);
            transform: scale(1.1);
            box-shadow: 0 0 10px rgb(255, 255, 255);
            color: rgb(40, 40, 50);
        }
        .headModalLine {
            display: inline;
            font-weight: 700;
        }
        .modal > p {
            display: inline-block;
            font-size: 0.8em;
            line-height: 0.8em;
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
        let closeBtn = document.querySelector('.closeBtn');
        closeBtn.addEventListener('click', () => {
            modal.style.top = '-120%';
        });
        console.log(modal);
    </script>
</body>
</html>