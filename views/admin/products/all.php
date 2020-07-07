<?php

/**
 * @var $data array
 */

?>

<div style="margin: 10px;">
    <a href="/admin/products/add/">Добавить</a>
</div>

<div>
    <?php if (!empty($data)) : ?>
        <table style="border-collapse: collapse">
            <?php foreach ($data as $item) : ?>
                <tr>
                    <td style="border: 1px solid black; padding: 10px;"><?= $item['id'] ?></td>
                    <td style="border: 1px solid black; padding: 10px;"><?= $item['article'] ?></td>
                    <td style="border: 1px solid black; padding: 10px;"><?= $item['name'] ?></td>
                    <td style="border: 1px solid black; padding: 10px;"><?= $item['category'] ?></td>
                    <td style="border: 1px solid black; padding: 10px;"><?= $item['brand'] ?></td>
                    <td style="border: 1px solid black; padding: 10px;"><?= $item['price'] ?></td>
                    <td style="border: 1px solid black; padding: 10px;">
                        <a style="text-decoration: none; color: black" href="/admin/products/edit/<?= $item['id'] ?>">Редактировать</a>
                    </td>
                    <td style="border: 1px solid black; padding: 10px;">
                        <form action="/admin/products/delete/" style="width: 100%" method="post">
                            <input type="number" name="id" value="<?= $item['id'] ?>" style="display: none">
                            <button type="submit" style="background: none; font-size: 12pt; width: 100%">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Товаров ещё нет</p>
    <?php endif; ?>
</div>