<?php
if (!isset($_SESSION)) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$_SESSION['is_validated'] = false;

//Header template
require_once "template/header.php";
// content page it this case we put the product list in by the default
?>


<div class="content-box p-5 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/img/art.jpg" class="d-block w-100 img-slide" alt="cara cover">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/art-1.jpg" class="d-block w-100 img-slide" alt="cara cover">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/art-2.jpg" class="d-block w-100 img-slide" alt="cara cover">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-12 my-5">
                <h1 class="display-1">Cara Art</h1>
            </div>
            <div class="col-12 col-sm-12">
                <p class="mt-3 resume">Welcome to Cara's Art!
                    <br>
                  Here you can find the most unique collections of arts from around the world. The arts which are on display on the homepage are coming soon! Other arts are subject to availability!
                    <br>
                    *Conditions Apply
                </p>
            </div>
        </div>
    </div>
</div>
<?php
// footer page to put the credits
require_once "template/footer.php";
?>
