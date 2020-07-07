<?php

/**
 * @var $page base\Page
 * @var $edit
 * @var $error
 * @var $data
 */

?>

<div class="account-view">

    <div class="account-menu">
        <?php new \base\View\Element("account_menu") ?>
    </div>

    <div class="account-content">
        <p class="header-text">Добавить категорию</p>
        <div class="orders">
            <?php if (isset($error)) : ?>
                <div>
                    <h2><?= $error ?></h2>
                </div>
            <?php endif; ?>

            <div style="margin-left: 50px">
                <form action="/profile/admin/categories/<?php if (isset($edit)) : ?>edit<?php else : ?>add<?php endif; ?>/" enctype="multipart/form-data" method="post" style="display: flex; flex-direction: column; justify-items: left; height: 100%">
                    <div style="width: 100%">
                        <label for="name">Название</label>
                        <input type="text" name="name" id="name" required style="color: white" <?php if (isset($error) || isset($edit)) : ?>value="<?= $data['name'] ?>"<?php endif; ?>>
                    </div>
                    <div style="width: 100%">
                        <label for="link">Название на английском для URL</label>
                        <input type="text" name="link" id="link" required style="color: white" <?php if (isset($error) || isset($edit)) : ?>value="<?= $data['link'] ?>"<?php endif; ?>>
                    </div>
                    <div style="width: 100%">
                        <label for="image">Картинка</label>
                        <input type="file" name="image" id="image" <?php if (!isset($edit)) : ?>required<?php endif; ?> style="color: white">
                    </div>
                    <?php if (isset($edit)) : ?>
                        <input type="number" name="id" style="display: none" value="<?= $data['id'] ?>">
                    <?php endif; ?>
                    <div>
                        <button type="submit" style="color: white; padding: 10px; margin-top: 20px; width: 100px"><?php if (!isset($edit)) : ?>Добавить<?php else : ?>Изменить<?php endif; ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>