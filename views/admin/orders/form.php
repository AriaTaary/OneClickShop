<?php

/**
 * @var $page base\Page
 * @var $edit
 * @var $error
 * @var $data
 *
 * @var $statuses
 */

?>

<div class="account-view">

    <div class="account-menu">
        <?php new \base\View\Element("account_menu") ?>
    </div>

    <?php if ($data === null) : ?>
        <div class="account-content">
            <p>Такого заказа не существует.</p>
        </div>
    <?php else : ?>
        <div class="account-content">
            <p class="header-text">Изменить заказ</p>
            <div class="orders">
                <?php if (isset($error)) : ?>
                    <div>
                        <h2><?= $error ?></h2>
                    </div>
                <?php endif; ?>

                <div class="admin-form">
                    <form action="/profile/admin/orders/edit/" enctype="multipart/form-data" method="post" style="display: flex; flex-direction: column; justify-items: left; height: 100%">
                        <div style="width: 100%">
                            <label class="label-admin-form" for="article">Имя заказчика</label>
                            <input class="admin-form-input" type="text" name="name" id="name" required style="color: white" value="<?= $data['name'] ?>">
                        </div>
                        <div style="width: 100%">
                            <label class="label-admin-form" for="article">Email</label>
                            <input class="admin-form-input" type="email" name="email" id="name" required style="color: white" value="<?= $data['email'] ?>">
                        </div>
                        <div style="width: 100%">
                            <label class="label-admin-form" for="article">Телефон</label>
                            <input class="admin-form-input" type="text" name="phone" id="phone" required style="color: white" value="<?= $data['phone'] ?>">
                        </div>
                        <div style="width: 100%">
                            <label class="label-admin-form" for="category">Статус заказа</label>
                            <select class="admin-form-input" name="status_id" id="category" style="width: 100%">
                                <?php foreach ($statuses as $status) : ?>
                                    <option value="<?= $status['id'] ?>" <?php if ($status['id'] === $data['status_id']) : ?>selected<?php endif;?> >
                                        <?= $status['runame'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input class="admin-form-input" type="number" name="id" style="display: none" value="<?= $data['id'] ?>">
                        <div>
                            <button type="submit" class="login-button add">Изменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>