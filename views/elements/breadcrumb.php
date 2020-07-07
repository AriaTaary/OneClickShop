<?php

/**
 * @var $elements array
 */

?>

<div class="breadcrumb">
    <ul class="breadcrumb-ul">
        <li><a href="/" class="breadcrumb-a">Главная ></a></li>
        <?php foreach ($elements as $key => $element) : ?>
            <?php if ($key === count($elements) - 1) : ?>
                <li><p class="breadcrumb-active"><?= $element['name'] ?></p></li>
            <?php else : ?>
                <li><a href="<?= $element['link'] ?>" class="breadcrumb-a"><?= $element['name'] ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>