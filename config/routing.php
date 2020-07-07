<?php


use app\controllers\admin\BrandsController;
use app\controllers\admin\CategoriesController;
use app\controllers\admin\ProductsController;
use app\controllers\CatalogueController;
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


/** Админка */

$routing->add('GET', '/admin/categories/', CategoriesController::class, 'all');
$routing->add('GET', '/admin/categories/add/', CategoriesController::class, 'form');
$routing->add('GET', '/admin/categories/edit/{id}', CategoriesController::class, 'form');
$routing->add('POST', '/admin/categories/add/', CategoriesController::class, 'add');
$routing->add('POST', '/admin/categories/edit/', CategoriesController::class, 'edit');
$routing->add('POST', '/admin/categories/delete/', CategoriesController::class, 'delete');

$routing->add('GET', '/admin/brands/', BrandsController::class, 'all');
$routing->add('GET', '/admin/brands/add/', BrandsController::class, 'form');
$routing->add('GET', '/admin/brands/edit/{id}', BrandsController::class, 'form');
$routing->add('POST', '/admin/brands/add/', BrandsController::class, 'add');
$routing->add('POST', '/admin/brands/edit/', BrandsController::class, 'edit');
$routing->add('POST', '/admin/brands/delete/', BrandsController::class, 'delete');

$routing->add('GET', '/admin/products/', ProductsController::class, 'all');
$routing->add('GET', '/admin/products/add/', ProductsController::class, 'form');
$routing->add('GET', '/admin/products/edit/{id}', ProductsController::class, 'form');
$routing->add('POST', '/admin/products/add/', ProductsController::class, 'add');
$routing->add('POST', '/admin/products/edit/', ProductsController::class, 'edit');
$routing->add('POST', '/admin/products/delete/', ProductsController::class, 'delete');