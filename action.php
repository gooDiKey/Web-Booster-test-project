<?php
    class Card { // Класс карточек товара

        function __construct($card_image, $card_title, $card_price) {
            $this->card_image = $card_image;
            $this->card_title = $card_title;
            $this->card_price = $card_price;
        }

        function render() { // Функция возвращает готовую HTML стуктуру
            $card = "
                <div class='card'>
                    <img src='$this->card_image' alt='' id='card-image' class='card-item'>
                    <p id='card-title' class='card-item'>$this->card_title</p>
                    <p id='card-price' class='card-item'>$this->card_price</p>
                    <p id='card-btn' class='card-item' onclick='openForm()'>Купить</p>
                </div>
            "; 
            return $card;
        }
    }
    $str = file_get_contents('product.json');
    $arr = json_decode($str, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBBOOSTER</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cards">
        <?php 
            foreach($arr['product'] as $value){ // Перебор массива полученного из JSON и отрисовка карточек
                $card = new Card($value['img'], $value['name'], $value['price']);
                echo $card->render();
            }
        ?>
    </div>

    <div class="buy">
        <form action="" class="buy-form">
            <h2 class="buy-form__item">Оформление заказа</h2>
            <table class="buy-form__item">
                <tr>
                    <td><label for="name" class="m1">Имя: </label></td>
                    <td><input type="text" id="name" class="m1"></td>
                </tr>
                <tr>
                    <td><label for="phone" class="m1">Телефон: </label></td>
                    <td><input type="text" id="phone" class="m1"></td>
                </tr>
                <tr>
                    <td><label for="email" class="m1">Email: </label></td>
                    <td><input type="text" id="email" class="m1"></td>
                </tr>
                <tr>
                    <td><label for="itemName" class="m1">Название товара: </label></td>
                    <td><input type="text" id="itemName" class="m1"></td>
                </tr>
            </table>
            <input type="submit" value="Купить" class="buy-form__item">
            <div class="buy-form__close">X</div>
        </form>
    </div>
<script src="script.js"></script>
</body>
</html>