<?php
require 'model/foodsModel.php';
require 'model/foods.php';
require_once 'config.php';

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

class foodsController
{

    function __construct()
    {
        $this->objconfig = new config();
        $this->objsm =  new foodsModel($this->objconfig);
    }
    // mvc handler request
    public function mvcHandler()
    {
        $act = isset($_GET['act']) ? $_GET['act'] : NULL;
        switch ($act) {
            case 'add':
                $this->insert();
                break;
            case 'update':
                $this->update();
                break;
            case 'delete':
                $this->delete();
                break;
            default:
                $this->list();
        }
    }
    // page redirection
    public function pageRedirect($url)
    {
        header('Location:' . $url);
    }
    // check validation
    public function checkValidation($foodtb)
    {
        $noerror = true;
        // Validate ingredient        
        if (empty($foodtb->ingredient)) {
            $foodtb->ingredient_msg = "Field is empty.";
            $noerror = false;
        } elseif (!filter_var($foodtb->ingredient, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
            $foodtb->ingredient_msg = "Invalid entry.";
            $noerror = false;
        } else {
            $foodtb->ingredient_msg = "";
        }
        // Validate DishName            
        if (empty($foodtb->DishName)) {
            $foodtb->DishName_msg = "Field is empty.";
            $noerror = false;
        } elseif (!filter_var($foodtb->DishName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
            $foodtb->DishName_msg = "Invalid entry.";
            $noerror = false;
        } else {
            $foodtb->DishName_msg = "";
        }
        return $noerror;
    }
    // add new record
    public function insert()
    {
        try {
            $foodtb = new foods();
            if (isset($_POST['addbtn'])) {
                // read form value
                $foodtb->ingredient = trim($_POST['ingredient']);
                $foodtb->DishName = trim($_POST['DishName']);
                //call validation
                $chk = $this->checkValidation($foodtb);
                if ($chk) {
                    //call insert record            
                    $pid = $this->objsm->insertRecord($foodtb);
                    if ($pid > 0) {
                        $this->list();
                    } else {
                        echo "Somthing is wrong..., try again.";
                    }
                } else {
                    $_SESSION['foodtbl0'] = serialize($foodtb); //add session obj           
                    $this->pageRedirect("view/insert.php");
                }
            }
        } catch (Exception $e) {
            $this->close_db();
            throw $e;
        }
    }
    // update record
    public function update()
    {
        try {

            if (isset($_POST['updatebtn'])) {
                $foodtb = unserialize($_SESSION['foodtbl0']);
                $foodtb->id = trim($_POST['id']);
                $foodtb->ingredient = trim($_POST['ingredient']);
                $foodtb->DishName = trim($_POST['DishName']);
                // check validation  
                $chk = $this->checkValidation($foodtb);
                if ($chk) {
                    $res = $this->objsm->updateRecord($foodtb);
                    if ($res) {
                        $this->list();
                    } else {
                        echo "Somthing is wrong..., try again.";
                    }
                } else {
                    $_SESSION['foodtbl0'] = serialize($foodtb);
                    $this->pageRedirect("view/update.php");
                }
            } elseif (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
                $id = $_GET['id'];
                $result = $this->objsm->selectRecord($id);
                $row = mysqli_fetch_array($result);
                $foodtb = new foods();
                $foodtb->id = $row["id"];
                $foodtb->DishName = $row["DishName"];
                $foodtb->ingredient = $row["ingredient"];
                $_SESSION['foodtbl0'] = serialize($foodtb);
                $this->pageRedirect('view/update.php');
            } else {
                echo "Invalid operation.";
            }
        } catch (Exception $e) {
            $this->close_db();
            throw $e;
        }
    }
    // delete record
    public function delete()
    {
        try {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $res = $this->objsm->deleteRecord($id);
                if ($res) {
                    $this->pageRedirect('index.php');
                } else {
                    echo "Somthing is wrong..., try again.";
                }
            } else {
                echo "Invalid operation.";
            }
        } catch (Exception $e) {
            $this->close_db();
            throw $e;
        }
    }
    public function list()
    {
        $result = $this->objsm->selectRecord(0);
        include "view/list.php";
    }
}
