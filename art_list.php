<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Header tamplate
require_once "template/header.php";

require_once "functions.php";

$base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';

$artworks = getArtworks();

?>

<div class="content-box p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3">
                <div class="card shadow">
                    <div class="card-body py-2">
                        <h4 class="card-title">Works Art </h4>

                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th hidden scope="col">id</th>
                                <th scope="col">Action</th>
                                <th scope="col">Date of completion</th>
                                <th scope="col">Name</th>
                                <th scope="col">Width</th>
                                <th scope="col">Height</th>
                                <th scope="col">Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($artworks as $row => $val)
                            {
                                ?>
                                <tr>
                                    <th scope="row">
                                        <a class="btn btn-link" href="<?php echo $base_url ?>order.php?id=<?php echo $val['id'] ?>&name=<?php echo $val['name'] ?>">Order</a>
                                    </th>
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
