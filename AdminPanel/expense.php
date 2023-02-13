<?php
include('connection.php');
$title = "Expense";
include('header.php');
include('sidebar.php');



$posted = false;
if(isset($_POST['submit'])){
    $posted = true;
    $date = $_POST["date"];
    $costcenter = $_POST["costcenter"];
    $details = $_POST["details"];
    $quantity = $_POST["quantity"];
    $unitcost = $_POST["unitcost"];
    $totalcost = $_POST["totalcost"];
    $payrollcost = $_POST["payrollcost"];
    $total = $_POST["total"];

    $query = "INSERT INTO expense (date, costcenter, details, quantity, unitcost, totalcost, payrollcost, total) VALUES ('".$date."', '".$costcenter."', '".$details."', '".$quantity."', '".$unitcost."', '".$totalcost."', '".$payrollcost."', '".$total."')";
    $res = mysqli_query($conn, $query);

    if(!$res){
        die('Error: ' . mysqli_error($conn));
    }
}

?>
 <?php
    if( $posted ) {
      if( $date &&  $costcenter && $details && $quantity && $unitcost && $totalcost && $payrollcost && $total ) 
        echo "<script type='text/javascript'>alert('Submitted Successfully!')</script>";
      else
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }
  ?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                <span>Expense Information</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <h5 class="card-title">Expense</h5>
                                            <form class="needs-validation" method="POST" novalidate>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom09">Date</label><input name="date" id="validationCustom09" type="date" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12 "><label class="font-weight-bold" for="validationCustom09">Cost Center</label><input name="costcenter" id="validationCustom09" placeholder="Enter Cost Center" type="text" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12 "><label class="font-weight-bold" for="validationCustom03">Details</label>
                                                    <textarea name="details" id="validationCustom03" cols="5" rows="5" class="form-control" required></textarea>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom06">Quantity</label><input name="quantity" onkeyup="sum()" id="validationCustom06" placeholder="Enter Quantity" type="number" min=0 oninput="validity.valid||(value='');" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom07">Unit Cost</label><input name="unitcost" onkeyup="sum()" id="validationCustom07" placeholder="Enter Unit Cost" type="number" min=0 oninput="validity.valid||(value='');" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom08">Total Cost</label><input readonly name="totalcost" onkeyup="add_number()" id="validationCustom08" type="text" class="form-control" >
                                                </div>
                                                <script>
                                                    function sum() {
                                                        var txtFirstNumberValue = document.getElementById('validationCustom06').value;
                                                        var txtSecondNumberValue = document.getElementById('validationCustom07').value;
                                                        if (txtFirstNumberValue == "")
                                                            txtFirstNumberValue = 0;
                                                        if (txtSecondNumberValue == "")
                                                            txtSecondNumberValue = 0;
                                                        var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
                                                        if (!isNaN(result)) {
                                                            document.getElementById('validationCustom08').value = result;
                                                        }
                                                    }
                                                </script>

                                                <div class="position-relative form-group col-md-12 "><label class="font-weight-bold" for="validationCustom01">Payroll Cost</label><input name="payrollcost" onkeyup="add_number()" id="validationCustom01" placeholder="Enter Payroll Cost" type="number" min=0 oninput="validity.valid||(value='');" class="form-control"
                                                        required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom10">Total</label><input readonly name="total" id="validationCustom10" type="text" class="form-control" >
                                                </div>
                                                <script>
                                                    function add_number() {

                                                        var txtFirstNumberValue = document.getElementById('validationCustom08').value;
                                                        var txtSecondNumberValue = document.getElementById('validationCustom01').value;
                                                        if (txtFirstNumberValue == "")
                                                            txtFirstNumberValue = 0;
                                                        if (txtSecondNumberValue == "")
                                                            txtSecondNumberValue = 0;

                                                        var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
                                                        console.log(txtSecondNumberValue);
                                                        if (!isNaN(result)) {
                                                            document.getElementById('validationCustom10').value = result;
                                                        }

                                                    }
                                                </script>
                                                <input class="mt-1 btn btn-primary ml-3" type="submit" name="submit" value="Submit">
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