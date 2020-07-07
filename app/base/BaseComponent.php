<?php


namespace app\base;


use base\component\Component;

abstract class BaseComponent extends Component
{
    protected abstract function setTable();
}