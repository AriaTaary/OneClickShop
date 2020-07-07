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
        <p class="header-text">Категории</p>
        <div class="orders">
            <div style="margin: 10px;">
                <a href="/profile/admin/categories/add/">Добавить</a>
            </div>

            <div>
                <?php if (!empty($data)) : ?>
                    <table style="border-collapse: collapse">
                        <?php foreach ($data as $item) : ?>
                            <tr>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['id'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['name'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['link'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;"><?= $item['image'] ?></td>
                                <td style="border: 1px solid black; padding: 10px;">
                                    <a style="text-decoration: none; color: black" href="/profile/admin/categories/edit/<?= $item['id'] ?>">Редактировать</a>
                                </td>
                                <td style="border: 1px solid black; padding: 10px;">
                                    <form action="/profile/admin/categories/delete/" style="width: 100%" method="post">
                                        <input type="number" name="id" value="<?= $item['id'] ?>" style="display: none">
                                        <button type="submit" style="background: none; font-size: 12pt; width: 100%">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>Категорий ещё нет</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>