<?php
include('connection.php');
$title = "Update User";
include('header.php');
include('sidebar.php');

$id= $_GET['id'];
$sql= "SELECT * FROM user where id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if(isset($_POST["updateData"])){
    $id= $_GET['id'];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $gender = $_POST["options"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];

    $query = "UPDATE user SET fname='$fname', lname='$lname', username='$username', password='$password', age='$age', email='$email', phone='$phone', dateofbirth='$dob', address='$address' where id='$id'";
    $res = mysqli_query($conn, $query);

    if($res){
        ?>
        <script>window.location.href = "userRecords.php";</script>
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
                                <span>Basic Information</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <h5 class="card-title">User Registration Form</h5>
                                            <form class="needs-validation" method="POST" novalidate>
                                            <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom01">First Name</label><input name="fname" id="validationCustom01"  type="text" value="<?php echo $row['fname'] ?>" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom03">Last Name</label><input name="lname" id="validationCustom03"  type="text" value="<?php echo $row['lname'] ?>" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom02">Username</label><input name="username" id="validationCustom02"  type="text" value="<?php echo $row['username'] ?>" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom04">Password</label><input name="password" id="validationCustom04"  type="password" value="<?php echo $row['password'] ?>" class="form-control" required>
                                                </div>
                                            
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom06">Age</label><input name="age" id="validationCustom06"  type="number" value="<?php echo $row['age'] ?>" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom07">Email</label><input name="email" id="validationCustom07"  type="email" value="<?php echo $row['email'] ?>" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom08">Phone</label><input name="phone" id="validationCustom08"  type="number" value="<?php echo $row['phone'] ?>" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom09">Date of Birth</label><input name="dob" id="validationCustom09" type="date" class="form-control" value="<?php echo $row['dateofbirth'] ?>" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom10">Address</label><textarea name="address" id="validationCustom010"  class="form-control" required><?php echo $row['address'] ?></textarea>
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