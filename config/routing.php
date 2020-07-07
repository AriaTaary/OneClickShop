<?php


use app\controllers\CatalogueController;
use app\controllers\SiteController;
use base\routing\Routing;

$routing = new Routing();

/** Основное */
$routing->add('GET', '/', SiteController::class, 'index');
$routing->add('GET', '/delivery/', SiteController::class, 'delivery');
$routing->add('GET', '/contacts/', SiteController::class, 'contacts');

/** Каталог */
$routing->add('GET', '/category/{category_name}/', CatalogueController::class, 'category');
$routing->add('GET', '/products/{article}/', CatalogueController::class, 'item');