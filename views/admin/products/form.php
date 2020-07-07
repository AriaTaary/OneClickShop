<?php

/**
 * @var $page base\Page
 * @var $edit
 * @var $error
 * @var $data
 *
 * @var $categories
 * @var $brands
 */

?>

<?php if (isset($error)) : ?>
    <div>
        <h2><?= $error ?></h2>
    </div>
<?php endif; ?>

<div style="margin-left: 50px">
    <form action="/profile/admin/products/<?php if (isset($edit)) : ?>edit<?php else : ?>add<?php endif; ?>/" enctype="multipart/form-data" method="post" style="display: flex; flex-direction: column; justify-items: left; height: 100%">
        <div style="width: 100%">
            <label for="article">Артикул</label>
            <input type="text" name="article" id="article" required style="color: white" <?php if (isset($error) || isset($edit)) : ?>value="<?= $data['article'] ?>"<?php endif; ?>>
        </div>
        <div style="width: 100%">
            <label for="category">Категория</label>
            <select name="category_id" id="category" style="width: 100%">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['id'] ?>" <?php if ((isset($error) || isset($edit)) && ($category['id'] === $data['category_id'] || $data['category_id'] === $category['id'])) : ?>selected<?php endif;?> >
                        <?= $category['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div style="width: 100%">
            <label for="brand">Бренд</label>
            <select name="brand_id" id="brand" style="width: 100%">
                <?php foreach ($brands as $brand) : ?>
                    <option value="<?= $brand['id'] ?>" <?php if ((isset($error) || isset($edit)) && ($brand['id'] === $data['brand_id'] || $data['brand_id'] === $brand['id'])) : ?>selected<?php endif;?>>
                        <?= $brand['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div style="width: 100%">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" required style="color: white" <?php if (isset($error) || isset($edit)) : ?>value="<?= $data['name'] ?>"<?php endif; ?>>
        </div>
        <div style="width: 100%">
            <label for="link">Описание</label>
            <textarea name="description"
                      style="width: 100%"
                      id="title"
                      rows="10"
                      required><?php if (isset($error) || isset($edit)) { echo $data['description']; } ?></textarea>
        </div>
        <div style="width: 100%">
            <label for="price">Цена</label>
            <input type="number" name="price" id="price" required style="color: white" <?php if (isset($error) || isset($edit)) : ?>value="<?= $data['price'] ?>"<?php endif; ?>>
        </div>
        <div style="width: 100%">
            <label for="images">Картинки</label>
            <input type="file" name="images[]" id="images" <?php if (!isset($edit)) : ?>required<?php endif; ?> style="color: white" multiple>
        </div>
        <?php if (isset($edit)) : ?>
            <input type="number" name="id" style="display: none" value="<?= $data['id'] ?>">
        <?php endif; ?>
        <div>
            <button type="submit" style="color: white; padding: 10px; margin-top: 20px; width: 100px"><?php if (!isset($edit)) : ?>Добавить<?php else : ?>Изменить<?php endif; ?></button>
        </div>
    </form>
</div>