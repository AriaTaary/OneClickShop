<?php

/**
 * @var $page base\Page
 */

use base\View\Element;

$title = "Контакты";
$page->title = "{$title} - OneClick";

?>

<?php new Element("mini_banner") ?>
<?php
new Element("breadcrumb", ["elements" => [
    ['name' => $title]
]])
?>

<p class="header-text">Контакты</p>

<div class="main-content">
    <div class="adress-page">
        <div class="adress-text">
            <p class="grey-text">Мы всегда открыты для покупателей и партнеров. Если у вас возникли вопросы, предложения – сообщите нам об этом любым удобным способом.</p>
            <p class="grey-text">Телефон</p>
            <p class="black-text">+7 777 000 00 00</p>
            <p class="grey-text">Email</p>
            <p class="black-text">oneclick@mail.ru</p>
            <p class="grey-text">Адрес</p>
            <p class="black-text">Mocква, метро Электрозаводская, ул. Большая Семеновская, д. 38</p>
            <p class="grey-text">График работы</p>
            <p class="black-text">понедельник - пятница</p>
            <p class="black-text">с 10:00 до 19:00</p>
        </div>
        <div class="contact-map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A8b21c7e1677f7f4fec29ffaed5267033fe6724580b9b12abee6e023ec6b655e9&amp;width=800&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
    </div>
</div>