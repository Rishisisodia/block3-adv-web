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
        body {
            background: linear-gradient(to right, #232526, #414345);
        }

        section {
            padding: 40px 0;
        }

        h2,
        p,
        label {
            color: white;
        }

        .container {
            width: 500px;
            margin: 0 auto;
        }

        .wrapper {
            width: 500px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }

        .btn-primary {
            color: #fff;
            background: linear-gradient(to bottom, #56ccf2, #2f80ed) !important;
            border-color: #2f80ed !important;
        }
    </style>
</head>

<body>
    <section>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Add food</h2>
                        </div>
                        <p>Please fill this form and submit to add foods record in the database.</p>
                        <form action="../index.php?act=add" method="post">

                            <div class="form-group <?php echo (!empty($foodtb->DishName_msg)) ? 'has-error' : ''; ?>">
                                <label>Dish Name</label>
                                <input name="DishName" class="form-control" value="<?php echo $foodtb->DishName; ?>">
                                <span class="help-block"><?php echo $foodtb->DishName_msg; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($foodtb->ingredient_msg)) ? 'has-error' : ''; ?>">
                                <label>ingredient(s)</label>
                                <input type="text" name="ingredient" class="form-control" value="<?php echo $foodtb->ingredient; ?>">
                                <span class="help-block"><?php echo $foodtb->ingredient_msg; ?></span>
                            </div>
                            <input type="submit" name="addbtn" class="btn btn-primary" value="Submit">
                            <a href="../index.php" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>