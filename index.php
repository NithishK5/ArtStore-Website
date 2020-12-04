<?php
if (!isset($_SESSION)) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$_SESSION['is_validated'] = false;

require_once "template/header.php";
// content page it this case we put the product list in by the default
?>
    <div class="content-box p-5 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12">
                    <h1 class="display-1">Cara Art</h1>
                </div>
                <div class="col-12 col-sm-12">
                    <img src="./assets/img/art.jpg" class="image-responsive image-cover" alt="cover">
                </div>
                <div class="col-12 col-sm-12">
                    <p class="mt-3 resume">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam corporis expedita harum maxime
                        sit. Cumque dolor eos facilis laudantium magnam nihil obcaecati provident quos reiciendis saepe
                        sed, sit temporibus, voluptate!
                        <br>
                         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error esse magnam nam repellendus! Facilis incidunt ipsa
                        iste modi molestias numquam quisquam repellat saepe tempore velit? Ab asperiores doloribus non repellat?
                    </p>
                    <a href="art_list.php" class="btn btn-link">Art list</a>
                </div>
            </div>
        </div>
    </div>
<?php
// footer page to put the credits
require_once "template/footer.php";
?>
