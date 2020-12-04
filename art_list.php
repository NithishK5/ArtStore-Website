<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Header tamplate
require_once "template/header.php";

require_once "functions.php";

$base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';

$limit = 12;
$prev = 12;
$page = 0;
$next = 1;

if (isset($_GET) && !empty($_GET)) {
    $page = $_GET['page'];
    $artworks = getArtworks($limit, $page >= 1 ? $limit * $page : 0);
}
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
                                <th scope="col">Name</th>
                                <th scope="col">Width</th>
                                <th scope="col">Height</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($artworks as $row => $val)
                            {
                                ?>
                                <tr>
                                    <th scope="row">
                                        <a class="btn btn-link" href="<?php echo $base_url ?>art_view.php?id=<?php echo $val['id'] ?>">More</a>
                                    </th>
                                    <td><?php echo $val['name']; ?></td>
                                    <td><?php echo $val['width']; ?></td>
                                    <td><?php echo $val['height']; ?></td>
                                    <td>£ <?php echo $val['price']; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <?php if($page > 0): ?>
                                    <a  href="?page=<?php echo($page - 1); ?>" class="btn btn-link">Prev</a>
                                <?php endif ?>
                                <?php if(count($artworks) == $limit): ?>
                                    <a  href="?page=<?php echo($page + 1); ?>" class="btn btn-link">Next</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
