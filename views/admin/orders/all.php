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
        <p class="header-text">Все заказы</p>
        <div class="orders">
            <div>
                <?php if (!empty($data)) : ?>
                    <table style="border-collapse: collapse">
                        <tr>
                            <td style="border: 1px solid black; padding: 10px;">ID</td>
                            <td style="border: 1px solid black; padding: 10px;">Дата</td>
                            <td style="border: 1px solid black; padding: 10px;">Имя заказчика</td>
                            <td style="border: 1px solid black; padding: 10px;">Email</td>
                            <td style="border: 1px solid black; padding: 10px;">Телефон</td>
                            <td style="border: 1px solid black; padding: 10px;">Сумма заказа</td>
                            <td style="border: 1px solid black; padding: 10px;">Статус заказа</td>
                            <td style="border: 1px solid black; padding: 10px;"></td>
                            <td style="border: 1px solid black; padding: 10px;"></td>
                        </tr>
                        <?php foreach ($data as $item) : ?>
                            <tr>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['id'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['date'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['name'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['email'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['phone'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['sum'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['status'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;">
                                    <a style="text-decoration: none; color: black" href="/profile/admin/orders/edit/<?= $item['id'] ?>"><button class="admin-menu-action">Редактировать</button></a>
                                </td>
                                <td style="border: 1px solid black; padding: 10px;">
                                    <form action="/profile/admin/orders/delete/" style="width: 100%" method="post">
                                        <input type="number" name="id" value="<?= $item['id'] ?>" style="display: none">
                                        <button type="submit"  class="admin-menu-action">Удалить</button>
                                        <!-- <button type="submit" style="background: none; font-size: 12pt; width: 100%">Удалить</button> -->
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>Заказов ещё нет</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
