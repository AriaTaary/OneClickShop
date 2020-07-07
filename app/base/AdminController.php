<?php


namespace app\base;


abstract class AdminController extends BaseController
{
    public abstract function all();

    public abstract function form();

    public abstract function add();

    public abstract function edit();

    public abstract function delete();
}