<?php

/**
 * @var $data array
 */

?>

<div class="account-view">

    <div class="account-menu">
        <?php new \base\View\Element("account_menu") ?>
    </div>

    <div class="account-content">
        <p class="header-text">Все товары</p>
        <div class="orders">
            <div>
                <a href="/profile/admin/products/add/"><button class="login-button add">Добавить</button></a>
            </div>

            <div>
                <?php if (!empty($data)) : ?>
                    <table style="border-collapse: collapse">
                        <tr>
                            <td style="border: 1px solid black; padding: 10px;">ID</td>
                            <td style="border: 1px solid black; padding: 10px;">Артикул</td>
                            <td style="border: 1px solid black; padding: 10px;">Название</td>
                            <td style="border: 1px solid black; padding: 10px;">Категория</td>
                            <td style="border: 1px solid black; padding: 10px;">Бренд</td>
                            <td style="border: 1px solid black; padding: 10px;">Цена</td>
                            <td style="border: 1px solid black; padding: 10px;"></td>
                            <td style="border: 1px solid black; padding: 10px;"></td>
                        </tr>
                        <?php foreach ($data as $item) : ?>
                            <tr>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['id'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['article'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['name'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['category'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['brand'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['price'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;">
                                    <a style="text-decoration: none; color: black" href="/profile/admin/products/edit/<?= $item['id'] ?>"><button class="admin-menu-action">Редактировать</button></a>
                                </td>
                                <td style="border: 1px solid black; padding: 10px;">
                                    <form action="/profile/admin/products/delete/" style="width: 100%" method="post">
                                        <input type="number" name="id" value="<?= $item['id'] ?>" style="display: none">
                                        <button type="submit"  class="admin-menu-action">Удалить</button>
                                        <!-- <button type="submit" style="background: none; font-size: 12pt; width: 100%">Удалить</button> -->
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>Товаров ещё нет</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
