<?php
include('connection.php');
$title = "Income";
include('header.php');
include('sidebar.php');


$id= $_GET['id'];
$sql= "SELECT * FROM income where id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if(isset($_POST["updateData"])){
    $id= $_GET['id'];
    $date = $_POST["date"];
    $salecenter = $_POST["salecenter"];
    $details = $_POST["details"];
    $quantity = $_POST["quantity"];
    $unitsale = $_POST["unitsale"];
    $total = $_POST["total"];

    $query = "UPDATE income SET date='$date', salecenter='$salecenter', details='$details', quantity='$quantity', unitsale='$unitsale', totalsale='$total' where id='$id'";
    $res = mysqli_query($conn, $query);

    if($res){
        ?>
        <script>window.location.href = "viewIncome.php";</script>
        <?php
    }else {
        echo "ERROR";
    }
}

?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                <span>Income Information</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <h5 class="card-title">Income</h5>
                                            <form class="needs-validation" method="POST" novalidate>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom09">Date</label><input name="date" id="validationCustom09" type="date" value="<?php echo $row['date'] ?>" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom022">Sale Center</label><input name="salecenter" id="validationCustom022" type="text" value="<?php echo $row['salecenter'] ?>" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12 "><label class="font-weight-bold" for="validationCustom03">Details</label>
                                                    <textarea name="details" id="validationCustom03" cols="5" rows="5" class="form-control" required><?php echo $row['details'] ?></textarea>
                                                </div>
                                                <div class="position-relative form-group col-md-12 "><label class="font-weight-bold" for="validationCustom01">Quantity</label><input name="quantity" id="validationCustom01" type="number" value="<?php echo $row['quantity'] ?>" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom07">Unit Sale</label><input name="unitsale" id="validationCustom07" type="text" value="<?php echo $row['unitsale'] ?>" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom08">Total Sale</label><input name="total" id="validationCustom08" type="text" value="<?php echo $row['totalsale'] ?>" class="form-control" required>
                                                </div>

                                                <input class="mt-1 btn btn-primary ml-3" type="submit" name="updateData" value="Update">
                                            </form>
                                            <script>
                                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                                (function() {
                                                    'use strict';
                                                    window.addEventListener('load', function() {
                                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                        var forms = document.getElementsByClassName('needs-validation');
                                                        // Loop over them and prevent submission
                                                        var validation = Array.prototype.filter.call(forms, function(form) {
                                                            form.addEventListener('submit', function(event) {
                                                                if (form.checkValidity() === false) {
                                                                    event.preventDefault();
                                                                    event.stopPropagation();
                                                                }
                                                                form.classList.add('was-validated');
                                                            }, false);
                                                        });
                                                    }, false);
                                                })();
                                            </script>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <?php
                    include('footer.php');

                ?>