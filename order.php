<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Header tamplate
require_once "template/header.php";
require_once "functions.php";
$id = $_GET['id'];
$name = $_GET['name'];

if (isset($_POST) && !empty($_POST)) {
    setOrder($_POST);
}
?>


<div class="content-box p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Set order </h4>
                        <p class="card-subtitle mb-2">
                            ID: <?php echo $id; ?>
                            Work art: <?php echo $name; ?>
                        </p>
                        <form method="post" id="formid" action="" role="form" name="data" class="">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="row justify-content-center">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="name"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                               placeholder="Email"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="address">Postal Address</label>
                                        <input type="text" class="form-control" id="postal_address" name="postal_address"
                                               placeholder="Street Address"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="phone">Phone Number</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                               placeholder="Phone Number"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block center-block" name="btnSubmit"
                                        id="btnSubmit"
                                        value="Sign up">Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


