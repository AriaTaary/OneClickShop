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
        <p class="header-text"><?php if (!isset($edit)) : ?>Добавить<?php else : ?>Изменить<?php endif; ?> бренд</p>
        <div class="orders">
            <?php if (isset($error)) : ?>
                <div>
                    <h2><?= $error ?></h2>
                </div>
            <?php endif; ?>

            <div class="admin-form">
                <form action="/profile/admin/brands/<?php if (isset($edit)) : ?>edit<?php else : ?>add<?php endif; ?>/" method="post" style="display: flex; flex-direction: column; justify-items: left; height: 100%">
                    <div style="width: 100%">
                        <label class="label-admin-form" for="name">Название</label>
                        <input class="admin-form-input" type="text" name="name" id="name" required style="color: white" <?php if (isset($error) || isset($edit)) : ?>value="<?= $data['name'] ?>"<?php endif; ?>>
                    </div>
                    <div style="width: 100%">
                        <label class="label-admin-form" for="link">Название на английском для URL</label>
                        <input class="admin-form-input" type="text" name="link" id="link" required style="color: white" <?php if (isset($error) || isset($edit)) : ?>value="<?= $data['link'] ?>"<?php endif; ?>>
                    </div>
                    <?php if (isset($edit)) : ?>
                        <input type="number" name="id" style="display: none" value="<?= $data['id'] ?>">
                    <?php endif; ?>
                    <div style="width: 100%">
                        <button type="submit" class="login-button add"><?php if (!isset($edit)) : ?>Добавить<?php else : ?>Изменить<?php endif; ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>