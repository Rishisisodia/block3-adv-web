<?php
session_unset();
require_once  'controller/foodsController.php';
$controller = new foodsController();
$controller->mvcHandler();
