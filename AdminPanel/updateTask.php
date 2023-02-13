<?php
include('../AdminPanel/connection.php');
$title = "Update Daily Reports";
include('header.php');
include('sidebar.php');


$id= $_GET['id'];
$sql= "SELECT * FROM task where id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if(isset($_POST["updateData"])){
    $id= $_GET['id'];
    $date = $_POST["date"];
    $field = $_POST["field"];
    $details = $_POST["details"];
    $workers = $_POST['workers'];
    $assign = $_POST["assign"];
    $duedate = $_POST["duedate"];

    $query = "UPDATE task SET date='$date', field='$field', details='$details', workers='$workers', assign='$assign', duedate='$duedate' where id='$id'";
    $res = mysqli_query($conn, $query);

    if($res){
        ?>
        <script>window.location.href = "index.php";</script>
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
                                <span>Daily Task Information</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <h5 class="card-title">Daily Task</h5>
                                            <form class="needs-validation" method="POST" novalidate>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom09">Date</label><input name="date" id="validationCustom09" type="date" value="<?php echo $row['date'] ?>" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12 "><label class="font-weight-bold" for="validationCustom01">Field</label><input name="field" id="validationCustom01" placeholder="Enter Field" type="text" value="<?php echo $row['field'] ?>" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12 "><label class="font-weight-bold" for="validationCustom03">Details</label>
                                                    <textarea name="details" id="validationCustom03" cols="5" rows="5" class="form-control" required><?php echo $row['details'] ?></textarea>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom06">No. of Workers</label><input name="workers" id="validationCustom06" placeholder="Enter No. of Workers" type="number" value="<?php echo $row['workers'] ?>" class="form-control" required>
                                                </div>
                                                <?php
                                                        $sql = "SELECT id, username FROM user";
                                                        $result = mysqli_query($conn, $sql);
                                                    ?>
                                                    <div class="position-relative form-group col-md-12 "><label class="font-weight-bold" for="validationCustom09">Assign</label>
                                                    <select name='assign' id="validationCustom09" class="form-control" required>
                                        
                                                    <?php
                                                    while ($rows= mysqli_fetch_array($result)) {
                                                        ?>
                                                        <option value="<?php echo $rows['username']; ?>" <?php if ($row['assign'] == $rows['username']) { echo 'selected'; } ?> ><?php echo $rows['username']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    </select>
                                                    </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom09">Due Date</label><input name="duedate" id="validationCustom09" type="date" value="<?php echo $row['duedate'] ?>"  class="form-control" required>
                                                </div>
                                                <input class="mt-1 btn btn-primary ml-3" name="updateData" type="submit" value="Update">
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