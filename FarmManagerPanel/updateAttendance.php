<<?php
include('../AdminPanel/connection.php');
$title = "View Staff Attendance";
include('header.php');
include('sidebar.php');

if(!isset($_SESSION['username'])){
    ?>
    <script>window.location.href = "login.php";</script>
    <?php
}

$id= $_GET['id'];
$sql= "SELECT * FROM attendance where id='$id'";
$result = mysqli_query($conn, $sql);

if(isset($_POST["updateData"])){
    $id= $_GET['id'];
    $date = $_POST["date"];
    $userId = $_POST["userid"];
    $username = $_POST["username"];
    $attendance = $_POST["customRadioInline1"];
    $payroll = $_POST["payroll"];

    $query = "UPDATE attendance SET date='$date', userId='$userId', name='$username', attendance='$attendance', payroll='$payroll' where id='$id'";
    $res = mysqli_query($conn, $query);

    if($res){
        ?>
        <script>window.location.href = "viewAttendance.php";</script>
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
                                <span>Staff Attendance Information</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <h5 class="card-title">Staff Attendance</h5>
                                            <form class="needs-validation" method="POST" novalidate>
                                            <?php
                                            while($row = mysqli_fetch_array($result))
                                                {
                                                $type=$row['attendance'];
                                                $payroll = $row['payroll'];
                                                
                                                ?>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom09">Date</label><input name="date" id="validationCustom09" type="date" value="<?php echo $row['date']  ?>" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12 "><label class="font-weight-bold" for="validationCustom01">User Id</label><input name="userid" id="validationCustom01" type="text" value="<?php echo $row['userId']  ?>" class="form-control" required>
                                                </div>
                                                <?php
                                                        $sql = "SELECT id, username FROM user";
                                                        $result = mysqli_query($conn, $sql);
                                                    ?>
                                                    <div class="position-relative form-group col-md-12 "><label class="font-weight-bold" for="validationCustom09">Assign</label>
                                                    <select name='username' id="validationCustom09" class="form-control" required>
                                        
                                                    <?php
                                                    while ($rows= mysqli_fetch_array($result)) {
                                                        ?>
                                                        <option value="<?php echo $rows['username']; ?>" <?php if ($row['name'] == $rows['username']) { echo 'selected'; } ?> ><?php echo $rows['username']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    </select>
                                                    </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom06">Attendance</label><br>

                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" value="Present" <?php if ($type == 'Present') {echo "checked";} ?> />
                                                        <label class="custom-control-label" for="customRadioInline1">Present</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" value="Absent" <?php if ($type  == 'Absent') {echo "checked";} ?> />
                                                        <label class="custom-control-label" for="customRadioInline2">Absent</label>
                                                    </div>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom07">Payroll</label><br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="payroll" name="payroll" class="custom-control-input" value="500RWF" <?php if ($payroll == '500RWF') {echo "checked";} ?>>
                                                        <label class="custom-control-label" for="payroll">500RWF</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="payroll2" name="payroll" class="custom-control-input" value="1000RWF" <?php if ($payroll == '1000RWF') {echo "checked";} ?>>
                                                        <label class="custom-control-label" for="payroll2">1000RWF</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="payroll3" name="payroll" class="custom-control-input" value="1500RWF" <?php if ($payroll == '1500RWF') {echo "checked";} ?>>
                                                        <label class="custom-control-label" for="payroll3">1500RWF</label>
                                                    </div>
                                                </div>

                                                <input class="mt-1 btn btn-primary ml-3" type="submit" name="updateData" value="Update">
                                            </form>
                                            <?php
                                                }
                                            ?>
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