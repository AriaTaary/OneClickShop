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
