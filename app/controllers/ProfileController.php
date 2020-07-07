<?php


namespace app\controllers;


use app\base\BaseController;
use base\View\View;

class ProfileController extends BaseController
{
    public function index()
    {
        new View("site/profile/profile", $this->page);
    }

    public function orders()
    {
        new View("site/profile/orders", $this->page);
    }

    public function favourites()
    {
        new View("site/profile/favourites", $this->page);
    }

    public function settings()
    {
        new View("site/profile/settings", $this->page);
    }
}