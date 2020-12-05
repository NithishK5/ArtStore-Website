<?php
if(!isset($_SESSION))
{
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Header template

require_once "template/header.php";

require_once "functions.php";

$base_url="https://devweb2020.cis.strath.ac.uk/~pkb18161/ahtaewshsihtin/ass2/";

$appointments = getAppointments();
$pass = "letMEin2020";
$is_validated = $_SESSION['is_validated'];

if (isset($_POST) && !empty($_POST)) {
    $_SESSION['is_validated'] = $pass == $_POST['password'];
}


?>
<?php
if(!$is_validated) {

    ?>
    <div class="content-box p-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 mt-3">
                    <div class="card shadow">
                        <div class="card-body py-2">
                            <h4 class="card-title">Input the password</h4>
                            <form action="" method="post" name="password">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password"
                                                   placeholder="Password"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block center-block" name="btnSubmit"
                                                    id="btnSubmit">Validate
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}   else{ ?>
    <div class="content-box p-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 mt-3">
                    <div class="card shadow">
                        <div class="card-body py-2">
                            <ul class="nav nav-pills nav-fill mb-3">
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="<?php echo($base_url); ?>admin.php"
                                    >Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active"
                                       href="<?php echo($base_url); ?>appointments.php"
                                    >Appointments</a>
                                </li>
                            </ul>

                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th hidden scope="col">id</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Phone number</th>
                                    <th scope="col">Postal Address</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($appointments as $row => $val)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $val['name']; ?></td>
                                        <td><?php echo $val['date']; ?></td>
                                        <td><?php echo $val['phone_number']; ?></td>
                                        <td><?php echo $val['postal_address']; ?></td>
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
    <?php
}
?>