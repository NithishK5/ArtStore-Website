<?php

//Header template

require_once "template/header.php";

?>
    <div class="content-box p-5 d-flex align-items-center">
        <div class="container ">
            <div class="row justify-content-center">
                <?php

                include "functions.php";
                $id = $_GET['id'];
                $data = getArtwork($id);
                $art = $data['data'];
                $images = $data['images'];
                ?>
                <div class="col-12 col-sm-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <?php if(count($images) > 0):?>
                            <div id="carouselExampleControls" class="carousel slide mb-4" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php foreach($images as $key => $val):?>
                                    <?php if($key==0):?>
                                    <div class="carousel-item active">
                                        <img src="data:image/*;base64, <?php echo $val['image'] ?>" class="d-block w-100" alt="">
                                    </div>
                                    <?php else:?>
                                    <div class="carousel-item">
                                        <img src="data:image/*;base64, <?php echo $val['image'] ?>" class="d-block w-100" alt="">
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <?php endif; ?>

                            <h4 class="card-title"><?php echo($art['name']); ?></h4>
                            <p class="card-text"><?php echo substr($art['description'], 0, 400); ?></p>
                            <ul>
                                <li>Date of completion: <?php echo $art['completion_date']; ?></li>
                                <li>Height: <?php echo $art['height']; ?></li>
                                <li>Height: <?php echo $art['height']; ?></li>
                            </ul>
                            <h3 class="text-right">£ <?php echo($art['price']); ?></h3>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a clas="btn btn-link" href="javascript:history.back()">Go Back</a>
                            <a class="btn btn-link" href="<?php echo $base_url ?>order.php?id=<?php echo $art['id'] ?>&name=<?php echo $art['name'] ?>">Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
