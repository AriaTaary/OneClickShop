<?php


use app\controllers\admin\BrandsController;
use app\controllers\admin\CategoriesController;
use app\controllers\admin\ProductsController;
use app\controllers\CatalogueController;
use app\controllers\OrderController;
use app\controllers\ProfileController;
use app\controllers\SiteController;
use base\routing\Routing;

$routing = new Routing();

/** Основное */
$routing->add('GET', '/', SiteController::class, 'index');
$routing->add('GET', '/delivery/', SiteController::class, 'delivery');
$routing->add('GET', '/contacts/', SiteController::class, 'contacts');

/** Каталог */
$routing->add('GET', '/category/{category}/', CatalogueController::class, 'category');
$routing->add('GET', '/products/{article}/', CatalogueController::class, 'item');

/** Корзина и офорление заказов */
$routing->add("GET", "/basket/", OrderController::class, "basket");
$routing->add("GET", "/order/", OrderController::class, "order");

/** Личный кабинет */
$routing->add("GET", "/profile/", ProfileController::class, "index");
$routing->add("GET", "/profile/orders/", ProfileController::class, "orders");
$routing->add("GET", "/profile/favourites/", ProfileController::class, "favourites");
$routing->add("GET", "/profile/settings/", ProfileController::class, "settings");

/** Админка */
$routing->add('GET', '/profile/admin/categories/', CategoriesController::class, 'all');
$routing->add('GET', '/profile/admin/categories/add/', CategoriesController::class, 'form');
$routing->add('GET', '/profile/admin/categories/edit/{id}', CategoriesController::class, 'form');
$routing->add('POST', '/profile/admin/categories/add/', CategoriesController::class, 'add');
$routing->add('POST', '/profile/admin/categories/edit/', CategoriesController::class, 'edit');
$routing->add('POST', '/profile/admin/categories/delete/', CategoriesController::class, 'delete');

$routing->add('GET', '/profile/admin/brands/', BrandsController::class, 'all');
$routing->add('GET', '/profile/admin/brands/add/', BrandsController::class, 'form');
$routing->add('GET', '/profile/admin/brands/edit/{id}', BrandsController::class, 'form');
$routing->add('POST', '/profile/admin/brands/add/', BrandsController::class, 'add');
$routing->add('POST', '/profile/admin/brands/edit/', BrandsController::class, 'edit');
$routing->add('POST', '/profile/admin/brands/delete/', BrandsController::class, 'delete');

$routing->add('GET', '/profile/admin/products/', ProductsController::class, 'all');
$routing->add('GET', '/profile/admin/products/add/', ProductsController::class, 'form');
$routing->add('GET', '/profile/admin/products/edit/{id}', ProductsController::class, 'form');
$routing->add('POST', '/profile/admin/products/add/', ProductsController::class, 'add');
$routing->add('POST', '/profile/admin/products/edit/', ProductsController::class, 'edit');
$routing->add('POST', '/profile/admin/products/delete/', ProductsController::class, 'delete');