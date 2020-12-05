<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Header template

require_once "template/header.php";

require_once "functions.php";

$base_url="https://devweb2020.cis.strath.ac.uk/~pkb18161/ahtaewshsihtin/ass2/";

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
                <h4 class="card-title">Works Art </h4>
            </div>

            <?php foreach ($artworks as $row => $art): ?>
                <div class="col-12 col-sm-4 mt-3">
                    <div class="card">
                        <img src="data:image/*;base64, <?php echo $art['cover_image'] ?>" class="card-img-top" style="max-height: 300px" alt="cover">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo($art['name']); ?></h4>
                            <ul>
                                <li>Width: <?php echo $art['width']; ?></li>
                                <li>Height: <?php echo $art['height']; ?></li>
                            </ul>

                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a class="btn btn-link" href="<?php echo $base_url ?>art_view.php?id=<?php echo $art['id'] ?>">More</a>
                            <h3 class="text-right">£ <?php echo($art['price']); ?></h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="col-12">
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

