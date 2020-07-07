<?php

/**
 * @var $data
 */

?>

<div class="account-view">

    <div class="account-menu">
        <?php new \base\View\Element("account_menu") ?>
    </div>

    <div class="account-content">
        <p class="header-text">Все спонсоры</p>
        <div class="orders">
            <div>
                <a href="/profile/admin/sponsors/add/"><button class="login-button add">Добавить</button></a>
            </div>

            <div class="table">
                <?php if (!empty($data)) : ?>
                    <table style="border-collapse: collapse">
                        <?php foreach ($data as $item) : ?>
                            <tr>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['id'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['name'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['link'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;">
                                    <a style="text-decoration: none; color: black" href="/profile/admin/sponsors/edit/<?= $item['id'] ?>"><button class="admin-menu-action">Редактировать</button></a>
                                </td>
                                <td style="border: 1px solid black; padding: 10px;">
                                    <form action="/profile/admin/sponsors/delete/" style="width: 100%" method="post">
                                        <input type="number" name="id" value="<?= $item['id'] ?>" style="display: none">
                                        <button type="submit"  class="admin-menu-action">Удалить</button>
                                        <!-- <button type="submit" style="background: none; font-size: 12pt; width: 100%">Удалить</button> -->
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>Спонсоров ещё нет</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>