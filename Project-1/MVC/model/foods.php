<?php

class foods
{
    // table fields
    public $id;
    public $ingredient;
    public $DishName;
    // message string
    public $id_msg;
    public $ingredient_msg;
    public $DishName_msg;
    // constructor set default value
    function __construct()
    {
        $id = 0;
        $ingredient = $DishName = "";
        $id_msg = $ingredient_msg = $DishName_msg = "";
    }
}
