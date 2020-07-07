<?php


namespace app\database;


use base\database\Table;

class FavouriteProductsTable extends Table
{
    public $tableName = "favourite_products";

    public function favourites($user_id)
    {
        $sql =
            "
            select
                p.id,
                p.article,
                p.name,
                p.price,
                i.name as image
            from
                products as p
            left join
                favourite_products as fp on fp.user_id = {$user_id}
            left join
                images as i on i.product_id = p.id
            where
                p.id = fp.product_id
                and i.id in (
                    select
                        min(images.id)
                    from
                        images
                    where
                        images.product_id = p.id
                )
            ";

        return $this->getQueryArray($sql);
    }
}