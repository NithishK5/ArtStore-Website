<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Header tamplate
require_once "template/header.php";

require_once "functions.php";

$base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';

$orders = getOrders();

?>

<div class="content-box p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3">
                <div class="card shadow">
                    <div class="card-body py-2">
                        <h4 class="card-title">Orders </h4>

                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th hidden scope="col">id</th>
                                <th scope="col">Date of completion</th>
                                <th scope="col">Name</th>
                                <th scope="col">Width</th>
                                <th scope="col">Height</th>
                                <th scope="col">Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($orders as $row => $val)
                            {
                                ?>
                                <tr>
                                    <td><?php echo $val['completion_date']; ?></td>
                                    <td><?php echo $val['name']; ?></td>
                                    <td><?php echo $val['width']; ?></td>
                                    <td><?php echo $val['height']; ?></td>
                                    <td><?php echo substr($val['description'], 0, 20) ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
