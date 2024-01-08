<?php
require '../model/foods.php';
session_start();
$foodtb = isset($_SESSION['foodtbl0']) ? unserialize($_SESSION['foodtbl0']) : new foods();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="../assets/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Foods</h2>
                    </div>
                    <p>Please fill this form and submit to add foods record in the database.</p>
                    <form action="../index.php?act=update" method="post">
                        <div class="form-group <?php echo (!empty($foodtb->ingredient_msg)) ? 'has-error' : ''; ?>">
                            <label>food ingredient</label>
                            <input type="text" name="ingredient" class="form-control" value="<?php echo $foodtb->ingredient; ?>">
                            <span class="help-block"><?php echo $foodtb->ingredient_msg; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($foodtb->DishName_msg)) ? 'has-error' : ''; ?>">
                            <label>foods Name</label>
                            <input type="text" name="DishName" class="form-control" value="<?php echo $foodtb->DishName; ?> ">
                            <span class="help-block"><?php echo $foodtb->DishName_msg; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $foodtb->id; ?>" />
                        <input type="submit" name="updatebtn" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>