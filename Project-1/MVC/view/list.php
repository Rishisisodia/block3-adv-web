<?php session_unset(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="~/../assets/fontawesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="~/../assets/bootstrap.css">
    <script src="~/../assets/jquery.min.js"></script>
    <script src="~/../assets/bootstrap.js"></script>
    <style type="text/css">
        body {
            background: linear-gradient(to right, #232526, #414345);
        }

        .wrapper {
            width: 650px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;

        }

        .page-header h2 {
            margin-top: 0;
        }

        tr,
        td,
        th {
            color: white;
        }

        .btn-success {
            color: #fff;
            background: linear-gradient(to bottom, #56ccf2, #2f80ed) !important;
            border-color: #2f80ed !important;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="text-center">Foods Details</h2>
                        <a href="index.php" class="btn btn-success pull-left ">Home</a>

                        <a href="view/insert.php" class="btn btn-success pull-right">Add New Dish</a>
                    </div>
                    <?php
                    if ($result->num_rows > 0) {
                        echo "<table class='table table-bordered  '>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>#</th>";
                        echo "<th>Dish Name</th>";
                        echo "<th>ingredient(s)</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['DishName'] . "</td>";
                            echo "<td>" . $row['ingredient'] . "</td>";

                            echo "<td>";
                            echo "<a href='index.php?act=update&id=" . $row['id'] . "' title='Update Record' data-toggle='tooltip'><i class='fa fa-edit'></i></a>";
                            echo "<a href='index.php?act=delete&id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><i class='fa fa-trash'></i></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($result);
                    } else {
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>