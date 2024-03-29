<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Header template

require_once "template/header.php";
require_once "functions.php";

$id = $_GET['id'];
$name = $_GET['name'];
$msg = "";

if (isset($_POST) && !empty($_POST)) {
    if (setOrder($_POST)) {
        $msg = "Order Successfully Placed!";
    } else {
        $msg = "Order Failed!";
    }
}
?>

<script type="text/javascript">

    /* Fire Validate */

    $(document).ready(function () {
        // $(".alert").hide();
        $.validator.addMethod("nourl",
            function (value, element) {
                return !/http\:\/\/|www\.|link\=|url\=/.test(value);
            },
            "No URL's"
        );

        $(".form").validate({
            rules: {
                name: {
                    required: true
                },

                email: {
                    required: true,
                    email: true
                },


                date: {
                    required: true,
                },

                postal_address: {
                    required: true,
                    minlength: 5
                },

                phone_number: {
                    required: true,
                    phoneUK: true
                },

            },
            messages: {
                firstName: "First Name is required.",
                lastName: "Last Name is required.",
                username: {
                    required: "You must enter a Username",
                    alphanumeric: "Login format not valid",
                    rangelength: "Username improper length"
                },
                email: "Valid Email required",
            }
        });


        jQuery.validator.addMethod("letters", function (value, element) {
            return /(?=.*[a-zA-Z])/.test(value);
        });
        jQuery.validator.addMethod("numbers", function (value, element) {
            return /(?=.*[0-9])/.test(value);
        });
        jQuery.validator.addMethod("special", function (value, element) {
            return /(?=.*[!@#$%^&*()_,.?:{}|<>])/.test(value);
        });

        $.validator.addMethod("Postcode", function (value, element) {
            return (/(^\d{5}$)|(^\d{5}-\d{4}$)/).test(value); // returns boolean
        }, "Please enter a valid UK Postcode.");


        $(document).on('submit', '#formid', function (e) {
            if (jQuery("#formid").valid() == false) {
                e.preventDefault();
                return false
            }
        });

    });

</script>

<div class="content-box p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 mt-3">

                <?php if(!empty($msg)): ?>
                    <div class="alert alert-info" role="alert">
                        <?php echo $msg ?>
                        <button type="button" class="close" data-dismiss="alert" onclick="$('.alert').hide();">&times;
                        </button>
                    </div>
                <?php endif; ?>
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">Set order </h4>
                        <p class="card-subtitle mb-2">
                            ID: <?php echo $id; ?>
                            Work art: <?php echo $name; ?>
                        </p>
                        <form method="post" id="formid" action="" role="form" name="data" class="form">
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


